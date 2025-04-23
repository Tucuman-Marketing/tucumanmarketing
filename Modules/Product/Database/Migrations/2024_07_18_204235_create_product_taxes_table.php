<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_taxes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->uuid('uuid');
            $table->string('description')->nullable();
            $table->string('value')->nullable();
            $table->integer('sort_order')->nullable();
            $table->tinyInteger('is_protected')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_taxes');
    }
};
