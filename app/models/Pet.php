<?php

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

class Pet extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pets';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('');

    public static $validatorRules = array(
        'email'=>'required|email|unique:users',
        'username'=>'required|unique:users|min:3|max:10',
        'password'=>'required|min:6|max:16',
        'repeat-password'=>'required|same:password',
    );

    public function getAvatarAttribute($value)
    {
        return empty($value) ?  URL::asset('images/default-avatar.png') : Helper::instance()->getUploadURL($this->id, $value);
    }

    public function pets()
    {
        return $this->hasOne('Pet');
    }

}