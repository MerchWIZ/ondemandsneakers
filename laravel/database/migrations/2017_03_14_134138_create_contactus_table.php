<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('contactus');
        
        Schema::create('contactus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->text('message');
            $table->integer('status')->nullable();
            $table->string('deleted')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contactus');
    }
}
