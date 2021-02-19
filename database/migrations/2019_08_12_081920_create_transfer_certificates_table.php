<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_certificates', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('students_id')->unique();
            $table->date('date_of_issue');
            $table->date('date_of_leaving');
            $table->string('tc_num')->unique();
            $table->text('leaving_time_class');
            $table->text('qualified_to_promote');
            $table->string('paid_fee_status');
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
        Schema::dropIfExists('transfer_certificates');
    }
}

