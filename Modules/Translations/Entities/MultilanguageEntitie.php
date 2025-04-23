<?php

namespace Modules\Translations\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MultilanguageEntitie extends Model
{
    use HasFactory;

    protected $table = 'multilanguage_entities';

    protected $casts = [
        'translations' => 'array',
    ];

    protected $fillable = [
        'model_type',
        'model_id',
        'translation_ids',
        'original_text',
        'original_language_id',
    ];

    /**
     * Obtener el modelo relacionado.
     */
    public function translatableModel()
    {
        return $this->morphTo(null, 'model_type', 'model_id');
    }


    /**
     * Función para obtener fácilmente las traducciones relacionadas.
     *
     * @param string $attribute El atributo que quieres traducir.
     * @return Modules\Translations\Entities\MultilanguageTextContent|null
     */
    // public function getTranslationForAttribute(string $attribute)
    // {
    //     $translationIds = json_decode($this->translation_ids, true);
    //     $textContentId = $translationIds[$attribute] ?? null;

    //     if ($textContentId) {
    //         return MultilanguageTextContent::find($textContentId);
    //     }

    //     return null;
    // }

    public function getTranslationForAttribute(string $languageCode)
    {
        return $this->translations[$languageCode] ?? null;
    }

    public function getTranslation($languageCode)
    {
        return $this->translations[$languageCode] ?? null;
    }

    public function setTranslation($languageCode, $value)
    {
        $this->translations[$languageCode] = $value;
    }
}
