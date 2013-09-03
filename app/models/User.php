<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * Class User
 * @property $id Integer
 * @property $email String
 * @property $username String
 * @property $password String
 * @property $avatar String
 *
 * @property $pets Pet[]
 */

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

    public static $validatorRules = array(
        'email'=>'required|email|unique:users',
        'username'=>'required|unique:users|min:3|max:10',
        'password'=>'required|min:6|max:16',
    );

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

    public function getAvatarAttribute($value)
    {
        return empty($value) ?  URL::asset('images/default-avatar.png') : Helper::instance()->getUploadURL($this->id, $value);
    }

    public function pets()
    {
        return $this->hasMany('Pet');
    }

}