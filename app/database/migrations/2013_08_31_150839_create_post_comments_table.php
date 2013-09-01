<?php

use Illuminate\Database\Migrations\Migration;

class CreatePostCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comments', function($table){
            /* @var $table \Illuminate\Database\Schema\Blueprint */
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('post_id');
            $table->string('content', 128);
            $table->tinyInteger('status')->default(0);
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
        Schema::drop('post_comments');
    }

}