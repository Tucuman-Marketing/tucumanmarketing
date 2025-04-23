<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('core_forms', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name'); // Agregado
            $table->longText('instruction');
            $table->longText('create')->nullable();
            $table->longText('edit')->nullable();
            $table->integer('sort_order')->unsigned();
            $table->string('color', 7)->nullable();
            $table->longText('css')->nullable(); // Agregado, asumiendo que puede ser largo
            $table->longText('js')->nullable(); // Agregado, asumiendo que puede ser largo
            $table->longText('html')->nullable(); // Agregado
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('core_forms');
    }
};
