<?php

namespace Modules\Recruitment\Http\Services\Admin;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

use Modules\Blog\Entities\BlogPost;
use DateTime;
use DateTimeZone;
//MODELS
use Modules\Recruitment\Entities\RecruitmentStatuses;

class StatusService
{
    public function buildQueryFromParameters($searchParameters)
    {

        $query = RecruitmentStatuses::distinct();

        //busqueda General en toda la tabla
        if (!empty($searchParameters['search_general'])) {
            $query->where(function ($query) use ($searchParameters) {
                $query->where('recruitment_statuses.name', 'LIKE', '%' . $searchParameters['search_general'] . '%');
            });
        }

        //buscamos por search_date
        if (!empty($searchParameters['search_date'])) {
            $searchDate = \Carbon\Carbon::createFromFormat('Y-m-d', $searchParameters['search_date'])->format('Y-m-d');
            $query->whereDate('recruitment_statuses.created_at', $searchDate);
        }

        //buscamos por fecha search_date_range
        if (!empty($searchParameters['search_date_range'])) {

            $searchDateRange = explode(' A ', $searchParameters['search_date_range']);
            $searchDateRangeStart = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $searchDateRange[0] . ' 00:00:00')->format('Y-m-d H:i:s');
            $searchDateRangeEnd = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $searchDateRange[1] . ' 23:59:59')->format('Y-m-d H:i:s');
            $query->whereBetween('recruitment_statuses.created_at', [$searchDateRangeStart, $searchDateRangeEnd]);
        }

        return $query;
    }

    public function buildDatatable($query)
    {
        $datatable =  DataTables::of($query)
        ->editColumn('icon', function ($status) {
            return '<i class="' . $status->icon . '" style="font-size: 24px; display: block; text-align: center;"></i>';
        })
        ->editColumn('color', function ($status) {
            return '<div style="background-color: ' . $status->color . '; width: 20px; height: 20px; border-radius: 50%; margin: auto;"></div>';
        })
        ->rawColumns(['icon','color']);
         return $datatable;
    }

}



