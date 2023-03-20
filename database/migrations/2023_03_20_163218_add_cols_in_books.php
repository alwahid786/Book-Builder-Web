<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsInBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('front_title')->nullable();
            $table->string('front_subtitle')->nullable();
            $table->string('author_fname')->nullable();
            $table->string('author_lname')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('front_title');
            $table->dropColumn('front_subtitle');
            $table->dropColumn('author_fname');
            $table->dropColumn('author_lname');
        });
    }
}
