<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbassadorsSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('ambassadors_specialities');
        
        Schema::create('ambassadors_specialities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ambassador_id')->nullable();
            $table->integer('speciality_id')->nullable();
            $table->integer('status')->default(1);
            $table->integer('deleted')->default(0);
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
        Schema::drop('ambassadors_specialities');
    }
}
