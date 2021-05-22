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
            $table->id();
            $table->string('colis_name')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->string('categorie_id');
            $table->string('from');
            $table->string('to');
            $table->dateTime('dateFrom');
            $table->dateTime('dateTo');
            $table->longText('content')->nullable();
            $table->integer('kilo');
            $table->integer('prix');
            $table->integer('quantity')->nullable();
            $table->longText('colisPhoto')->nullable();
            $table->string('slug');
            $table->string('avatar')->nullable();
            $table->string('compagnie')->nullable();
            $table->string('photoBielletAvion')->nullable();
            $table->boolean('publish')->default(false);
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
