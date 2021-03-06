<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEventSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_event_subscriptions', function(Blueprint $table) {
            $table->engine ='InnoDB';

            $table->increments('id');
            $table->integer('user_id')
                ->unsigned();
            $table->integer('event_id')
                ->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');

            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_event_subscriptions');
    }
}
