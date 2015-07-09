<?php

class FileTableSeeder extends Seeder {

	public function run() {
		DB::table('files')->delete();
		DB::table('files')->insert(array(
			'id'       => Uuid::generate(4),
			'filename' => 'Avast free version',
			'uri'      => '/uploads/avast_free_antivirus_setup_online.exe'
		));
	}

}