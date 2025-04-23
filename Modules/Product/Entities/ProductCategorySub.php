<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductCategorySub extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_category_subs';

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
                  'icon',
                  'is_predefined',
                  'name',
                  'product_category_id',
                  'slug',
                  'sort_order',
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
     * Get the ProductCategory for this model.
     *
     * @return App\Models\ProductCategory
     */
    public function ProductCategory()
    {
        return $this->belongsTo('App\Models\ProductCategory','product_category_id','id');
    }

    /**
     * Get the product for this model.
     *
     * @return App\Models\Product
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product','product_sub_category_id','id');
    }

    /**
     * Get the productCombo for this model.
     *
     * @return App\Models\ProductCombo
     */
    public function productCombo()
    {
        return $this->hasOne('App\Models\ProductCombo','product_category_sub_id','id');
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
