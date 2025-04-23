<?php

namespace Modules\SubscriptionsModule\Http\Controllers\Client;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//MODELS
use Modules\SubscriptionsModule\Entities\Subscription;
use Modules\SubscriptionsModule\Entities\SubscriptionPay;
use Modules\SubscriptionsModule\Entities\SubscriptionPlan;
use Modules\SubscriptionsModule\Http\Services\Client\Subscriptions\SubscriptionsSearchService;
use App\Models\User;
//CONTROLLERS
use App\Http\Controllers\AdminBaseController;
//SERVICES
use Modules\Vehicles\Entities\UserDataVehicles;
// LIBS
Use Alert;
use Illuminate\Support\Facades\Config;
use MercadoPago\SDK;
use MercadoPago\Item;
use MercadoPago\Preference;
use Carbon\Carbon;



class ClientSubscriptionsController extends AdminBaseController
{
    protected $subscriptionsSearchService;

    public function __construct(SubscriptionsSearchService $subscriptionsSearchService)
    {
        parent::__construct();
        $this->subscriptionsSearchService = $subscriptionsSearchService;
    }

    public function index()
    {
        $user = auth()->user();
        $vehicles = $user->userDataVehicles;
        $plans = SubscriptionPlan::with('services')->get();
        return view('subscriptionsmodule::client.subscriptions.index',compact('user','plans','vehicles'));
    }

    public function indexDatatable(Request $request)
    {
        $searchParameters = [];
        $query = $this->subscriptionsSearchService->buildQueryFromParameters($searchParameters);
        $dataTable = $this->subscriptionsSearchService->buildDatatable($query,$request);
        return $dataTable->make(true);
    }

    public function store(Request $request)
    {

            $data = $request->all();
            $user = auth()->user();

            //buscamos el plan con data plan_uuid
            $plan = SubscriptionPlan::where('uuid', $data['plan_uuid'])->first();
            //traemos todas las relaciones de este plan
            //$plan->load('services');

            $subscription = new Subscription;
            $subscription->user_id = $user->id;
            $subscription->subscription_plan_id =  isset($plan) ? $plan->id : null;
            $subscription->user_vehicle_id = isset($data['vehicle_uuid']) ? UserDataVehicles::where('uuid', $data['vehicle_uuid'])->value('id') : null;
            $subscription->status = "pendiente";
            $subscription->start_date = \Carbon\Carbon::now();
            //$subscription->end_date = $data['end_date'];
            $subscription->save();

            //Alert::success('Mensaje existoso', 'Subscripcion Creada');
            return redirect()->route('client.pays.payment', ['subscriptions' => $subscription->uuid ]);

    }

    public function show($uuid)
    {
        $subscription = Subscription::with('user','car','subscriptionplan')->where('uuid',$uuid)->first();
        return view('subscriptionsmodule::client.subscriptions.forms.show', ['data' => $subscription]);
    }

    public function edit($uuid)
    {
        $subscription = Subscription::where('uuid',$uuid)->first();
        $subscription->load('userVehicle','user','plan');
        $vehicles = UserDataVehicles::where('user_id', $subscription->user_id)->get();
        $plans = SubscriptionPlan::all();
        return view('subscriptionsmodule::client.subscriptions.forms.edit', ['data' => $subscription ,'vehicles' => $vehicles ,'plans' => $plans]);
    }

    public function update(Request $request)
    {
        // try {
            $data = $request->all();
            $subscription = Subscription::where('uuid', $data['uuid'])->first();
            // Comprueba si ha pasado al menos un mes desde la última edición
            //fecha actual
            $date = Carbon::now();

            if ($date >= $subscription->next_edited_by_user_at or $subscription->next_edited_by_user_at == null) {
                // Actualiza la suscripción y la marca como editada
                $subscription->user_vehicle_id = isset($data['vehicle_uuid']) ? UserDataVehicles::where('uuid', $data['vehicle_uuid'])->value('id') : null;
                $subscription->last_edited_by_user_at = Carbon::now();
                // Añade un mes a la fecha de la próxima edición
                $subscription->next_edited_by_user_at = Carbon::now()->addMonth();
                $subscription->save();

                Alert::success('Mensaje existoso', 'Subscripcion Modificada');
                return redirect()->route('client.subscriptions.index');
            } else {
                //mandamos en alert $subscription->next_edited_by_user_at
                Alert::error('Error', 'No puedes editar la suscripción hasta el ' . $subscription->next_edited_by_user_at);
                return redirect()->route('client.subscriptions.index');
            }






        // } catch (Exception $exception) {

        //     return back()->withInput()
        //         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        // }
    }

    public function destroy(Request $request)
    {
    }

    public function massDestroy(Request $request)
    {
    }


}
