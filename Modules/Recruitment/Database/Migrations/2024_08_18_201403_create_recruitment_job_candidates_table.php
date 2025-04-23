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
        Schema::create('recruitment_job_candidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('job_id');
            $table->timestamps();

            // Claves foráneas
            $table->foreign('candidate_id')
                  ->references('id')
                  ->on('recruitment_candidates')
                  ->onDelete('cascade');

            $table->foreign('job_id')
                  ->references('id')
                  ->on('recruitment_jobs')
                  ->onDelete('cascade');

            // Índices
            $table->index('job_id', 'recruitment_job_candidates_recruitment_jobs_FK');
            $table->index('candidate_id', 'recruitment_job_candidates_recruitment_candidates_FK');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitment_job_candidates');
    }
};
