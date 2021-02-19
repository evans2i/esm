<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('id');
            $table->string('reg_no', '25')->unique();
            $table->date('reg_date');
            $table->string('university_reg', '100')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('guardian_id');
            $table->unsignedBigInteger('parent_id');

            $table->unsignedBigInteger('faculty')->nullable();
            $table->unsignedBigInteger('semester')->nullable();
            $table->unsignedBigInteger('academic_status')->nullable();
            $table->unsignedBigInteger('batch')->nullable();

            $table->string('first_name', '25');
            $table->string('middle_name', '25')->nullable();
            $table->string('last_name', '25');
            $table->date('date_of_birth');
            $table->enum('gender', ['Male','Female','Other']);
            $table->string('blood_group', '10')->nullable();


            $table->string('religion', '25')->nullable();
            $table->string('caste', '25')->nullable();

            $table->string('nationality', '25')->nullable();
            $table->string('mother_tongue', '25')->nullable();
            $table->string('email', '100')->nullable();

            $table->string('extra_info', '100')->nullable();

            $table->text('student_image')->nullable();
            $table->text('student_signature')->nullable();

            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('faculty')->references('id')->on('faculties');
            $table->foreign('semester')->references('id')->on('semesters');
            $table->foreign('academic_status')->references('id')->on('student_statuses');
            $table->foreign('batch')->references('id')->on('student_batches');
            $table->foreign('user_id')->references('id')->on('users');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
