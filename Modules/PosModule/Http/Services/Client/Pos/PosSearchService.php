<?php

namespace Modules\PosModule\Http\Services\Client\Pos;

use Modules\PosModule\Entities\Washeds;
use Illuminate\Support\Facades\Auth;

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

        // Obtener el usuario autenticado
        $user = Auth::user();
        $userId = $user->id;

        $query = Washeds::with('plan', 'userVehicle.media', 'userVehicle')
            ->join('user_data_vehicles', 'washeds.vehicle_id', '=', 'user_data_vehicles.id')
            ->where('washeds.user_id', $userId);


        //buscamos por fecha search_date_range
        if (!empty($searchParameters['search_date_range'])) {
            $searchDateRange = explode(' a ', $searchParameters['search_date_range']);
            $searchDateRangeStart = \Carbon\Carbon::createFromFormat('d-m-Y H:i:s', $searchDateRange[0] . ' 00:00:00')->format('Y-m-d H:i:s');
            $searchDateRangeEnd = \Carbon\Carbon::createFromFormat('d-m-Y H:i:s', $searchDateRange[1] . ' 23:59:59')->format('Y-m-d H:i:s');
            $query->whereBetween('created_at', [$searchDateRangeStart, $searchDateRangeEnd]);
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
        ->orderColumn('created_at', 'washeds.created_at $1');

    }
}



