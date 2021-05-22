<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->integer('travel_id')->unsigned()->nullable();
            $table->integer('kilos')->nullable();
            $table->dateTime('reservation_date')->nullable();
            $table->dateTime('validation_date')->nullable();
            $table->string('lettres')->nullable();
            $table->string('message')->nullable();
            $table->string('status')->default('inProgress')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
