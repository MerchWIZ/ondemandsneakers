<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbassadorsSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('ambassadors_subscriptions');
         
        Schema::create('ambassadors_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ambassadors_id')->nullable();
            $table->integer('athlete_id')->nullable();
            $table->integer('subscriptionStatus')->default(1);
            $table->dateTime('subscriptionDate')->nullable();
            $table->float('subscriptionRate')->nullable();
            $table->float('subscriptionCommission')->nullable();
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
    public function down()
    {
        Schema::drop('ambassadors_subscriptions');
    }
}
