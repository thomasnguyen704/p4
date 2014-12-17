<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';


	/**
	 * The attributes excluded from the model's form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	/**
	 *  New user email
	 *
	 */
	public function sendWelcomeEmail() {
		$data = array('user' => Auth::user());
		Mail::send('emails.welcome', $data, function($message) {
			$recipient_email = $this->email;
			$subject  = 'Welcome to the Inventory Management System!';
    		$message->to($recipient_email)->subject($subject);
		});
	}

}