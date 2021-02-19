<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_users', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('routes_id')->nullable();
            $table->unsignedBigInteger('vehicles_id')->nullable();
            $table->unsignedBigInteger('user_type');
            $table->unsignedBigInteger('member_id');

            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('routes_id')->references('id')->on('routes');
            $table->foreign('vehicles_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transport_users');
    }
}
