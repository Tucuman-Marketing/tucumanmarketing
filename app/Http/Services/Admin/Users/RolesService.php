<?php

namespace App\Http\Services\Admin\Users;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

use Modules\Blog\Entities\BlogPost;
use DateTime;
use DateTimeZone;
//MODELS
use App\Models\Role;


class RolesService
{
    public function buildQueryFromParameters($searchParameters)
    {

        $query = Role::distinct();

          //busqueda General en toda la tabla
        if (!empty($searchParameters['search_general'])) {
            $query->where(function ($query) use ($searchParameters) {
                $query->where('roles.name', 'LIKE', '%' . $searchParameters['search_general'] . '%');
            });
         }

         //buscamos por search_date
         if (!empty($searchParameters['search_date'])) {
             $searchDate = \Carbon\Carbon::createFromFormat('Y-m-d', $searchParameters['search_date'])->format('Y-m-d');
             $query->whereDate('roles.created_at', $searchDate);
         }

         //buscamos por fecha search_date_range
         if (!empty($searchParameters['search_date_range'])) {

             $searchDateRange = explode(' A ', $searchParameters['search_date_range']);
             $searchDateRangeStart = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $searchDateRange[0] . ' 00:00:00')->format('Y-m-d H:i:s');
             $searchDateRangeEnd = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $searchDateRange[1] . ' 23:59:59')->format('Y-m-d H:i:s');
             $query->whereBetween('roles.created_at', [$searchDateRangeStart, $searchDateRangeEnd]);
         }

        return $query;
    }

    public function buildDatatable($query)
    {
        $datatable =  DataTables::of($query);
        return $datatable;
    }

}



