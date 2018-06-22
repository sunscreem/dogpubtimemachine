<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class createBarBeerPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bar_beer', function (Blueprint $table) {
            $table->integer('bar_id')->unsigned()->index();
            $table->foreign('bar_id')->references('id')->on('bars')->onDelete('cascade');
            $table->integer('beer_id')->unsigned()->index();
            $table->foreign('beer_id')->references('id')->on('beers')->onDelete('cascade');
            $table->primary(['bar_id', 'beer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bar_beer');
    }
}
