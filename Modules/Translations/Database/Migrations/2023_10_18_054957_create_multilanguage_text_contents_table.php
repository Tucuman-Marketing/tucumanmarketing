<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('multilanguage_text_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('original_text');
            $table->unsignedBigInteger('original_language_id');
            $table->timestamps();

            $table->foreign('original_language_id')->references('id')->on('multilanguage_languages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('multilanguage_text_contents');
    }
};
