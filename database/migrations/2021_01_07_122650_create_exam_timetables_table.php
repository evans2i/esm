<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_timetables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('years_id');
            $table->unsignedBigInteger('months_id');
            $table->unsignedBigInteger('exams_id');
            $table->unsignedBigInteger('subjects_id');
            $table->dateTime('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('full_mark_theory')->default(0);
            $table->integer('pass_mark_theory')->default(0);
            $table->integer('full_mark_practical')->default(0);
            $table->integer('pass_mark_practical')->default(0);
            $table->unsignedBigInteger('sorting_order');
            $table->boolean('publish_status')->default(0);
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('years_id')->references('id')->on('years');
            $table->foreign('months_id')->references('id')->on('months');
            $table->foreign('exams_id')->references('id')->on('exams');
            $table->foreign('subjects_id')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_timetables');
    }
}
