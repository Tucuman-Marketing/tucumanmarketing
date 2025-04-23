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
        Schema::create('recruitment_candidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->string('name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('cv', 255)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('gender', 25)->nullable();
            $table->string('linkedin', 100)->nullable();
            $table->string('description', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique('uuid', 'recruitment_candidates_uuid_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitment_candidates');
    }
};
