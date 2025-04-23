<?php

namespace Modules\Translations\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Translations\Database\Seeders\LanguagesTableSeeder;

class TranslationsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //add LanguagesTableSeeder
        $this->call(LanguagesTableSeeder::class);
        // $this->call("OthersTableSeeder");
    }
}
