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
            Schema::create('subscription_plan_services', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->unsignedInteger('subscription_plan_id')->nullable();
            $table->unsignedInteger('service_id')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            // Foreign keys
            $table->foreign('subscription_plan_id')->references('id')->on('subscription_plans')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

            // Indexes
            $table->unique('uuid');
            $table->index('subscription_plan_id');
            $table->index('service_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_plan_services');
    }
};
