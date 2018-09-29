<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agency');
            $table->string('agency_name');
            $table->int('date');
            $table->string('description');
            $table->string('image_link');
            $table->string('material');
            $table->string('title');
            $table->string('artist_first_name');
            $table->string('artist_last_name');
            $table->string('line');
            $table->string('station_name');
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
        Schema::dropIfExists('arts');
    }
}