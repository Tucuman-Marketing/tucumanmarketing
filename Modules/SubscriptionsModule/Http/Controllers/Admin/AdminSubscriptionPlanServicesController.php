<?php

namespace Modules\SubscriptionsModule\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\SubscriptionPlan;
use App\Models\SubscriptionPlanService;
use Illuminate\Http\Request;
use Exception;
//CONTROLLERS
use App\Http\Controllers\AdminBaseController;
class AdminSubscriptionPlanServicesController extends AdminBaseController
{

    /**
     * Display a listing of the subscription plan services.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $subscriptionPlanServices = SubscriptionPlanService::with('subscriptionplan','service')->paginate(25);

        return view('subscription_plan_services.index', compact('subscriptionPlanServices'));
    }

    /**
     * Show the form for creating a new subscription plan service.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $SubscriptionPlans = SubscriptionPlan::pluck('id','id')->all();
$Services = Service::pluck('id','id')->all();

        return view('subscription_plan_services.create', compact('SubscriptionPlans','Services'));
    }

    /**
     * Store a new subscription plan service in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            SubscriptionPlanService::create($data);

            return redirect()->route('subscription_plan_services.subscription_plan_service.index')
                ->with('success_message', 'Subscription Plan Service was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified subscription plan service.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $subscriptionPlanService = SubscriptionPlanService::with('subscriptionplan','service')->findOrFail($id);

        return view('subscription_plan_services.show', compact('subscriptionPlanService'));
    }

    /**
     * Show the form for editing the specified subscription plan service.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $subscriptionPlanService = SubscriptionPlanService::findOrFail($id);
        $SubscriptionPlans = SubscriptionPlan::pluck('id','id')->all();
$Services = Service::pluck('id','id')->all();

        return view('subscription_plan_services.edit', compact('subscriptionPlanService','SubscriptionPlans','Services'));
    }

    /**
     * Update the specified subscription plan service in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $subscriptionPlanService = SubscriptionPlanService::findOrFail($id);
            $subscriptionPlanService->update($data);

            return redirect()->route('subscription_plan_services.subscription_plan_service.index')
                ->with('success_message', 'Subscription Plan Service was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified subscription plan service from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $subscriptionPlanService = SubscriptionPlanService::findOrFail($id);
            $subscriptionPlanService->delete();

            return redirect()->route('subscription_plan_services.subscription_plan_service.index')
                ->with('success_message', 'Subscription Plan Service was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'uuid' => 'nullable|string|min:0|max:255',
            'subscription_plan_id' => 'nullable',
            'service_id' => 'nullable',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
