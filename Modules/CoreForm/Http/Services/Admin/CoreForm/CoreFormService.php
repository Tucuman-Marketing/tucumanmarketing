<?php

namespace Modules\CoreForm\Http\Services\Admin\CoreForm;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

//MODELS
use Modules\CoreForm\Entities\CoreForm;

class CoreFormService
{

    public function buildQueryFromParameters($searchParameters)
    {

        $query = CoreForm::with(['media'])->distinct();

        // buscamos por search_general en el campo name
        if (!empty($searchParameters['search_general'])) {
            $keywords = explode(' ', $searchParameters['search_general']);
            $query->where(function ($query) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $query->orWhere('core_forms.name', 'LIKE', '%' . $keyword . '%');
                }
            });
        }

        //buscamos por search_date
        if (!empty($searchParameters['search_date'])) {
            $searchDate = \Carbon\Carbon::createFromFormat('Y-m-d', $searchParameters['search_date'])->format('Y-m-d');
            $query->whereDate('core_forms.created_at', $searchDate);
        }

        //buscamos por fecha search_date_range
        if (!empty($searchParameters['search_date_range'])) {

            $searchDateRange = explode(' A ', $searchParameters['search_date_range']);
            $searchDateRangeStart = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $searchDateRange[0] . ' 00:00:00')->format('Y-m-d H:i:s');
            $searchDateRangeEnd = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $searchDateRange[1] . ' 23:59:59')->format('Y-m-d H:i:s');
            $query->whereBetween('core_forms.created_at', [$searchDateRangeStart, $searchDateRangeEnd]);
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
        ->rawColumns(['image']);

         return $datatable;
    }

}



