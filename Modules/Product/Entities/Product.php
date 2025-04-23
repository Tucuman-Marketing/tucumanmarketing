<?php

namespace Modules\Product\Entities;

use Carbon\Carbon;

//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\Model;

use Modules\Productos\Entities\ProductTax;
use Modules\Productos\Entities\ProductBrand;
use Modules\Productos\Entities\ProductCombo;
use Modules\Productos\Entities\ProductImage;
use Modules\Productos\Entities\ProductOffer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Productos\Entities\ProductReview;
use Modules\Productos\Entities\ProductCategory;
use Modules\Productos\Entities\ProductSupplier;
use Modules\Productos\Entities\ProductProductTag;
use Modules\Productos\Entities\ProductCategorySub;
use Modules\Productos\Entities\ProductComboProduct;
use Modules\Productos\Entities\ProductUnitsOfMeasure;

class Product extends Model
{
    use SoftDeletes;
    use AutoGenerateUuid;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'code',
        'sku',
        'barcode',
        'description',
        'slug',
        'warranty',
        'tax_id',
        'tax',
        'points',
        'alternate_code',
        'location',
        'bulk_code',
        'alert',
        'observations',
        'use_profitability',
        'short_description',
        'long_description',
        'enabled',
        'enabled_add_to_cart',
        'offer',
        'hot',
        'rating_count',

        //relaciones
        'unit_of_measure_id',
        'category_id',
        'sub_category_id',
        'brand_id',
        'supplier_id',
        'product_combo_id',

        //stock
        'stock_base_unit',
        'stock_quantity',
        'stock_units_per_item',
        'stock_total',
        'stock_critical_level',

        // Precios en USD
        'cost_price_usd_ex_tax',
        'cost_price_usd_in_tax',
        'sale_price_usd_ex_tax',
        'sale_price_usd_in_tax',
        'crossed_out_price_usd',

        // Precios en Pesos
        'cost_price_pesos_ex_tax',
        'cost_price_pesos_in_tax',
        'sale_price_pesos_ex_tax',
        'sale_price_pesos_in_tax',
        'crossed_out_price_pesos',

        //descuentos
        'discount',

        'sort_order',
        'is_protected'
    ];
    protected $dates = [];
    protected $casts = [];



    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/

    public function Brand()
    {
        return $this->belongsTo(ProductBrand::class, 'brand_id', 'id');
    }



    public function Category()
    {
        return $this->belongsTo(ProductCategory::class ,'category_id','id');
    }

    public function Combo()
    {
        return $this->belongsTo(ProductCombo::class,'product_combo_id');
    }

    public function CategorySub()
    {
        return $this->belongsTo(ProductCategorySub::class,'sub_category_id','id');
    }

    public function Supplier()
    {
        return $this->belongsTo(ProductSupplier::class,'supplier_id','id');
    }

    public function UnitsOfMeasure()
    {
        return $this->belongsTo(ProductUnitsOfMeasure::class,'unit_of_measure_id','id');
    }

    public function Tax()
    {
        return $this->belongsTo(ProductTax::class,'tax_id','id');
    }

    public function ComboProduct()
    {
        return $this->hasOne(ProductComboProduct::class,'product_id','id');
    }

    public function Image()
    {
        return $this->hasOne(ProductImage::class,'product_id','id');
    }

    public function Offer()
    {
        return $this->hasOne(ProductOffer::class,'product_id','id');
    }

    public function ProductTag()
    {
        return $this->hasOne(ProductProductTag::class,'product_id','id');
    }

    public function Review()
    {
        return $this->hasOne(ProductReview::class,'product_id','id');
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

    /*
    *-------------- Accessors and Mutators-----------------
    */


}
