<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_prices', function (Blueprint $table) {
            $table->integer('id', true);
            $table->uuid('uuid');
            $table->integer('product_id')->nullable();
            $table->integer('product_price_list_id')->nullable();
            $table->decimal('price_ex_tax', 15, 2);
            $table->decimal('price_in_tax', 15, 2);
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('product_price_list_id')->references('id')->on('product_price_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_prices');
    }
}
