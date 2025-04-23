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
        Schema::create('recruitment_candidates_skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('skill_id');
            $table->timestamps();
            $table->softDeletes();

            // Índices y claves foráneas
            $table->foreign('candidate_id')
                  ->references('id')
                  ->on('recruitment_candidates')
                  ->onDelete('cascade');

            $table->foreign('skill_id')
                  ->references('id')
                  ->on('recruitment_skills')
                  ->onDelete('cascade');

            $table->index('candidate_id', 'recruitment_candidates_skills_recruitment_candidates_FK');
            $table->index('skill_id', 'recruitment_candidates_skills_recruitment_skills_FK');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recruitment_candidates_skills', function (Blueprint $table) {
            $table->dropForeign('recruitment_candidates_skills_recruitment_candidates_FK');
            $table->dropForeign('recruitment_candidates_skills_recruitment_skills_FK');
            $table->dropIndex('recruitment_candidates_skills_recruitment_candidates_FK');
            $table->dropIndex('recruitment_candidates_skills_recruitment_skills_FK');
        });

        Schema::dropIfExists('recruitment_candidates_skills');
    }
};
