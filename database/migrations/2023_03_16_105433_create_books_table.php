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
            $table->string('avatar_fname')->nullable();
            $table->string('avatar_lname')->nullable();
            $table->string('avatar_description')->nullable();
            $table->string('book_title')->nullable();
            $table->string('book_subtitle')->nullable();
            $table->string('front_cover')->nullable();
            $table->string('back_cover')->nullable();
            $table->string('spine_cover')->nullable();
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
