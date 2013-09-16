<?php

use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('events', function($table){
            /* @var $table \Illuminate\Database\Schema\Blueprint */
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title', 16);
            $table->string('content', 255);
            $table->integer('num_of_posts');
            $table->tinyInteger('status')->default(0);
            $table->softDeletes();
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
        Schema::drop('events');
    }

}