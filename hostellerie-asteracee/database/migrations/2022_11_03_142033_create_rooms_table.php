<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->json('section')->nullable()->default(json_encode(
                [
                    "fr"=>"Nos chambres",
                    "en"=>"Our rooms"
                ]));;
            $table->float('price');
            $table->enum('type', ['Luxe', 'Suite', 'Standard']);
            $table->json('description');
            $table->unsignedBigInteger('media_id');
            $table->integer('capacity');
            $table->timestamps();

            $table->foreign('media_id')->references('id')->on('media');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
