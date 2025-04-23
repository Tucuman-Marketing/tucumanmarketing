<?php

namespace Modules\Translations\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            ['id' => 1, 'code' => 'es', 'name' => 'Español', 'is_active' => 1],
            ['id' => 2, 'code' => 'en', 'name' => 'Inglés', 'is_active' => 1],
            ['id' => 3, 'code' => 'zh', 'name' => 'Chino mandarín', 'is_active' => 0],
            ['id' => 4, 'code' => 'hi', 'name' => 'Hindi', 'is_active' => 0],
            ['id' => 5, 'code' => 'ar', 'name' => 'Árabe', 'is_active' => 0],
            ['id' => 6, 'code' => 'bn', 'name' => 'Bengali', 'is_active' => 0],
            ['id' => 7, 'code' => 'pt', 'name' => 'Portugués', 'is_active' => 0],
            ['id' => 8, 'code' => 'ru', 'name' => 'Ruso', 'is_active' => 0],
            ['id' => 9, 'code' => 'ja', 'name' => 'Japonés', 'is_active' => 0],
            ['id' => 10, 'code' => 'pa', 'name' => 'Punjabi', 'is_active' => 0],
            ['id' => 11, 'code' => 'de', 'name' => 'Alemán', 'is_active' => 0],
            ['id' => 12, 'code' => 'jv', 'name' => 'Javanés', 'is_active' => 0],
            ['id' => 13, 'code' => 'ms', 'name' => 'Malayo/Indonesio', 'is_active' => 0],
            ['id' => 14, 'code' => 'te', 'name' => 'Telugu', 'is_active' => 0],
            ['id' => 15, 'code' => 'vi', 'name' => 'Vietnamita', 'is_active' => 0],
            ['id' => 16, 'code' => 'ko', 'name' => 'Coreano', 'is_active' => 0],
            ['id' => 17, 'code' => 'fr', 'name' => 'Francés', 'is_active' => 0],
            ['id' => 18, 'code' => 'mr', 'name' => 'Marathi', 'is_active' => 0],
            ['id' => 19, 'code' => 'ta', 'name' => 'Tamil', 'is_active' => 0],
            ['id' => 20, 'code' => 'ur', 'name' => 'Urdu', 'is_active' => 0],
        ];

        DB::table('multilanguage_languages')->insert($languages);
    }
}
