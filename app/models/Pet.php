<?php

/**
 * Class Pet
 * @property string $id
 * @property string $user_id
 * @property string $name
 * @property string $gender
 * @property string $birthdate
 * @property string $avatar
 * @property Carbon\Carbon $created_at
 *
 * @property User $user
 * @property Post[] $posts
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

    protected $fillable = array('gender', 'name', 'birthdate');

    public function getAvatarAttribute($value)
    {
        return empty($value) ?  URL::asset('images/default-avatar.png') : Helper::instance()->getUploadURL($this->user_id, $value);
    }

    public function getGenderAttribute($value)
    {
        $genders = array(
            's'=>'不清楚',
            'm'=>'男娃',
            'f'=>'女娃'
        );
        return $genders[$value];
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function posts()
    {
        return $this->hasMany('Post');
    }

    public function updateAvatar(\Symfony\Component\HttpFoundation\File\UploadedFile $file)
    {
        $helper = Helper::instance();
        $uploadDir = $helper->getUploadDir($this->user_id);
        $tmpUploadDir = $uploadDir . 'tmp';
        if ($this->avatar) {
            File::delete($helper->getUploadURL($this->user_id, $this->avatar));
        } elseif (!File::isDirectory($tmpUploadDir)) {
            File::makeDirectory($tmpUploadDir);
        }
        $filename = $helper->makeFilename();
        $fullFilename = $filename . '.' . $file->getClientOriginalExtension();
        $file = $file->move($tmpUploadDir, $fullFilename);
        $image = new ImageContainer($file->getPathname());
        $filePath = $uploadDir . $fullFilename;
        $image->smart_crop(400, 400)->save($filePath, 70);
        File::deleteDirectory($tmpUploadDir);
        $this->avatar = $fullFilename;
        $this->save();
    }

}