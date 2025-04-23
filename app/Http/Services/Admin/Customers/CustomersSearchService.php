<?php

namespace App\Http\Services\Admin\Customers;

use DataTables;
//MODELS
use App\Models\User;

class CustomersSearchService
{
    public function buildQueryFromParameters($searchParameters)
    {
        //limpiamos los parametros de busqueda de la session si existe
        if (session()->has('searchParameters')) {
            session()->forget('searchParameters');
        }
        //guardamos en una session los parametros de busqueda
        session(['searchParameters' => $searchParameters]);


        $query = User::doesntHave('roles')->with('media')->get();
        // //buscamos por search_amount
        // if (!empty($searchParameters['search_amount'])) {
        //     $query->where('amount', $searchParameters['search_amount']);
        // }

        // //buscamos por search_amount_usd
        // if (!empty($searchParameters['search_amount_usd'])) {
        //     $query->where('amount_usd', $searchParameters['search_amount_usd']);
        // }

        // //buscamos por search_description
        // if (!empty($searchParameters['search_description'])) {
        //     $query->where('detail', 'LIKE', '%' . $searchParameters['search_description'] . '%');
        // }

        // //buscamos por client
        // if (!empty($searchParameters['search_client'])) {
        //     $query->whereHas('client', function ($query) use ($searchParameters) {
        //         $query->where('id', $searchParameters['search_client']);
        //     });
        // }

        // //buscamos por fecha search_date
        // if (!empty($searchParameters['search_date'])) {
        //     $searchDate = \Carbon\Carbon::createFromFormat('d-m-Y', $searchParameters['search_date'])->format('Y-m-d');
        //     $query->whereDate('date', $searchDate);
        // }

        // //buscamos por remittance_number
        // if (!empty($searchParameters['search_remittance_number'])) {
        //     $query->where('remittance_number', 'LIKE', '%' . $searchParameters['search_remittance_number'] . '%');
        // }

        // //buscamos por invoice_number
        // if (!empty($searchParameters['search_invoice_number'])) {
        //     $query->where('invoice_number', 'LIKE', '%' . $searchParameters['search_invoice_number'] . '%');
        // }

        // //buscamos por fecha search_date_range
        // if (!empty($searchParameters['search_date_range'])) {
        //     $searchDateRange = explode(' - ', $searchParameters['search_date_range']);
        //     $searchDateRangeStart = \Carbon\Carbon::createFromFormat('d-m-Y H:i:s', $searchDateRange[0] . ' 00:00:00')->format('Y-m-d H:i:s');
        //     $searchDateRangeEnd = \Carbon\Carbon::createFromFormat('d-m-Y H:i:s', $searchDateRange[1] . ' 23:59:59')->format('Y-m-d H:i:s');
        //     $query->whereBetween('date', [$searchDateRangeStart, $searchDateRangeEnd]);
        // }

        // //buscaremos por category
        // if (!empty($searchParameters['search_category'])) {
        //     $query->whereHas('category', function ($query) use ($searchParameters) {
        //         $query->where('id', $searchParameters['search_category']);
        //     });
        // }

        // // Buscar por cliente (employee)
        // if (!empty($searchParameters['search_employee'])) {
        //     $query->whereHas('employee', function ($query) use ($searchParameters) {
        //         $query->where('id', $searchParameters['search_employee']);
        //     });
        // }

        // //buscamos por sector
        // if (!empty($searchParameters['search_sector'])) {
        //     $query->whereHas('sector', function ($query) use ($searchParameters) {
        //         $query->where('id', $searchParameters['search_sector']);
        //     });
        // }

        // //buscamos por search_unit
        // if (!empty($searchParameters['search_unit'])) {
        //     $query->whereHas('unit', function ($query) use ($searchParameters) {
        //         $query->where('id', $searchParameters['search_unit']);
        //     });
        // }

        // //buscamos por search_unit_category
        // if (!empty($searchParameters['search_unit_category'])) {
        //     $query->whereHas('unitCategory', function ($query) use ($searchParameters) {
        //         $query->where('id', $searchParameters['search_unit_category']);
        //     });
        // }

        // //search_unit_category
        // if (!empty($searchParameters['search_unit_subcategory'])) {
        //     $query->whereHas('unitSubcategory', function ($query) use ($searchParameters) {
        //         $query->where('id', $searchParameters['search_unit_subcategory']);
        //     });
        // }


        return $query;
    }

