<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_histories', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('years_id');
            $table->unsignedBigInteger('routes_id')->nullable();
            $table->unsignedBigInteger('vehicles_id')->nullable();
            $table->unsignedBigInteger('travellers_id');
            $table->foreign('travellers_id')->references('id')->on('transport_users');
            $table->text('history_type');

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
        Schema::dropIfExists('transport_histories');
    }
}
