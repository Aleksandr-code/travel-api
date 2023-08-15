<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('travel_id');
            $table->string('name');
            $table->date('starting_date');
            $table->date('ending_date');
            $table->integer('price');
            $table->timestamps();

            $table->index('travel_id', 'tour_travel_idx');
            $table->foreign('travel_id', 'tour_travel_fk')->on('travels')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
};
