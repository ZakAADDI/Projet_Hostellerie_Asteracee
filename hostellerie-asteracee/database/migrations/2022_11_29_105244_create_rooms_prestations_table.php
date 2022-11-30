<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsPrestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms_prestations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prestation_id');
            $table->unsignedBigInteger('room_type_id');
            $table->timestamps();

            $table->foreign('prestation_id')->references('id')->on('prestations');
            $table->foreign('room_type_id')->references('id')->on('room_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms_prestations');
    }
}
