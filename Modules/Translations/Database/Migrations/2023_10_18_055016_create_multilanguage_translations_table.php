<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('multilanguage_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('group'); // Columna para el agrupador
            $table->string('key')->unique();
            $table->json('translations'); // JSON con las traducciones en diferentes idiomas
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('multilanguage_translations');
    }
};

