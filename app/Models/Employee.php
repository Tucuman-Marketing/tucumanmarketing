<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{

    use SoftDeletes;
    use AutoGenerateUuid;


    public $timestamps = true;
    protected $table = 'employees';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'lote',
        'image',
        'image_filename',
        'thumbsnail',
        'thumbsnail_filename',
        'dni',
        'address',
        'phone',
        'country',
        'province',
        'city',
        'cp'
    ];

    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/


    //relacion con chasflow
    public function cashflow()
    {
        return $this->hasMany('Modules\CashFlow\Entities\CashFlow');
    }
}
