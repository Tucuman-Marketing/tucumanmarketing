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
        Schema::table('product_return_items', function (Blueprint $table) {
            $table->foreign(['return_id'], 'product_return_items_ibfk_1')->references(['id'])->on('product_returns')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['product_id'], 'product_return_items_ibfk_2')->references(['id'])->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_return_items', function (Blueprint $table) {
            $table->dropForeign('product_return_items_ibfk_1');
            $table->dropForeign('product_return_items_ibfk_2');
        });
    }
};
