<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('multilanguage_entities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model_type');  // Modelo relacionado (ejemplo: App\Models\Ticket)
            $table->unsignedBigInteger('model_id');  // ID del modelo relacionado
            
            $table->text('original_text');
            $table->unsignedBigInteger('original_language_id');

            // $table->json('translation_ids');  
            $table->json('translations')->nullable();
            $table->timestamps();

            $table->foreign('original_language_id')->references('id')->on('multilanguage_languages')->onDelete('cascade');
            $table->unique(['model_type', 'model_id']);  // para garantizar que solo haya una entrada por entidad
        });
    }

    public function down()
    {
        Schema::dropIfExists('multilanguage_entities');
    }
};
