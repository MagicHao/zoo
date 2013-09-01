<?php

use Illuminate\Database\Migrations\Migration;

class CreatePetFollowsTable extends Migration {

    public function up()
    {
        Schema::create('pet_follows', function($table){
            /* @var $table \Illuminate\Database\Schema\Blueprint */
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('pet_id');
            $table->enum('type', array(0, 1));
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
        Schema::drop('pet_follows');
    }

}