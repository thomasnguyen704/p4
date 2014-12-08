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
	 * Send new user a confirmation email
	 *
	 */
	public function sendWelcomeEmail($user) {

	    $data = array('user' => $user);

	    Mail::send('emails.welcome', $data, function($message) {

	        $recipient_email = $user->email;
	        $recipient_name  = $user->first_name.' '.$user->last_name;
	        $subject  = 'Welcome to the Inventory Management System!';

	        $message->to($recipient_email, $recipient_name)->subject($subject);
	    });
	}

}