<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_attendances', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('link_id');
            $table->unsignedBigInteger('subjects_id');
            $table->integer('attendance_type');

            $table->unsignedBigInteger('years_id');
            $table->unsignedBigInteger('months_id');

            $table->integer('day_1')->default(0);
            $table->integer('day_2')->default(0);
            $table->integer('day_3')->default(0);
            $table->integer('day_4')->default(0);
            $table->integer('day_5')->default(0);
            $table->integer('day_6')->default(0);
            $table->integer('day_7')->default(0);
            $table->integer('day_8')->default(0);
            $table->integer('day_9')->default(0);
            $table->integer('day_10')->default(0);
            $table->integer('day_11')->default(0);
            $table->integer('day_12')->default(0);
            $table->integer('day_13')->default(0);
            $table->integer('day_14')->default(0);
            $table->integer('day_15')->default(0);
            $table->integer('day_16')->default(0);
            $table->integer('day_17')->default(0);
            $table->integer('day_18')->default(0);
            $table->integer('day_19')->default(0);
            $table->integer('day_20')->default(0);
            $table->integer('day_21')->default(0);
            $table->integer('day_22')->default(0);
            $table->integer('day_23')->default(0);
            $table->integer('day_24')->default(0);
            $table->integer('day_25')->default(0);
            $table->integer('day_26')->default(0);
            $table->integer('day_27')->default(0);
            $table->integer('day_28')->default(0);
            $table->integer('day_29')->default(0);
            $table->integer('day_30')->default(0);
            $table->integer('day_31')->default(0);
            $table->integer('day_32')->default(0);

            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('years_id')->references('id')->on('years');
            $table->foreign('months_id')->references('id')->on('months');
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
        Schema::dropIfExists('subject_attendances');
    }
}
