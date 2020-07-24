<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Animes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->bigIncrements('anime_id');
            $table->bigInteger('mal_id');
            $table->string('title_english');
            $table->string('title_japanese')->nullable();
            $table->integer('episodes');
            $table->float('score');
            $table->bigInteger('scored_by');
            $table->longText('synopsis');
            $table->string('url');
            $table->string('image_url');
            //categorias
            $table->rememberToken();
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
        Schema::dropIfExists('animes');
    }
}
