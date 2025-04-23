<?php

namespace Modules\SubscriptionsModule\Entities;

use Illuminate\Database\Eloquent\Model;

//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

//model
//module service
use Modules\ServiceModule\Entities\Service;

class SubscriptionPlan extends Model
{

    use AutoGenerateUuid, SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subscription_plans';
    protected $primaryKey = 'id';
    protected $fillable = [
                    'uuid',
                    'type',
                    'name',
                    'description',
                    'duration',
                    'frequency',
                    'frequency_type',
                    'repetitions',
                    'billing_day',
                    'billing_day_proportional',
                    'request',
                    'response',
                    'response_error',
                    'price',
                    'quantity_vehicles',
                    'mp_planId',
              ];
    protected $dates = [];
    protected $casts = [];



    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/

    //services
    public function services()
    {
        return $this->belongsToMany(Service::class, 'subscription_plan_services', 'subscription_plan_id', 'service_id');
    }

    public function subscription()
    {
        return $this->hasOne('App\Models\Subscription','subscription_plan_id','id');
    }

    public function subscriptionPlanService()
    {
        return $this->hasOne('App\Models\SubscriptionPlanService','subscription_plan_id','id');
    }

    public function washed()
    {
        return $this->hasOne('App\Models\Washed','plan_id','id');
    }



}
