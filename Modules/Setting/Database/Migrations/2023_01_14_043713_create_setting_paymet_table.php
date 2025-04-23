<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingPaymetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_paymet', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique()->index();
            $table->string('public_key')->index();
            $table->string('private_key')->index();
            $table->string('access_token')->nullable();
            $table->string('percentage')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_paymet');
    }
}
