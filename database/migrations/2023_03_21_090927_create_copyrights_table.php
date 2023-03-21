<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCopyrightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copyrights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('copyright_year')->nullable();
            $table->string('copyright_name')->nullable();
            $table->string('company_name1')->nullable();
            $table->string('company_name2')->nullable();
            $table->string('street_address1')->nullable();
            $table->string('street_address2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('template_id');
            $table->longText('content')->nullable();
            $table->longText('publication_year')->nullable();
            $table->longText('author_name')->nullable();
            $table->longText('cover_designer')->nullable();
            $table->longText('editor')->nullable();
            $table->longText('publisher')->nullable();
            $table->longText('isbn')->nullable();
            $table->longText('printed_country')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('copyrights');
    }
}
