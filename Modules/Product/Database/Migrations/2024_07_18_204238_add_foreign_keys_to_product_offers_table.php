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
        Schema::table('product_offers', function (Blueprint $table) {
            $table->foreign(['product_id'], 'product_offers_ibfk_1')->references(['id'])->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_offers', function (Blueprint $table) {
            $table->dropForeign('product_offers_ibfk_1');
        });
    }
};
