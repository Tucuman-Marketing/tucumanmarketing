<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPriceList extends Model
{
    use HasFactory;

    protected $table = 'product_price_lists';

    protected $fillable = [
        // Aquí debes agregar los nombres de las columnas que deseas que sean asignables en masa.
    ];

    // Aquí puedes agregar relaciones, por ejemplo, una lista de precios puede tener muchos precios de productos.
    public function productPrices()
    {
        return $this->hasMany(ProductPrice::class);
    }
}
