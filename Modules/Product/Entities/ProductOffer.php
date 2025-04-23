<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductOffer extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_offers';

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
                  'discount',
                  'end_date',
                  'is_predefined',
                  'product_id',
                  'sort_order',
                  'start_date',
                  'uuid'
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

    /**
     * Get the Product for this model.
     *
     * @return App\Models\Product
     */
    public function Product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }

    /**
     * Set the end_date.
     *
     * @param  string  $value
     * @return void
     */
    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = !empty($value) ? \DateTime::createFromFormat('j/n/Y', $value) : null;
    }

    /**
     * Set the start_date.
     *
     * @param  string  $value
     * @return void
     */
    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = !empty($value) ? \DateTime::createFromFormat('j/n/Y', $value) : null;
    }


    public function getCreatedAtAttribute($value)
    {
        $date = \DateTime::createFromFormat($this->getDateFormat(), $value);

        if ($date instanceof \DateTime) {
            return $date->format('j/n/Y g:i A');
        }

        return null;
    }

    public function getDeletedAtAttribute($value)
    {
        $date = \DateTime::createFromFormat($this->getDateFormat(), $value);

        if ($date instanceof \DateTime) {
            return $date->format('j/n/Y g:i A');
        }

        // Puedes decidir qué hacer si la fecha no se pudo parsear.
        // Por ejemplo, puedes devolver null, devolver la fecha original sin formato, lanzar una excepción, etc.
        return null;
    }

    public function getUpdatedAtAttribute($value)
    {
        $date = \DateTime::createFromFormat($this->getDateFormat(), $value);

        if ($date instanceof \DateTime) {
            return $date->format('j/n/Y g:i A');
        }
        return null;
    }


    public function getEndDateAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y');
    }

    /**
     * Get start_date in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getStartDateAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y');
    }


}
