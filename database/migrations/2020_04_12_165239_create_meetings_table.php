<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('semesters_id');
            $table->unsignedBigInteger('subjects_id');

            $table->string('meeting_id');
            $table->string('topic');

            $table->string('start_time');
            $table->integer('duration');
            $table->string('timezone');

            $table->text('start_url');
            $table->string('join_url');

            $table->string('history_type');
            $table->text('ref_text')->nullable();

            $table->boolean('status')->default(0);

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('semesters_id')->references('id')->on('semesters');
            $table->foreign('subjects_id')->references('id')->on('subjects');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
