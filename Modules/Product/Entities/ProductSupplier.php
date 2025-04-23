<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductSupplier extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_suppliers';

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
                  'address',
                  'business_name',
                  'contact',
                  'email',
                  'filename',
                  'image',
                  'is_predefined',
                  'observation',
                  'phone',
                  'skype',
                  'sort_order',
                  'status',
                  'tax_id',
                  'uuid',
                  'visit_day'
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
     * Get the tax for this model.
     *
     * @return App\Models\Tax
     */
    public function tax()
    {
        return $this->belongsTo('App\Models\Tax','tax_id');
    }

    /**
     * Get the product for this model.
     *
     * @return App\Models\Product
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product','product_supplier_id','id');
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
