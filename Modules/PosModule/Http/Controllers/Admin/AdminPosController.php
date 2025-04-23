<?php

namespace Modules\PosModule\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Vehicles\Entities\UserDataVehicles;
use Modules\PosModule\Entities\Washeds;
use Modules\PosModule\Http\Services\Admin\Pos\PosSearchService;
use Illuminate\Support\Carbon;
use DataTables;
Use Alert;

//Model User
use App\Models\User;
use Modules\SubscriptionsModule\Entities\Subscription;

//controller
use App\Http\Controllers\AdminBaseController;

class AdminPosController extends AdminBaseController
{

    protected $posSearchService;

    public function __construct(PosSearchService $posSearchService)
    {
        parent::__construct();
        $this->posSearchService = $posSearchService;
    }

    public function index()
    {
        $vehicles = UserDataVehicles::with('user','subscription')->get();
        return view('posmodule::admin.pos.index', ['vehicles' => $vehicles]);
    }

    public function indexDatatable(Request $request)
    {
        $searchParameters = [];
        $query = $this->posSearchService->buildQueryFromParameters($searchParameters);
        $dataTable = $this->posSearchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function searchDatatable(Request $request)
    {
        $searchParameters = $request->all();
        $query = $this->posSearchService->buildQueryFromParameters($searchParameters);
        $dataTable = $this->posSearchService->buildDatatable($query);
        return $dataTable->make(true);
    }


    public function store(Request $request)
    {
        // Obtiene la fecha actual
        $currentDate = Carbon::now()->toDateString();

        // Verifica si ya existe un registro de lavado para este vehículo en la fecha actual
        $existingWash = Washeds::where('vehicle_id', $request['vehicle_id'])
                                ->whereDate('created_at', $currentDate)
                                ->exists();

        // Si ya existe un registro de lavado para este vehículo en la fecha actual, muestra un mensaje de error
        if ($existingWash) {
            Alert::error('Error', 'Ya existe un registro de lavado para este vehículo hoy.');
            return redirect()->route('admin.washeds.index');
        }

        // Obtiene la suscripción del vehículo
        $subscription = Subscription::with('plan')
        ->where('user_vehicle_id', $request['vehicle_id'])
        ->where('status', 'Pagado')
        ->first();

        // Verifica si la suscripción está autorizada
        if (isset($subscription) && $subscription->status === 'Pagado') {
            // Si la suscripción está autorizada, procede a guardar el nuevo registro de lavado
            $vehicle = UserDataVehicles::with('user')->where('id', $request['vehicle_id'])->first();
            $user = $vehicle->user;
            $plan = $subscription->plan;

            $wash = new Washeds();
            $wash->user_id = $user->id;
            $wash->vehicle_id = $request['vehicle_id'];
            $wash->subscription_id = $subscription->id;
            $wash->plan_id = $plan->id;
            $wash->save();

            Alert::success('Mensaje existoso', 'Lavado registrado');
        } else {
            // Si la suscripción no está autorizada, muestra un mensaje de error
            Alert::error('Error', 'La suscripción no está activa.');
        }

        return redirect()->route('admin.washeds.index');
    }

    public function show($uuid)
    {
        $washed = Washeds::with('user','userVehicle','plan','subscription')->where('uuid', $uuid)->first();
        return view('posmodule::admin.pos.forms.show', ['data' => $washed]);
    }

    public function edit($uuid)
    {
        $washed = Washeds::with('user','userVehicle','plan','subscription')->where('uuid', $uuid)->first();
        $vehicles = UserDataVehicles::all();
        return view('posmodule::admin.pos.forms.edit', ['data' => $washed, 'vehicles' => $vehicles]);
    }

    public function update(Request $request)
    {
                // Obtiene la fecha actual
                $currentDate = Carbon::now()->toDateString();

                // Verifica si ya existe un registro de lavado para este vehículo en la fecha actual
                $existingWash = Washeds::where('vehicle_id', $request['vehicle_id'])
                                        ->whereDate('created_at', $currentDate)
                                        ->exists();

                // Si ya existe un registro de lavado para este vehículo en la fecha actual, muestra un mensaje de error
                if ($existingWash) {
                    Alert::error('Error', 'Ya existe un registro de lavado para este vehículo hoy.');
                    return redirect()->route('admin.washeds.index');
                }

                // Si no existe un registro de lavado para este vehículo en la fecha actual, procede a guardar el nuevo registro
                $vehicle = UserDataVehicles::with('user')->where('id', $request['vehicle_id'])->first();
                $user = $vehicle->user;
                $subscription = Subscription::with('plan')->where('user_vehicle_id', $request['vehicle_id'])->first();
                $plan = $subscription->plan;

                $wash = new Washeds();
                $wash->user_id = $user->id;
                $wash->vehicle_id = $request['vehicle_id'];
                $wash->subscription_id = $subscription->id;
                $wash->plan_id = $plan->id;
                $wash->created_at = $currentDate;
                $wash->update();

                Alert::success('Mensaje existoso', 'Lavado registrado');
                return redirect()->route('admin.washeds.index');
    }

    public function destroy(Request $request)
    {
        // $vehicle = UserDataVehicles::where('uuid', '=', $request['uuid_delete'])->first();
        // $vehicle->delete();

        // Alert::success('Mensaje existoso', 'Vehiculo Eliminado');
        // return redirect()->route('admin.vehicles.index');
    }

    public function massDestroy(Request $request)
    {
        // $request = $request->all();

        // $uuidsString = $request['uuids'][0];
        // $uuidsArray = explode(',', $uuidsString);

        // $vehicles = UserDataVehicles::whereIn('uuid', $uuidsArray)->get();
        // foreach ($vehicles as $item) {
        //         $item->delete();
        // }

        // Alert::success('Mensaje existoso', 'Registros Eliminados');
        // return redirect()->route('admin.vehicles.index');
    }

    //getUserCars
    public function getUserCars($id)
    {
        $vehicles = UserDataVehicles::where('user_id', $id)->get();
        return response()->json($vehicles);
    }


}