    public function buildDatatable($query)
    {

        //return make true
        return DataTables::of($query)
        ->addColumn('image', function ($row) {
            return $row->media->first() ? $row->media->first()->url : '';
        });


        /*--------------COLUMNAS VIRTUALES----------------- */
        // ->addColumn('category_name', function ($query) {
        //     return $query->category ? $query->category->name : 'N/A';
        // })
        // ->addColumn('sector_name', function ($query) {
        //     return  $query->sector ? $query->sector->name : 'N/A';
        // })
        // ->addColumn('employee_name', function ($query) {
        //     return $query->employee ? $query->employee->name : 'N/A';
        // })
        // ->addColumn('item_name', function ($query) {
        //     return $query->unit ? $query->unit->name : 'N/A';
        // })
        // ->addColumn('item_category', function ($query) {
        //     return $query->unitCategory ? $query->unitCategory->name : 'N/A';
        // })
        // ->addColumn('item_category_subcategory', function ($query) {
        //     return $query->unitSubcategory ?  $query->unitSubcategory->name : 'N/A';
        // })
        // ->addColumn('employee_sec1_name', function ($query) {
        //     return $query->employeeSec1 ? $query->employeeSec1->name : 'N/A';
        // })
        // ->addColumn('employee_sec2_name', function ($query) {
        //     return $query->employeeSec2 ? $query->employeeSec2->name : 'N/A';
        // })


        // /*--------------ORDENAMIENTO----------------- */
        // ->orderColumn('category_name', function ($query, $order) {
        //     $query->join('cf_categories', 'cf_cash_flows.category_id', '=', 'cf_categories.id')
        //           ->orderBy('cf_categories.name', $order);
        // })
        // ->orderColumn('sector_name', function ($query, $order) {
        //     $query->join('cf_sectors', 'cf_cash_flows.sector_id', '=', 'cf_sectors.id')
        //           ->orderBy('cf_sectors.name', $order);
        // })
        // ->orderColumn('employee_name', function ($query, $order) {
        //     $query->join('employees', 'cf_cash_flows.employee_id', '=', 'employees.id')
        //             ->orderBy('employees.name', $order);
        // })
        // ->orderColumn('client_name', function ($query, $order) {
        //     $query->join('clients', 'cf_cash_flows.client_id', '=', 'clients.id')
        //             ->orderBy('clients.name', $order);
        // })
        // ->orderColumn('item_name', function ($query, $order) {
        //     $query->join('cf_units', 'cf_cash_flows.unit_id', '=', 'cf_units.id')
        //             ->orderBy('cf_units.name', $order);
        // })
        // ->orderColumn('item_category', function ($query, $order) {
        //     $query->join('cf_unit_category', 'cf_cash_flows.unit_category_id', '=', 'cf_unit_category.id')
        //     ->orderBy('cf_unit_category.name', $order);
        // })
        // ->orderColumn('employee_sec1_name', function ($query, $order) {
        //     $query->join('employees', 'cf_cash_flows.employee_sec1_id', '=', 'employees.id')
        //             ->orderBy('employees.name', $order);
        // })
        // ->orderColumn('employee_sec2_name', function ($query, $order) {
        //     $query->join('employees', 'cf_cash_flows.employee_sec2_id', '=', 'employees.id')
        //             ->orderBy('employees.name', $order);
        // });

    }
}



