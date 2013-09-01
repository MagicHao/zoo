<?php

use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration {

    public function up()
    {
        Schema::create('pets', function($table){
            /* @var $table \Illuminate\Database\Schema\Blueprint */
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name', '12')->unique();
            $table->string('num_of_posts')->default(0);
            $table->integer('num_of_fans')->default(0);
            $table->integer('num_of_visits')->default(0);
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
        Schema::drop('pets');
    }


}