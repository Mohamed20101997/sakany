<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('city');
            $table->string('rent_type');   // period_of_time  or home  or bed
            $table->string('cover');

            $table->text('address');
            $table->text('description')->nullable();

            $table->integer('floor');
            $table->integer('number_of_bathroom');
            $table->integer('number_of_bedroom');
            $table->integer('number_of_beds');
            $table->integer('home_space')->nullable();

            $table->integer('maximum_period')->nullable();

            $table->integer('price_for_home')->nullable();
            $table->integer('price_for_bedroom')->nullable();
            $table->integer('price_for_bed')->nullable();

            $table->tinyInteger('reserved');
            $table->tinyInteger('state');
            $table->tinyInteger('garage');

            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homes');
    }
}
