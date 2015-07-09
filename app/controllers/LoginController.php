<?php

class LoginController extends BaseController {

	public function getIndex() {
		return View::make('login');
	}

	public function postAuthenticate() {
		// Validate input, create some rules for the input
		$rules = array(
			'name' => 'required',
			'password' => 'required|alpha_num|min:3'
		);

		// Process the input with the validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If the validator fails, redirect back to the login page
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else { // If the validator doesn't fail redirect to the index page
			// Create data to authenticate
			$userdata = array(
				'name' => Input::get('name'),
				'password' => Input::get('password')
			);

			// Attempt to authenticate user
			if (Auth::attempt($userdata)) {
				// Validation successful!
				return Redirect::to('/');
			} else {
				// Validation isn't successful!
				return Redirect::to('login')
					->withErrors('Something went wrong. Please try again!');
			}
		}	
	}

	public function getLogout() {
		Auth::logout();
		return Redirect::to('login');
	}

}