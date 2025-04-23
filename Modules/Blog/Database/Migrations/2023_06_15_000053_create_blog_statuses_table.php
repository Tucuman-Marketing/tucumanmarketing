<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('blog_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid'); // Nueva columna uuid
            $table->string('name')->nullable();

            $table->integer('sort_order')->nullable();
            $table->boolean('is_protected')->default(0);
            $table->string('icon')->nullable();
            $table->string('color')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }
}
