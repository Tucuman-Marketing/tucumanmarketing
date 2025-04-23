<?php

namespace Modules\SubscriptionsModule\Entities;

use Illuminate\Database\Eloquent\Model;

//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionPlanService extends Model
{

    use AutoGenerateUuid, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subscription_plan_services';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'uuid',
                  'subscription_plan_id',
                  'service_id'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];



    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/


    public function SubscriptionPlan()
    {
        return $this->belongsTo('App\Models\SubscriptionPlan','subscription_plan_id','id');
    }


    public function Service()
    {
        return $this->belongsTo('App\Models\Service','service_id','id');
    }



}
