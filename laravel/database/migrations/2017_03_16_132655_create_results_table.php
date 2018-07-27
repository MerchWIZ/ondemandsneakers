<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration {

    public function up() {


        Schema::dropIfExists('results');


        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('date');
            $table->string('caption')->nullable();
            $table->string('frontImage');
            $table->string('backImage')->nullable();
            $table->string('sideImage')->nullable();
            $table->integer('status')->default(1);
            $table->integer('deleted')->default(0);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    public function down() {
        Schema::drop('results');
    }

}
