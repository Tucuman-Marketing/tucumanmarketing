<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique()->nullable();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->integer('duration')->nullable();
            //agregamos reqeust , response ,y response_error
            $table->json('request')->nullable();
            $table->json('response')->nullable();
            $table->boolean('response_error')->nullable();
            $table->integer('price')->nullable();

            $table->integer('frequency')->nullable();
            $table->string('frequency_type')->nullable();
            $table->integer('repetitions')->nullable();
            $table->integer('billing_day')->nullable();
            $table->boolean('billing_day_proportional')->nullable();

            //planId
            $table->string('mp_planId')->nullable();

            //agregemos cantidad de vehiculos
            $table->integer('quantity_vehicles')->nullable();

            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_plans');
    }
};
