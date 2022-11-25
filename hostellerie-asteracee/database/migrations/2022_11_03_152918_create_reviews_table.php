<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->json('section')->nullable()->default(json_encode(
                [
                    "fr" => "Avis Clients",
                    "en" => "Customers Reviews"
                ]
            ));
            $table->string('title');
            $table->text('content');
            $table->enum('score',[1,2,3,4,5]);
            $table->string('user_firstname');
            $table->string('user_lastname');
            $table->enum('gender',['Female', 'Male']);
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
        Schema::dropIfExists('reviews');
    }
}
