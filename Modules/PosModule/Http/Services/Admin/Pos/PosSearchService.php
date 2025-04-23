<?php

namespace Modules\PosModule\Http\Services\Admin\Pos;

use Modules\PosModule\Entities\Washeds;

use DataTables;
use Illuminate\Support\Facades\DB;
class PosSearchService
{
    public function buildQueryFromParameters($searchParameters)
    {
        //limpiamos los parametros de busqueda de la session si existe
        if (session()->has('searchParameters')) {
            session()->forget('searchParameters');
        }
        //guardamos en una session los parametros de busqueda
        session(['searchParameters' => $searchParameters]);


        $query = Washeds::with('plan','userVehicle.media','userVehicle')
        ->select('washeds.*')
        ->join('user_data_vehicles', 'washeds.vehicle_id', '=', 'user_data_vehicles.id')
        ->leftJoin('subscriptions', 'washeds.subscription_id', '=', 'subscriptions.id')
        ->leftJoin('users', 'washeds.user_id', '=', 'users.id');

        //buscamos por client
        if (!empty($searchParameters['search_client'])) {
            $query->whereHas('user', function ($query) use ($searchParameters) {
                $query->where('name', 'like', '%' . $searchParameters['search_client'] . '%')
                      ->orWhere('lastname', 'like', '%' . $searchParameters['search_client'] . '%')
                      ->orWhere(DB::raw("CONCAT(name, ' ', lastname)"), 'like', '%' . $searchParameters['search_client'] . '%');
            });
        }

        // Buscamos por patente
        if (!empty($searchParameters['search_plate'])) {
            $query->whereHas('userVehicle', function ($query) use ($searchParameters) {
                $query->where('vehicle_plate', 'like', '%' . $searchParameters['search_plate'] . '%');
            });
        }

        // Buscamos por DNI
        if (!empty($searchParameters['search_dni'])) {
            $query->whereHas('user', function ($query) use ($searchParameters) {
                $query->where('dni', 'like', '%' . $searchParameters['search_dni'] . '%');
            });
        }

        return $query;
    }

    public function buildDatatable($query)
    {

        //return make true
         return DataTables::of($query)

        /*--------------COLUMNAS VIRTUALES----------------- */
        ->addColumn('vehicle_plate', function ($query) {
            return $query->userVehicle ? $query->userVehicle->vehicle_plate : 'N/A';
        })
        ->addColumn('vehicle_brand', function ($query) {
            return  $query->userVehicle ? $query->userVehicle->brand : 'N/A';
        })
        ->addColumn('vehicle_model', function ($query) {
            return $query->userVehicle ? $query->userVehicle->model : 'N/A';
        })
        ->addColumn('vehicle_type', function ($query) {
            return $query->userVehicle ? $query->userVehicle->type : 'N/A';
        })
        ->addColumn('vehicle_image', function ($row) {
            return $row->userVehicle->media->first() ? $row->userVehicle->media->first()->url : '';
        })
        ->addColumn('user_name', function ($query) {
            return $query->user ? $query->user->name . ' ' . $query->user->lastname : 'N/A';
        })
        ->addColumn('user_image', function ($query) {
            return $query->user->media->first() ? $query->user->media->first()->url : '';
        })



        // /*--------------ORDENAMIENTO----------------- */
        //ordenamiento para type
        ->orderColumn('vehicle_type', 'user_data_vehicles.type $1')

        //ordenamiento para vehicle_plate
        ->orderColumn('vehicle_plate', 'user_data_vehicles.vehicle_plate $1')

        //ordenamiento para vehicle_brand
        ->orderColumn('vehicle_brand', 'user_data_vehicles.brand $1')

        //ordenamiento para vehicle_model
        ->orderColumn('vehicle_model', 'user_data_vehicles.model $1')

        //ordenamiento para created_at
        ->orderColumn('created_at', 'user_data_vehicles.created_at $1')

        //ordenamiento por user_name
        ->orderColumn('user_name', 'users.name $1');

    }
}



