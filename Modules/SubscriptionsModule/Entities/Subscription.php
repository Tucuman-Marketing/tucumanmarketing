<?php

namespace Modules\SubscriptionsModule\Entities;

use Illuminate\Database\Eloquent\Model;
//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

//model
use Modules\SubscriptionsModule\Entities\SubscriptionPlan;
use Modules\SubscriptionsModule\Entities\SubscriptionPay;
use App\Models\User;
use Modules\Vehicles\Entities\UserDataVehicles;
class Subscription extends Model
{
    use AutoGenerateUuid, SoftDeletes;

    protected $table = 'subscriptions';
    protected $primaryKey = 'id';
    protected $fillable = [
                'uuid',
                'user_id',
                'user_vehicle_id',
                'car_id',
                'subscription_plan_id',
                'subscription_pay_id',
                'start_date',
                'end_date',
                'price',
                'status',
                'last_edited_by_user_at',
                'next_edited_by_user_at',
                'created_at',
                'updated_at',
                'deleted_at',
                //MercadoPago
                'request',
                'response',
                'response_error',
                'mp_subscriptionId',
              ];


    protected $dates = ['start_date', 'end_date'];
    protected $casts = [];


    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/


    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }


    public function userVehicle()
    {
        return $this->belongsTo(UserDataVehicles::class,'user_vehicle_id','id');
    }

    public function plan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id');
    }

    public function pay()
    {
        return $this->belongsTo(SubscriptionPay::class, 'subscription_pay_id');
    }

    // public function washed()
    // {
    //     return $this->hasOne('App\Models\Washed','subscription_id','id');
    // }


}
