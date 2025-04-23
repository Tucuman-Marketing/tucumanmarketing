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
        Schema::create('recruitment_candidates_lenguages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('candidate_id');
            $table->string('language', 100);
            $table->string('language_level', 100)->nullable();
            $table->timestamps();

            // Clave foránea
            $table->foreign('candidate_id')
                  ->references('id')
                  ->on('recruitment_candidates')
                  ->onDelete('cascade');

            // Índice
            $table->index('candidate_id', 'recruitment_candidates_lenguages_recruitment_candidates_FK');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recruitment_candidates_lenguages', function (Blueprint $table) {
            $table->dropForeign('recruitment_candidates_lenguages_recruitment_candidates_FK');
            $table->dropIndex('recruitment_candidates_lenguages_recruitment_candidates_FK');
        });

        Schema::dropIfExists('recruitment_candidates_lenguages');
    }
};
