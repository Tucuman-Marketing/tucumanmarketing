<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostTagPivotTable extends Migration
{
    public function up()
    {
        Schema::create('blog_post_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('blog_posts')->onDelete('cascade');
            $table->unsignedBigInteger('blog_tag_id');
            $table->foreign('blog_tag_id')->references('id')->on('blog_tags')->onDelete('cascade');
        });
    }
}
