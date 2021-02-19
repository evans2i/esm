<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_pays', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('salary_masters_id');
            $table->dateTime('date');
            $table->integer('paid_amount');
            $table->integer('allowance')->nullable();
            $table->integer('fine')->nullable();
            $table->string('payment_mode', '15');
            $table->string('note', '100')->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('staff_id')->references('id')->on('staff');
            $table->foreign('salary_masters_id')->references('id')->on('payroll_masters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary_pays');
    }
}
