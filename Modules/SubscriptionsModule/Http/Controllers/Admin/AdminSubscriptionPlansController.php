<?php

namespace Modules\SubscriptionsModule\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\SubscriptionsModule\Entities\SubscriptionPlan;


use Modules\ServiceModule\Entities\Service;
use Illuminate\Http\Request;
use Exception;
use DataTables;
use Alert;
use Modules\SubscriptionsModule\Http\Services\Admin\Plans\PlansSearchService;

//service
use Modules\SubscriptionsModule\Http\Services\Admin\MercadoPago\MercadoPagoService;
use Modules\SubscriptionsModule\Entities\SubscriptionPlanService;

//CONTROLLERS
use App\Http\Controllers\AdminBaseController;
class AdminSubscriptionPlansController extends AdminBaseController
{

    protected $plansSearchService;
    protected $mercadoPagoService;

    public function __construct(PlansSearchService $plansSearchService , MercadoPagoService $mercadoPagoService)
    {
        parent::__construct();
        $this->plansSearchService = $plansSearchService;
        $this->mercadoPagoService = $mercadoPagoService;
    }

    public function index()
    {
        $services = Service::all();
        return view('subscriptionsmodule::admin.subscriptions_plans.index', compact('services'));
    }

    public function indexDatatable(Request $request)
    {
        // Parámetros de búsqueda vacíos para la carga inicial
        $searchParameters = [];
        $query = $this->plansSearchService->buildQueryFromParameters($searchParameters);
        $dataTable = $this->plansSearchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function store(Request $request)
    {

        $plan = new SubscriptionPlan();
        $plan->name = $request['name'];
        $plan->type = $request['type'];
        $plan->description = $request['description'];
        $plan->frequency = (int)$request['frequency'];
        $plan->frequency_type = $request['frequency_type'];
        $plan->billing_day = (int)$request['billing_day'];
        $plan->price = (int)$request['price'];
        //$plan->quantity_vehicles = (int)$request['quantity_vehicles'];
        $plan->save();

        $serviceIds = $request->input('service_id');
        // Asociar los servicios seleccionados con el plan de suscripción
        foreach ($serviceIds as $serviceId) {
            $plan->services()->attach($serviceId);
        }

        //creamos el plan en mercado pago
        $this->mercadoPagoService->createPlan($plan, $request);

        Alert::success('Mensaje existoso', 'Plan Creado');
        return redirect()->route('admin.plans.index');
    }

    public function show($uuid)
    {
        $plan = SubscriptionPlan::with('services')->where('uuid', $uuid)->first();
        $services = Service::pluck('name','id')->all();
        return view('subscriptionsmodule::admin.subscriptions_plans.forms.show', ['data' => $plan  , 'services' => $services]);
    }

    public function edit($uuid)
    {
        $plan = SubscriptionPlan::with('services')->where('uuid', $uuid)->first();
        $services = Service::pluck('name','id')->all();
        return view('subscriptionsmodule::admin.subscriptions_plans.forms.edit', ['data' => $plan , 'services' => $services]);
    }

    public function update(Request $request)
    {

        $plan = SubscriptionPlan::where('uuid', $request['uuid'])->first();
        $plan->name = $request['name'];
        $plan->type = $request['type'];
        $plan->description = $request['description'];
        $plan->frequency = (int)$request['frequency'];
        $plan->frequency_type = $request['frequency_type'];
        $plan->billing_day = (int)$request['billing_day'];
        $plan->price = (int)$request['price'];
        //$plan->quantity_vehicles = (int)$request['quantity_vehicles'];
        $plan->update();

        //actualizamos los services
        //preguntamos si existe $request['services']
        //eliminamos primero todas las relaciones para cargar de nuevo
        $plan->services()->detach();
        if(isset($request['services'])){
            $serviceIds = $request->input('services');
            foreach ($serviceIds as $serviceId) {
                $plan->services()->attach($serviceId);
            }
        }

        //editamos el plan en mercado pago
        $this->mercadoPagoService->editPlan($plan);

        Alert::success('Mensaje existoso', 'Plan Actualizado');
        return redirect()->route('admin.plans.index');
    }

    public function destroy(Request $request)
    {
        $plan = SubscriptionPlan::where('uuid', '=', $request['uuid_delete'])->first();
        $plan->delete();

        $services = $plan->services;
        foreach ($services as $service) {
            $plan->services()->detach($service->id);
        }

        Alert::success('Mensaje existoso', 'Plan Eliminado');
        return redirect()->route('admin.plans.index');
    }

    protected function getData(Request $request)
    {
        $rules = [
            'uuid' => 'nullable|string|min:0|max:255',
            'type' => 'nullable|string|min:0|max:255',
            'name' => 'nullable|string|min:0|max:255',
            'description' => 'nullable|string|min:0|max:255',
            'duration' => 'nullable|numeric|min:-2147483648|max:2147483647',
        ];

        $data = $request->validate($rules);

        return $data;
    }

}
