<?php

namespace Modules\Recruitment\Http\Services\Admin;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

use Modules\Recruitment\Entities\RecruitmentJobs;
use DateTime;
use DateTimeZone;
//use DateTimeZone

class JobsService
{
    public function buildQueryFromParameters($searchParameters)
    {

        $query = RecruitmentJobs::select([
            'recruitment_jobs.uuid',
            'recruitment_jobs.id',
            'recruitment_jobs.title',
            'recruitment_jobs.description',
            'recruitment_jobs.status_id',
            'recruitment_jobs.category_id',
            'recruitment_jobs.created_at',
            'recruitment_statuses.name as status_name',
            'recruitment_statuses.color as status_color',
            'recruitment_categories.name as category_name',
            'recruitment_categories.color as category_color',
        ])
        ->with(['status','category','tags', 'skills', 'candidates'])
        ->leftJoin('recruitment_statuses', 'recruitment_jobs.status_id', '=', 'recruitment_statuses.id')
        ->leftJoin('recruitment_categories', 'recruitment_jobs.category_id', '=', 'recruitment_categories.id')
        ->distinct();

             //busqueda General en toda la tabla
             if (!empty($searchParameters['search_general'])) {
                 $query->where(function ($query) use ($searchParameters) {
                     $query->orWhere('recruitment_jobs.title', 'LIKE', '%' . $searchParameters['search_general'] . '%')
                     ->orWhere('recruitment_jobs.description', 'LIKE', '%' . $searchParameters['search_general'] . '%')
                     ->orWhere(function($query) use ($searchParameters) {
                        if (!empty($searchParameters['search_general'])) {
                            // Intenta convertir la fecha del formato "14 ago. 2023" a "Y-m-d"
                            $date = date('Y-m-d', strtotime($searchParameters['search_general']));
                            if ($date) {
                                $query->whereDate('recruitment_jobs.created_at', '=', $date);
                            }
                        }
                    });
                });
             }

            //buscamos por search_title
            if (!empty($searchParameters['search_title'])) {
                $keywords = explode(' ', $searchParameters['search_title']);
                foreach ($keywords as $keyword) {
                    $query->where(function ($query) use ($keyword) {
                        $query->where('recruitment_jobs.title', 'LIKE', '%' . $keyword . '%');
                    });
                }
            }

            //buscamos por status
            if (!empty($searchParameters['search_status'])) {
                $query->where('recruitment_statuses.name', 'LIKE', '%' . $searchParameters['search_status'] . '%');
            }

            //buscamos por categoria
            if (!empty($searchParameters['search_category'])) {
                $query->where('recruitment_categories.name', 'LIKE', '%' . $searchParameters['search_category'] . '%');
            }

             //buscamos por search_date
            if (!empty($searchParameters['search_date'])) {
                $searchDate = \Carbon\Carbon::createFromFormat('Y-m-d', $searchParameters['search_date'])->format('Y-m-d');
                $query->whereDate('recruitment_jobs.created_at', $searchDate);
            }

            //buscamos por fecha search_date_range
            if (!empty($searchParameters['search_date_range'])) {

                $searchDateRange = explode(' A ', $searchParameters['search_date_range']);
                $searchDateRangeStart = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $searchDateRange[0] . ' 00:00:00')->format('Y-m-d H:i:s');
                $searchDateRangeEnd = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $searchDateRange[1] . ' 23:59:59')->format('Y-m-d H:i:s');
                $query->whereBetween('recruitment_jobs.created_at', [$searchDateRangeStart, $searchDateRangeEnd]);
            }

        return $query;
    }

    public function buildDatatable($query)
    {
        $datatable =  DataTables::of($query)

        ->addColumn('title', function ($job) {
            return $job->title ?? 'Sin Autor';
        })
        ->editColumn('description', function ($post) {
            return strlen($post->description) > 50 ? substr($post->description, 0, 50) . '...' : $post->description;
        })
        ->addColumn('status', function ($job) {
            return $job->status ? '<span class="badge" style="background-color: ' . $job->status->color . '; color: #000;">' . $job->status->name . '</span>' : 'Sin Estatus' ;
        })
        ->addColumn('category', function ($job) {
            return $job->category ? '<span class="badge" style="background-color: ' . $job->category->color . '; color: #000;">' . $job->category->name . '</span>' : 'Sin categoría';
        })
        ->editColumn('created_at', function ($job) {
            return $job->formattedShortDate;
        })


        //ORDER COLUMN
        ->orderColumn('title', function ($query, $order) {
            $query->orderByRaw("recruitment_jobs.title $order");
        })
        ->orderColumn('description', function ($query, $order) {
            $query->orderByRaw("recruitment_jobs.description $order");
        })
        ->rawColumns(['status', 'category','description']);

         return $datatable;
    }

}
