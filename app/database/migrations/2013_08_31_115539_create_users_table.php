<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
            /* @var $table \Illuminate\Database\Schema\Blueprint */
            $table->increments('id');
            $table->string('email', 32)->unique();
            $table->string('username', '12')->unique();
            $table->string('password', '64');
            $table->string('num_of_pets')->default(0);
            $table->integer('num_of_followed_pets')->default(0);
            $table->integer('num_of_posts')->default(0);
            $table->integer('num_of_visits')->default(0);
            $table->integer('last_ip')->default(0);
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
		Schema::drop('users');
	}

}