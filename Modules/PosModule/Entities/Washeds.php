<?php

namespace Modules\PosModule\Entities;

use Illuminate\Database\Eloquent\Model;
//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

//model
use Modules\SubscriptionsModule\Entities\SubscriptionPlan;
use Modules\SubscriptionsModule\Entities\Subscription;
use App\Models\User;
use Modules\Vehicles\Entities\UserDataVehicles;

class Washeds extends Model
{
    use AutoGenerateUuid, SoftDeletes;

    protected $table = 'washeds';
    protected $primaryKey = 'id';
    protected $fillable = [
                  'uuid',
                  'user_id',
                  'vehicle_id',
                  'subscription_id',
                  'plan_id',
                //  no se  utilizan los siguientes campos
                //   'type',
                //   'duration',
                  'created_at',
                  'updated_at',
                  'deleted_at',
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
        return $this->belongsTo(UserDataVehicles::class,'vehicle_id','id');
    }

    public function plan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'plan_id');
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }

    // public function washed()
    // {
    //     return $this->hasOne('App\Models\Washed','subscription_id','id');
    // }


}
