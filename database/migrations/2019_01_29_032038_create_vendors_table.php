<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id('id');
            $table->string('reg_no', '15')->unique()->nullable();
            $table->string('name', '50');
            $table->string('address', '100')->nullable();
            $table->string('tel', '15')->nullable();
            $table->string('mobile_1', '10')->nullable();
            $table->string('mobile_2', '10')->nullable();
            $table->string('email', '100')->nullable();

            $table->text('extra_info')->nullable();

            $table->text('vendor_image')->nullable();

            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
