<?php

class UserTableSeeder extends Seeder {

	public function run() {
		DB::table('users')->delete();
		User::create(array(
			'id'       => Uuid::generate(4),
			'name'     => 'Admin',
			'password' => Hash::make('M3rlin7499'),
		));
	}

}