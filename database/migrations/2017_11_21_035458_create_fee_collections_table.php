<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_collections', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('fee_master_id');
            $table->string('payment_no', '20')->nullable();
            $table->string('receipt_no', '50')->nullable();
            $table->dateTime('date');
            $table->integer('paid_amount');
            $table->integer('discount')->nullable();
            $table->integer('fine')->nullable();
            $table->string('payment_mode', '15');
            $table->string('note', '100')->nullable();
            $table->text('response')->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('students_id')->references('id')->on('students');
            $table->foreign('fee_masters_id')->references('id')->on('fee_masters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fee_collections');
    }
}
