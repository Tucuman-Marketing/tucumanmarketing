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
        Schema::table('product_product_colors', function (Blueprint $table) {
            $table->foreign(['product_id'], 'product_product_colors_ibfk_1')->references(['id'])->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['product_color_id'], 'product_product_colors_ibfk_2')->references(['id'])->on('product_colors')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_product_colors', function (Blueprint $table) {
            $table->dropForeign('product_product_colors_ibfk_1');
            $table->dropForeign('product_product_colors_ibfk_2');
        });
    }
};
