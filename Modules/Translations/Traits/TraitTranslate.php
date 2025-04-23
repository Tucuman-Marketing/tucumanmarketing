<?php
namespace Modules\Translations\Traits;

use Modules\Translations\Entities\MultilanguageLanguage as Language;
use Modules\Translations\Entities\MultilanguageTextContent as TextContent;
use Modules\Translations\Entities\MultilanguageTranslation as Translation;
use Modules\Translations\Entities\MultilanguageEntitie as TranslatableEntity;


trait TraitTranslate
{

    public function createLanguageTranslations($model) {

        $defaultLanguage = 'es'; // Español por defecto
        $defaultLanguageId = Language::where('code', $defaultLanguage)->value('id');

        $activeLanguages = Language::where('is_active', true)->pluck('code')->toArray();
        $entity = TranslatableEntity::firstOrNew([
            'model_type' => get_class($model),
            'model_id' => $model->id
        ]);

        $translations = json_decode($entity->translations, true) ?? [];

        if ($model->exists) {
                foreach ($model->translatedAttributes as $attribute) {
                    // Utiliza getAttributes para obtener el valor actual del atributo
                    $attributeValue = $model->getAttributes()[$attribute];
                    // Actualiza el idioma por defecto, mantiene los otros idiomas si ya existen
                    $translations[$attribute][$defaultLanguage] = $attributeValue;
                    // Para otros idiomas, conserva el valor existente o establece como vacío si no existe
                    foreach ($activeLanguages as $languageCode) {
                        if ($languageCode != $defaultLanguage && !isset($translations[$attribute][$languageCode])) {
                            $translations[$attribute][$languageCode] = ''; // Valor inicial vacío
                        }
                    }
                }


        } else {

              // Itera a través de cada atributo traducible
                foreach ($model->translatedAttributes as $attribute) {
                    // Utiliza getAttribute para obtener el valor actual del atributo
                    $attributeValue = $model->getAttribute($attribute);
                    // Actualiza el idioma por defecto, mantiene los otros idiomas si ya existen
                    $translations[$attribute][$defaultLanguage] = $attributeValue;
                    // Para otros idiomas, conserva el valor existente o establece como vacío si no existe
                    foreach ($activeLanguages as $languageCode) {
                        if ($languageCode != $defaultLanguage && !isset($translations[$attribute][$languageCode])) {
                            $translations[$attribute][$languageCode] = ''; // Valor inicial vacío
                        }
                    }
                }

        }


        // Elimina las traducciones de los atributos que ya no están en translatedAttributes
        foreach (array_keys($translations) as $attribute) {
            if (!in_array($attribute, $model->translatedAttributes)) {
                unset($translations[$attribute]);
            }
        }


        $entity->translations = json_encode($translations);
        $entity->original_text = json_encode(array_column($translations, $defaultLanguage));
        $entity->original_language_id = $defaultLanguageId;
        $entity->save();
    }


    // public function updateLanguageTranslations($model) {
    //     $defaultLanguage = 'es'; // Español por defecto

    //     // Encuentra la entidad de traducción existente. Si no existe, no hay nada que actualizar.
    //     $entity = TranslatableEntity::where([
    //         'model_type' => get_class($model),
    //         'model_id' => $model->id
    //     ])->first();

    //     if (!$entity) {
    //         return; // No hay traducciones existentes para actualizar.
    //     }

    //     $translations = json_decode($entity->translations, true) ?? [];

    //     foreach ($model->translatedAttributes as $attribute) {
    //         $currentValue = $model->getAttributes()[$attribute];
    //         $originalValue = $model->getOriginal($attribute);

    //         if ($currentValue != $originalValue) {
    //             $translations[$attribute][$defaultLanguage] = $currentValue;
    //         }
    //     }


    //     $entity->translations = json_encode($translations);
    //     $entity->original_text = json_encode(array_column($translations, $defaultLanguage));
    //     $entity->save();
    // }






    public function getAttribute($key)
    {
        if (in_array($key, $this->translatedAttributes)) {
            $translation = $this->getTranslation($key, app()->getLocale());
            if ($translation !== null) {
                return $translation;
            }
        }
        return parent::getAttribute($key);
    }


    public function getTranslatedAttribute($key, $locale = null) {
        if (in_array($key, $this->translatedAttributes)) {
            return $this->getTranslation($key, $locale);
        }
        return $this->getAttribute($key);
    }



    protected function getTranslation($key, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        $entity = TranslatableEntity::where([
            'model_type' => get_class($this),
            'model_id' => $this->id
        ])->first();

        if ($entity) {
            // Verificar si 'translations' ya es un array o necesita ser decodificado
            $translations = is_array($entity->translations) ?
                            $entity->translations :
                            json_decode($entity->translations, true);

            if (isset($translations[$key]) && isset($translations[$key][$locale])) {
                return $translations[$key][$locale];
            }

            if (isset($translations[$key]) && isset($translations[$key]['es'])) {
                return $translations[$key]['es'];
            }
        }

        return null;
    }



}
