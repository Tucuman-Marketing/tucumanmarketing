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
        Schema::create('product_combo_products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->uuid('uuid');
            $table->integer('product_combo_id')->nullable()->index('product_combo_id');
            $table->integer('product_id')->nullable()->index('product_id');
            $table->float('quantity', 10, 0)->nullable();
            $table->integer('sort_order')->nullable();
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
        Schema::dropIfExists('product_combo_products');
    }
};
