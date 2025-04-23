<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBlogPostsTable extends Migration
{
    public function up()
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_8633728')->references('id')->on('blog_categories');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_8633730')->references('id')->on('blog_statuses');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8646274')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->dropForeign(['status_id']);
            $table->dropColumn('status_id');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
