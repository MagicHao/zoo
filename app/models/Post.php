<?php

/**
 * Class Post
 * @property string $id
 * @property string $user_id
 * @property string $pet_id
 * @property string $content
 * @property string $num_of_images
 *
 * @property Pet $pet
 * @property User $user
 * @property PostImage $postImages
 */

class Post extends Model {

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

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function postImages()
    {
        return $this->hasMany('PostImage');
    }
}