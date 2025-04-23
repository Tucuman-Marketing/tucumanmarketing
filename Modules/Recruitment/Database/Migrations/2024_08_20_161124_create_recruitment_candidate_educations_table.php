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
        Schema::create('recruitment_candidates_educations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('candidate_id');
            $table->string('title', 100)->nullable();
            $table->string('education_level', 100)->nullable();
            $table->string('education_state', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Índices y claves foráneas
            $table->foreign('candidate_id')
                  ->references('id')
                  ->on('recruitment_candidates')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitment_candidate_educations');
    }
};
