<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarBeerPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bar_beer', function (Blueprint $table) {
            $table->string('bar_uuid')->index();
            $table->foreign('bar_uuid')->references('uuid')->on('bars')->onDelete('cascade');
            $table->string('beer_uuid')->index();
            $table->foreign('beer_uuid')->references('uuid')->on('beers')->onDelete('cascade');
            $table->primary(['bar_uuid', 'beer_uuid']);
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
