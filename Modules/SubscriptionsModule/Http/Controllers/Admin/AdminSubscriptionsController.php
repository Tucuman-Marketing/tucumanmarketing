<?php

namespace Modules\SubscriptionsModule\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//MODELS
use Modules\SubscriptionsModule\Entities\Subscription;
use Modules\SubscriptionsModule\Entities\SubscriptionPay;
use Modules\SubscriptionsModule\Entities\SubscriptionPlan;
use Modules\SubscriptionsModule\Http\Services\Admin\Subscriptions\SubscriptionsSearchService;
use App\Models\User;
//CONTROLLERS
use App\Http\Controllers\AdminBaseController;
//SERVICES
use Modules\Vehicles\Entities\UserDataVehicles;
use Modules\SubscriptionsModule\Http\Services\Admin\MercadoPago\MercadoPagoService;
// LIBS
Use Alert;
use Illuminate\Support\Facades\Config;
use MercadoPago\SDK;
use MercadoPago\Item;
use MercadoPago\Preference;


class AdminSubscriptionsController extends AdminBaseController
{
    protected $subscriptionsSearchService;
    protected $mercadoPagoService;

    public function __construct(SubscriptionsSearchService $subscriptionsSearchService , MercadoPagoService $mercadoPagoService)
    {
        parent::__construct();
        $this->subscriptionsSearchService = $subscriptionsSearchService;
        $this->mercadoPagoService = $mercadoPagoService;
    }

    public function index()
    {
        // manejo de permisos
        $user = auth()->user();
        if (!$user || !$user->hasPermission('subscriptions-access')) {
            flash('No tienes permiso para ver esta página')->error()->important();
            return redirect()->back();
        }

        $clients =  User::with('userDataVehicles')->get();
        $plans = SubscriptionPlan::all();

        return view('subscriptionsmodule::admin.subscriptions.index',compact('clients','plans'));
    }


    public function indexDatatable(Request $request)
    {
        // Parámetros de búsqueda vacíos para la carga inicial
        $searchParameters = [];
        $query = $this->subscriptionsSearchService->buildQueryFromParameters($searchParameters);
        $dataTable = $this->subscriptionsSearchService->buildDatatable($query,$request);
        return $dataTable->make(true);
    }

    public function create()
    {
        $Users = User::pluck('name','id')->all();
        $Cars = Car::pluck('id','id')->all();
        $SubscriptionPlans = SubscriptionPlan::pluck('name','id')->all();

        return view('subscriptions.create', compact('Users','Cars','SubscriptionPlans'));
    }


    public function store(Request $request)
    {
            $data = $request->all();

            $subscription = new Subscription;
            $subscription->user_id = isset($data['client_uuid']) ? User::where('uuid', $data['client_uuid'])->value('id') : null;
            $subscription->subscription_plan_id =  isset($data['plan_uuid']) ? SubscriptionPlan::where('uuid', $data['plan_uuid'])->value('id') : null;
            $subscription->user_vehicle_id = isset($data['vehicle_uuid']) ? UserDataVehicles::where('uuid', $data['vehicle_uuid'])->value('id') : null;
            //$subscription->subscription_pay_id = isset($data['subscription_pay_id']) ? SubscriptionPay::where('uuid', $data['subscription_pay_id'])->value('id') : null;
            $subscription->status = "pendiente";
            $subscription->start_date = \Carbon\Carbon::now();
            //$subscription->end_date = $data['end_date'];
            $subscription->save();

            Alert::success('Mensaje existoso', 'Subscripcion Creada');
            return redirect()->route('admin.subscriptions.index');

    }


    public function show($id)
    {
        $subscription = Subscription::with('user','car','subscriptionplan')->findOrFail($id);

        return view('subscriptions.show', compact('subscription'));
    }


    public function edit($id)
    {
        $subscription = Subscription::findOrFail($id);
        $Users = User::pluck('name','id')->all();
        $Cars = Car::pluck('id','id')->all();
        $SubscriptionPlans = SubscriptionPlan::pluck('name','id')->all();

        return view('subscriptions.edit', compact('subscription','Users','Cars','SubscriptionPlans'));
    }

    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $subscription = Subscription::findOrFail($id);
            $subscription->update($data);

            return redirect()->route('subscriptions.subscription.index')
                ->with('success_message', 'Subscription was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function destroy(Request $request)
    {
        $request = $request->all();
        $uuid = $request['uuid'];

        $subscription = Subscription::where('uuid', $uuid)->first();
        $subscription->delete();

        Alert::success('Mensaje existoso', 'Registro Eliminado');
        return redirect()->route('admin.subscriptions.index');
    }

    public function massDestroy(Request $request)
    {
        $request = $request->all();
        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $subscriptions = Subscription::whereIn('uuid', $uuidsArray)->get();
        foreach ($subscriptions as $item) {
                $item->delete();
        }

        Alert::success('Mensaje existoso', 'Registro Eliminados');
        return redirect()->route('admin.subscriptions.index');

    }


    public function getUserCars($uuid)
    {
        $user = User::where('uuid', $uuid)->first();
        $vehicles = $user->userDataVehicles;
        return view('subscriptionsmodule::admin.subscriptions.forms.vehicle', ['data' => $vehicles]);
    }

    public function getPlans($uuid)
    {
        //buscamos el vehiculo
        $vehicle = UserDataVehicles::where('uuid', $uuid)->first();

        //traemos el plan que tenga type = a $vehicle->type
        $plans = SubscriptionPlan::where('type', $vehicle->type)->get();
        return view('subscriptionsmodule::admin.subscriptions.forms.plans', ['data' => $plans]);
    }

}
