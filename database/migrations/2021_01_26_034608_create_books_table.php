<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn');
            $table->string('title');
            $table->string('mmtitle');
            $table->text('coverphoto');
            $table->string('pages');
            $table->year('publishyear');
            $table->string('price');
            $table->string('discount')->nullable()->default(null);
            $table->text('summary');
            $table->text('annotation');
            $table->integer('type');
            $table->text('file');
            $table->integer('status');
            
            $table->foreignId('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreignId('language_id')->references('id')->on('languages')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
