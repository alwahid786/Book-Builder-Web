<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->longText('praise')->nullable();
            $table->longText('dedication')->nullable();
            $table->longText('how_to_use')->nullable();
            $table->longText('forward')->nullable();
            $table->longText('conclusion')->nullable();
            $table->longText('work_with_us')->nullable();
            $table->longText('about')->nullable();
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
            $table->dropColumn('praise');
            $table->dropColumn('dedication');
            $table->dropColumn('how_to_use');
            $table->dropColumn('forward');
            $table->dropColumn('conclusion');
            $table->dropColumn('work_with_us');
            $table->dropColumn('about');
        });
    }
}
