<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResidentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resident_histories', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('year_id');
            $table->unsignedBigInteger('hostel_id');
            $table->unsignedBigInteger('room_id')->nullable();
            $table->unsignedBigInteger('bed_id')->nullable();
            $table->unsignedBigInteger('resident_id');
            $table->text('history_type');

            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('year_id')->references('id')->on('years');
            $table->foreign('hostel_id')->references('id')->on('hostels');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('bed_id')->references('id')->on('beds');
            $table->foreign('resident_id')->references('id')->on('residents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resident_histories');
    }
}
