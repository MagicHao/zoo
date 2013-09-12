<?php

/**
 * Class User
 * @property string $id
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $gender
 * @property string $avatar
 * @property string $num_of_pets;
 * @property string $last_ip;
 *
 * @property Pet[] $pets
 */

class Post extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('');

    protected $fillable = array('content');

    public function pet()
    {
        return $this->belongsTo('Pet');
    }
}