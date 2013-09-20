<?php

/**
 * Class Pet
 * @property string $id
 * @property string $user_id
 * @property string $pet_type_id
 * @property string $name
 * @property string $gender
 * @property string $birthdate
 * @property string $avatar
 * @property string $avatarPath
 * @property Carbon\Carbon $created_at
 * @property string $num_of_posts
 *
 * @property User $user
 * @property Post[] $posts
 * @property PostImage[] $postImages
 * @property PetType $petType
 */

class Pet extends Model  {

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

    protected $fillable = array('pet_type_id', 'gender', 'name', 'birthdate');

    public function getAvatarPathAttribute($value)
    {
        return empty($this->avatar) ?  URL::asset('images/default-avatar.png') : Helper::instance()->getUploadURL($this->user_id, $this->avatar);
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function posts()
    {
        return $this->hasMany('Post');
    }

    public function postImages()
    {
        return $this->hasMany('PostImage');
    }

    public function petType()
    {
        return $this->belongsTo('PetType');
    }

}