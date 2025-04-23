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
        Schema::table('product_product_tags', function (Blueprint $table) {
            $table->foreign(['product_id'], 'product_product_tags_ibfk_1')->references(['id'])->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['product_tag_id'], 'product_product_tags_ibfk_2')->references(['id'])->on('product_tags')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_product_tags', function (Blueprint $table) {
            $table->dropForeign('product_product_tags_ibfk_1');
            $table->dropForeign('product_product_tags_ibfk_2');
        });
    }
};
