<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengeCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('challenge_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('challenge_id')->references('id')->on('challenges');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('challenge_category');
    }
}
