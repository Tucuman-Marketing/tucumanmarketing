<?php

namespace Modules\ServiceModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AutoGenerateUuid;


class Service extends Model
{
    use SoftDeletes;
    use AutoGenerateUuid;

    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'name',
        'description',
        'price',
        'status',
    ];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'price' => 'decimal:2',
        'status' => 'boolean',
    ];



    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/

//     protected static function newFactory()
//     {
//         return \Modules\ServiceModule\Database\factories\ServiceFactory::new();
//     }
}
