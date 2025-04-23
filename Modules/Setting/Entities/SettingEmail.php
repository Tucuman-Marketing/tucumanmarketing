<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//Traits
use App\Traits\AutoGenerateUuid;
use Modules\Translations\Traits\TraitTranslate;

class SettingEmail extends Model
{
    use HasFactory, AutoGenerateUuid, TraitTranslate;

    public $translatedAttributes = ['driver','host'];


    protected $guarded = [];
    // public $incrementing = false;
    protected $keyType = 'string';
    
    //table
    protected $table = 'setting_email';
    /*-------Accesores y mutadores------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    // protected static function newFactory()
    // {
    //     return \Modules\Setting\Database\factories\SettingEmailFactory::new();
    // }
}
