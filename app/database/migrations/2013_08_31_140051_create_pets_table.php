<?php

use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration {

    public function up()
    {
        Schema::create('pets', function($table){
            /* @var $table \Illuminate\Database\Schema\Blueprint */
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('type_id');
            $table->string('name', '12');
            $table->enum('gender', array('f', 'm', 's'));
            $table->date('birthdate');
            $table->string('avatar', '32')->default('');
            $table->string('num_of_posts')->default(0);
            $table->integer('num_of_fans')->default(0);
            $table->integer('num_of_visits')->default(0);
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
        Schema::drop('pets');
    }


}