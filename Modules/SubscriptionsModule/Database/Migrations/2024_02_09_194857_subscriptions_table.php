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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('user_vehicle_id')->nullable();
            $table->unsignedInteger('subscription_plan_id')->nullable();
            $table->unsignedInteger('subscription_pay_id')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->enum('status', ['Cancelado', 'Pendiente', 'Pagado'])->default('Pendiente');
            $table->timestamp('last_edited_by_user_at')->nullable();
            $table->timestamp('next_edited_by_user_at')->nullable();

            $table->json('request')->nullable();
            $table->json('response')->nullable();
            $table->boolean('response_error')->nullable();
            $table->string('mp_subscriptionId')->nullable();

            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_vehicle_id')->references('id')->on('user_data_vehicles')->onDelete('cascade');
            $table->foreign('subscription_plan_id')->references('id')->on('subscription_plans')->onDelete('cascade');
            $table->foreign('pay_id')->references('id')->on('pays')->onDelete('cascade');
            $table->foreign('subscription_pay_id')->references('id')->on('subscription_pays')->onDelete('set null');


            // Indexes
            $table->unique('uuid');
            $table->index('user_id');
            $table->index('user_vehicle_id');
            $table->index('subscription_plan_id');
            $table->index('subscription_pay_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
};
