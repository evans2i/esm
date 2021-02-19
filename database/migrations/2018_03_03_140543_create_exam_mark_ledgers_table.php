<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamMarkLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_mark_ledgers', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('exam_schedule_id');
            $table->unsignedBigInteger('student_id');

            $table->integer('obtain_mark_theory')->default(0);
            $table->boolean('absent_theory')->default(0);

            $table->integer('obtain_mark_practical')->default(0);
            $table->boolean('absent_practical')->default(0);

            $table->unsignedBigInteger('sorting_order')->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_mark_ledgers');
    }
}
