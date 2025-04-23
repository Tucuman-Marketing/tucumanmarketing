<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductComboProduct extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_combo_products';

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
                  'product_combo_id',
                  'product_id',
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
     * Get the productCombo for this model.
     *
     * @return App\Models\ProductCombo
     */
    public function productCombo()
    {
        return $this->belongsTo('App\Models\ProductCombo','product_combo_id');
    }

    /**
     * Get the Product for this model.
     *
     * @return App\Models\Product
     */
    public function Product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
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

}
