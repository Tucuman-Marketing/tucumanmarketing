<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPriceHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'product_id',
        'price',
        'currency',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'price' => 'float',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
