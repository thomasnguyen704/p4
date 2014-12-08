<?php
class UserController extends BaseController {
	

	/**
	*
	*/
	public function __construct() {
		parent::__construct();
        $this->beforeFilter('guest',
        	array(
        		'only' => array('getLogin','getSignup')
        	));
    }
    



    /**
	* Show the new user signup form
	* @return View
	*/
	public function getSignup() {
		return View::make('user_signup');
	}
	

	/**
	* Process the new user signup form
	* @return Redirect
	*/
	public function postSignup() {
	
		///// START VALIDATION /////
		# Define rules
		$rules = array(
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6'
		);
	
		# Run through validation
		$validator = Validator::make(Input::all(), $rules);
	
		# Validation helper
		if($validator->fails()) {
			return Redirect::to('/signup')
				->with('flash_message', 'Sign up failed. Fix the errors below.')
				->withInput()
				->withErrors($validator);
		}
		///// END VALIDATION /////

		$user = new User;
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		try {
			$user->save();
		}
		catch (Exception $e) {
			return Redirect::to('/signup')
				->with('flash_message', 'Sign up failed. Try again.')
				->withInput();
		}
	
		# Log in
		Auth::login($user);
		return Redirect::to('/')->with('flash_message', 'Welcome.');
	}
	







	/**
	* Display Login form
	* @return View
	*/
	public function getLogin() {
		return View::make('user_login');
	}
	

	/**
	* Process Login form
	* @return View
	*/
	public function postLogin() {
		$credentials = Input::only('email', 'password');
		
		if (Auth::attempt($credentials, $remember = false)) {
			return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
		}
		else {
			return Redirect::to('/login')
				->with('flash_message', 'Log in failed. Please try again.')
				->withInput();
		}
	}


	





	/**
	* Logout
	* @return Redirect
	*/
	public function getLogout() {
		Auth::logout();
		return Redirect::to('/');
	}


}

