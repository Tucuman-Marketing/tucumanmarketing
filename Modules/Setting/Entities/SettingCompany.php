<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//Traits
use App\Traits\AutoGenerateUuid;

class SettingCompany extends Model
{
    use HasFactory, AutoGenerateUuid;

    protected $guarded = [];
    // public $incrementing = false;
    protected $keyType = 'string';
    //table
    protected $table = 'setting_company';
    
    /*-------Accesores y mutadores------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Setting\Database\factories\SettingCompanyFactory::new();
    // }
}
