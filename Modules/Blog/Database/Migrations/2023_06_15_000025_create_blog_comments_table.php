<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid'); // Nueva columna uuid
            $table->bigInteger('post_id')->unsigned();
            $table->Integer('user_id')->unsigned();
            $table->text('content');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('post_id')->references('id')->on('blog_posts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
