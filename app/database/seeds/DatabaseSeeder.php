<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('PetTypeTableSeeder');

        $this->command->info('Pet type table seeded!');
	}

}


class PetTypeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('pet_types')->delete();

        PetType::create(array('name'=>'喵星人'));
        PetType::create(array('name'=>'汪星人'));
    }

}