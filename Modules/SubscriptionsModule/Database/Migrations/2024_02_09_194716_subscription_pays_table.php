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
        Schema::create('subscription_pays', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->unsignedInteger('subscription_id')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->dateTime('next_payment_date')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_preference_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            // Foreign key
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');

            // Indexes
            $table->unique('uuid');
            $table->unique('subscription_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_pays');
    }
};
