<?php

namespace Modules\SubscriptionsModule\Http\Services\Admin\Subscriptions;

use Modules\SubscriptionsModule\Entities\SubscriptionPlan;
use Modules\SubscriptionsModule\Entities\Subscription;

use DataTables;
use Illuminate\Support\Facades\DB;



class SubscriptionsSearchService
{


    public function buildQueryFromParameters($searchParameters)
    {
        //limpiamos los parametros de busqueda de la session si existe
        if (session()->has('searchParameters')) {
            session()->forget('searchParameters');
        }
        //guardamos en una session los parametros de busqueda
        session(['searchParameters' => $searchParameters]);


        $query = Subscription::with('user.media','userVehicle.media','plan')
        ->select('subscriptions.*')
        ->join('user_data_vehicles', 'subscriptions.user_vehicle_id', '=', 'user_data_vehicles.id')
        ->leftJoin('subscription_plans', 'subscriptions.subscription_plan_id', '=', 'subscription_plans.id')
        ->leftJoin('users', 'subscriptions.user_id', '=', 'users.id')
        ->leftJoin('subscription_pays', 'subscriptions.subscription_pay_id', '=', 'subscription_pays.subscription_id');



        return $query;
    }


    public function buildDatatable($query,$request)
    {
         return DataTables::of($query)

        /*--------------COLUMNAS VIRTUALES----------------- */
        ->addColumn('user_name', function ($query) {
            return $query->user ? $query->user->name . ' ' . $query->user->lastname : 'N/A';
        })
        ->addColumn('user_image', function ($query) {
            return $query->user->media->first() ? $query->user->media->first()->url : '';
        })
        ->addColumn('vehicle_image', function ($row) {
            return $row->userVehicle->media->first() ? $row->userVehicle->media->first()->url : '';
        })
        ->addColumn('plan_name', function ($query) {
            return $query->plan ? $query->plan->name : 'N/A';
        })
        ->addColumn('vehicle_name', function ($query) {
            return $query->userVehicle ? $query->userVehicle->brand . ' ' . $query->userVehicle->model . ' ' . $query->userVehicle->vehicle_plate : 'N/A';
        })

        /*--------------FILTRADO----------------- */
        ->filter(function ($query) use ($request) {
            if ($request->has('search') && isset($request->get('search')['value'])) {
                $searchValue = $request->get('search')['value'];
                $query->where(function ($query) use ($searchValue) {
                    $query->where(DB::raw("CONCAT(users.name, ' ', users.lastname)"), 'like', '%' . $searchValue . '%')
                        ->orWhere('subscription_plans.name', 'like', '%' . $searchValue . '%')
                        ->orWhere('subscriptions.status', 'like', '%' . $searchValue . '%')
                        ->orWhere(function ($query) use ($searchValue) {
                            $query->where('user_data_vehicles.brand', 'like', '%' . $searchValue . '%')
                                ->orWhere('user_data_vehicles.model', 'like', '%' . $searchValue . '%')
                                ->orWhere('user_data_vehicles.vehicle_plate', 'like', '%' . $searchValue . '%')
                                ->orWhere(DB::raw("CONCAT(user_data_vehicles.brand, ' ', user_data_vehicles.model, ' ', user_data_vehicles.vehicle_plate)"), 'like', '%' . $searchValue . '%');
                        });
                });
            }
        })
        /*--------------ORDENAMIENTO----------------- */
        ->orderColumn('user_name', 'users.name $1')
        ->orderColumn('plan_name', 'subscription_plans.name $1')
        ->orderColumn('vehicle_name', 'user_data_vehicles.vehicle_plate $1');

    }

}



