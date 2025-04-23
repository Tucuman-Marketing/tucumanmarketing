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
        Schema::create('product_category_subs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->uuid('uuid');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('icon')->nullable();
            $table->string('icon_filename')->nullable();
            $table->integer('product_category_id')->nullable()->index('product_category_id');
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
        Schema::dropIfExists('product_category_subs');
    }
};
