<?php

namespace Modules\Translations\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MultilanguageLanguage extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    //table
    protected $table = 'multilanguage_languages';

    // Relaciones
    public function textContents()
    {
        return $this->hasMany(MultilanguageTextContent::class, 'original_language_id');
    }

    public function translations()
    {
        return $this->hasMany(MultilanguageTranslation::class, 'language_id');
    }

}
