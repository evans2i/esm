<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_guardians', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('students_id');
            $table->unsignedBigInteger('guardians_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('students_id')->references('id')->on('students');
            $table->foreign('guardians_id')->references('id')->on('guardian_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_guardians');
    }
}
