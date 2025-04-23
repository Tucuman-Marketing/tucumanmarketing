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
        Schema::table('products', function (Blueprint $table) {
            $table->foreign(['unit_of_measure_id'], 'products_ibfk_1')->references(['id'])->on('product_units_of_measure')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['category_id'], 'products_ibfk_2')->references(['id'])->on('product_categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['sub_category_id'], 'products_ibfk_3')->references(['id'])->on('product_category_subs')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['brand_id'], 'products_ibfk_4')->references(['id'])->on('product_brands')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['supplier_id'], 'products_ibfk_5')->references(['id'])->on('product_suppliers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_ibfk_1');
            $table->dropForeign('products_ibfk_2');
            $table->dropForeign('products_ibfk_3');
            $table->dropForeign('products_ibfk_4');
            $table->dropForeign('products_ibfk_5');
        });
    }
};
