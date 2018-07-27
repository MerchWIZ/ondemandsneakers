<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthleteMpTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::dropIfExists('athlete_mp');
        Schema::create('athlete_mp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('athlete_id')->nullable();
            $table->integer('mp_id')->nullable();
            $table->integer('status')->default(1);
            $table->integer('deleted')->default(0);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('athlete_mp');
    }

}
