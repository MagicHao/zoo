<?php

/**
 * Class Pet
 * @property $id Integer
 * @property $name String
 * @property $gender String
 *
 * @property $user User
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
        'name'=>'required',
        'gender'=>'required|in:m,f,s'
    );

    public function getAvatarAttribute($value)
    {
        return empty($value) ?  URL::asset('images/default-avatar.png') : Helper::instance()->getUploadURL($this->id, $value);
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

}