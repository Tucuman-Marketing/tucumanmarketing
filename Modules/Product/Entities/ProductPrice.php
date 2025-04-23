<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;

    protected $table = 'product_prices';

    protected $fillable = [
        // Aquí debes agregar los nombres de las columnas que deseas que sean asignables en masa.
    ];

    // Relación con ProductPriceList
    public function productPriceList()
    {
        return $this->belongsTo(ProductPriceList::class);
    }

    // Si tienes una relación con productos, aquí es donde la definirías.
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
