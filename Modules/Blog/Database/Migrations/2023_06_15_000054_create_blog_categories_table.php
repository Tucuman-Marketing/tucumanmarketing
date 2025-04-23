<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();

            $table->integer('sort_order')->nullable();
            $table->boolean('is_protected')->default(0);
            $table->string('icon')->nullable();
            $table->string('color')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }
}
