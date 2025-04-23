<?php

namespace Modules\Translations\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MultilanguageTextContent extends Model
{
    use HasFactory;

    protected $fillable = ['original_text', 'original_language_id'];

    // Relaciones
    public function language()
    {
        return $this->belongsTo(MultilanguageLanguage::class, 'original_language_id');
    }

    public function translations()
    {
        return $this->hasMany(MultilanguageTranslation::class, 'text_content_id');
    }
}
