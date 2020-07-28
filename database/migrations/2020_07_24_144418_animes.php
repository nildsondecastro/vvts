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
            $table->string('title');
            $table->string('title_english')->nullable();
            $table->string('title_japanese')->nullable();
            $table->integer('episodes')->nullable();
            $table->float('score')->nullable();
            $table->bigInteger('scored_by')->nullable();
            $table->longText('synopsis')->nullable();
            $table->string('url')->nullable();
            $table->string('image_url')->nullable();
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
