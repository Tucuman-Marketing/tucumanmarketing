<?php

namespace Modules\SubscriptionsModule\Entities;

use Illuminate\Database\Eloquent\Model;
//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionPay extends Model
{

    use AutoGenerateUuid, SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subscription_pays';

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
                  'subscription_id',
                  'amount',
                  'payment_date',
                  'next_payment_date',
                  'payment_type',
                  'payment_preference_id',
                  'payment_method'
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


    public function Subscription()
    {
        return $this->belongsTo('App\Models\Subscription','subscription_id','id');
    }

    public function paymentPreference()
    {
        return $this->belongsTo('App\Models\PaymentPreference','payment_preference_id');
    }


}
