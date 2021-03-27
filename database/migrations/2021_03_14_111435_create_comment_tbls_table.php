<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_tbls', function (Blueprint $table) {
            $table->id();
            $table->string('movie_token');
            $table->string('movie_title');
            $table->string('movie_comment');
            $table->string('movie_comment_user_id');
            $table->string('movie_comment_user');
            $table->datetime('movie_comment_date');
            $table->string('movie_comment_status');
            $table->string('admin_user_id');
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
        Schema::dropIfExists('comment_tbls');
    }
}
