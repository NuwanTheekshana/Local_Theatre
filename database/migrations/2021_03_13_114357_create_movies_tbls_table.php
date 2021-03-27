<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies_tbls', function (Blueprint $table) {
            $table->id();
            $table->string('movie_token');
            $table->string('movie_title');
            $table->string('movie_year');
            $table->longText('movie_summary');
            $table->string('movie_genres');
            $table->string('movie_image_path');
            $table->string('movie_collect_type'); // api or manual insert
            $table->string('imdb_code'); // if api insert
            $table->string('imdb_rating');
            $table->string('insert_user_id');
            $table->boolean('status')->default('1');
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
        Schema::dropIfExists('movies_tbls');
    }
}
