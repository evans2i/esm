<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradingScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grading_scales', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('gradingType_id');
            $table->string('name', '2');
            $table->integer('percentage_from');
            $table->integer('percentage_to');
            $table->integer('grade_point')->nullable();
            $table->string('description', '100')->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('gradingType_id')->references('id')->on('grading_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grading_scales');
    }
}
