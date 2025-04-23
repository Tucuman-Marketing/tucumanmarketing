<?php

namespace Modules\Translations\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MultilanguageTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['text_content_id', 'language_id', 'translation'];

    //table
    protected $table = 'multilanguage_translations';

    // Relaciones
    public function textContent()
    {
        return $this->belongsTo(MultilanguageTextContent::class, 'text_content_id');
    }

    public function language()
    {
        return $this->belongsTo(MultilanguageLanguage::class, 'language_id');
    }


}
