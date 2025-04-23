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
        Schema::table('product_category_subs', function (Blueprint $table) {
            $table->foreign(['product_category_id'], 'product_category_subs_ibfk_1')->references(['id'])->on('product_categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_category_subs', function (Blueprint $table) {
            $table->dropForeign('product_category_subs_ibfk_1');
        });
    }
};
