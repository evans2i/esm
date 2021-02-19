<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_masters', function (Blueprint $table) {
            $table->id('id');

            $table->unsignedBigInteger('book_category_id')->nullable();

            $table->string('isbn_number', '25')->nullable();
            $table->string('code', '15');
            $table->string('title', '100');
            $table->string('sub_title', '100')->nullable();
            $table->text('image')->nullable();
            $table->string('language', '100')->nullable();
            $table->string('editor', '100')->nullable();
            $table->string('edition', '100')->nullable();
            $table->date('edition_year')->nullable();
            $table->string('publisher', '100')->nullable();
            $table->date('publish_year')->nullable();
            $table->string('series', '100')->nullable();
            $table->string('author', '100');
            $table->string('rack_location', '100')->nullable();
            $table->string('price', '100');
            $table->string('total_pages', '100')->nullable();
            $table->string('source', '100')->nullable();
            $table->string('notes', '100')->nullable();

            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('book_category_id')->references('id')->on('book_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_masters');
    }
}
