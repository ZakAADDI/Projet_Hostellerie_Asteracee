<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('logo_media_id');
            $table->json('text');
            $table->unsignedBigInteger('left_media_id');
            $table->unsignedBigInteger('center_media_id');
            $table->unsignedBigInteger('right_media_id');
            $table->timestamps();

            $table->foreign('left_media_id')->references('id')->on('media');
            $table->foreign('center_media_id')->references('id')->on('media');
            $table->foreign('right_media_id')->references('id')->on('media');
            $table->foreign('logo_media_id')->references('id')->on('media');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heroes');
    }
}
