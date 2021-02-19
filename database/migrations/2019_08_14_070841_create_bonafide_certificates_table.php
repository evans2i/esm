<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonafideCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonafide_certificates', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('students_id')->unique();
            $table->date('date_of_issue');
            $table->text('course');
            $table->string('period','9');
            $table->string('character');

            $table->text('ref_text')->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('students_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonafide_certificates');
    }
}