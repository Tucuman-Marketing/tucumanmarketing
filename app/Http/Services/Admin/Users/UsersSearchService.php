<?php

namespace App\Http\Services\Admin\Users;

use Yajra\DataTables\Facades\DataTables;
//MODELS
use App\Models\User;

class UsersSearchService
{
    public function buildQueryFromParameters($searchParameters)
    {


        $query = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'superadmin');
        })->get();

        //busqueda General en toda la tabla
        if (!empty($searchParameters['search_general'])) {
            $query->where(function ($query) use ($searchParameters) {
                $query->orWhere('users.name', 'LIKE', '%' . $searchParameters['search_general'] . '%')
                    ->orWhere('users.lastname', 'LIKE', '%' . $searchParameters['search_general'] . '%')
                    ->orWhere(function($query) use ($searchParameters) {
                    if (!empty($searchParameters['search_general'])) {
                        // Intenta convertir la fecha del formato "14 ago. 2023" a "Y-m-d"
                        $date = date('Y-m-d', strtotime($searchParameters['search_general']));
                        if ($date) {
                            $query->whereDate('users.created_at', '=', $date);
                        }
                    }
                });
            });
        }

        //buscamos por search_name
        if (!empty($searchParameters['search_name'])) {
            $keywords = explode(' ', $searchParameters['search_name']);
            foreach ($keywords as $keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('users.name', 'LIKE', '%' . $keyword . '%');
                });
            }
        }

        //buscamos por search_lastname
        if (!empty($searchParameters['search_lastname'])) {
            $keywords = explode(' ', $searchParameters['search_lastname']);
            foreach ($keywords as $keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('users.lastname', 'LIKE', '%' . $keyword . '%');
                });
            }
        }

         //buscamos por search_phone
         if (!empty($searchParameters['search_phone'])) {
            $keywords = explode(' ', $searchParameters['search_phone']);
            foreach ($keywords as $keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('users.phone', 'LIKE', '%' . $keyword . '%');
                });
            }
        }

        //buscamos por search_email
        if (!empty($searchParameters['search_email'])) {
            $keywords = explode(' ', $searchParameters['search_email']);
            foreach ($keywords as $keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('users.email', 'LIKE', '%' . $keyword . '%');
                });
            }
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
        ->addColumn('image', function ($model) {
            $lastMedia = $model->getMedia('image_header')->last();
            if ($lastMedia) {
                return '<img src="' . $lastMedia->getUrl('thumb') . '" class="img-fluid" style="max-width: 100px;">';
            }
            return '<img src="' . asset('theme-admin/velvet/assets/images/sin-imagen.jpg') . '" alt="..." class="img-fluid rounded" style="max-width: 100px;">';
        })

        ->editColumn('created_at', function ($model) {
            return $model->formattedShortDate;
        })
        ->rawColumns(['status','image', 'category','content']);
        return $datatable;

    }
}



