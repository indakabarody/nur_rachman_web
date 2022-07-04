<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable()->index('fk_posts_users_idx');
            $table->string('title', 512)->nullable();
            $table->string('slug', 512)->nullable();
            $table->string('thumbnail')->nullable();
            $table->longText('content')->nullable();
            $table->enum('type', ['Event', 'News'])->nullable()->default('News');
            $table->tinyInteger('show_post')->nullable()->default(1)->comment('0: hide; 1: show;');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
