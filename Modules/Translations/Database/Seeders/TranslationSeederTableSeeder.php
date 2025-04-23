<?php

namespace Modules\Translations\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use MultilanguageTranslation
use Modules\Translations\Entities\MultilanguageTranslation;

class TranslationSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $localePaths = [
            // Define aquí los caminos a tus archivos de traducción
            // Ejemplo: base_path('Modules/NombreDelModulo/Resources/lang')
        ];

        foreach ($localePaths as $path) {
            if (file_exists($path) && is_dir($path)) {
                $locales = array_diff(scandir($path), array('..', '.'));

                foreach ($locales as $locale) {
                    $translations = include $path . '/' . $locale . '/es.php'; // Asegúrate de usar el archivo correcto

                    foreach ($translations as $key => $value) {
                        MultilanguageTranslation::updateOrCreate(
                            ['key' => $key, 'locale' => $locale],
                            ['translations' => json_encode([$locale => $value])]
                        );
                    }
                }
            }
        }
    }
}
