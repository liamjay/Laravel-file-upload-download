<?php

class IndexController extends BaseController {
	
	public function getIndex() {
		return View::make('index')
			->with(array('files' => $this->retrieveFiles()));
	}

	private function retrieveFiles() {
		$data = DB::table('files')->get();

		return $data;
	}

	public function postUpload() {
		$rules = array(
			'filename' => 'required',
			'file'     => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('/')
				->withErrors($validator);
		} else {
			$file = Input::file('file');
			$destinationPath = 'uploads';
			$filename = $file->getClientOriginalName();

			$upload_success = Input::file('file')->move($destinationPath, $filename);

			if ($upload_success) {
				$uri = '/uploads/' . $filename;

				$insert = DB::table('files')->insert(array(
					'id'       => Uuid::generate(4),
					'filename' => Input::get('filename'),
					'uri'      => $uri
				));

				if ($insert) {
					return Redirect::to('/');
				}
			} 
		}
	}

}