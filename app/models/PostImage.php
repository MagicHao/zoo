<?php

/**
 * Class PostImage
 * @property string $id
 * @property string $post_id
 * @property string $user_id
 * @property string $pet_id;
 * @property string $filename
 * @property string $filePath
 * @property string $created_time;
 * @property string $updated_time;
 *
 * @property Post $post
 * @property Pet $pet
 * @property User $user
 */

class PostImage extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post_images';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('');

    protected $fillable = array('');

    public function post()
    {
        return $this->belongsTo('Post');
    }

    public function pet()
    {
        return $this->belongsTo('Pet');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function getFilePathAttribute($value)
    {
        return empty($this->filename) ?  URL::asset('images/default-avatar.png') : Helper::instance()->getUploadURL($this->user_id, $this->filename);
    }
}