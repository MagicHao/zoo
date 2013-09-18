<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * Class User
 * @property string $id
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $gender
 * @property string $avatar
 * @property string $avatarPath
 * @property string $num_of_pets;
 * @property string $num_of_posts;
 * @property string $num_of_visits;
 * @property string $last_ip;
 * @property string $last_time;
 * @property string $created_time;
 * @property string $updated_time;
 *
 * @property Pet[] $pets
 * @property Post[] $posts
 * @property PostImage[] $postImages
 */

class User extends Model implements UserInterface, RemindableInterface {

    const PETS_MAX = 5;

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

    protected $fillable = array('gender');

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

    public function getAvatarPathAttribute($value)
    {
        return empty($this->avatar) ?  URL::asset('images/default-avatar.png') : Helper::instance()->getUploadURL($this->id, $this->avatar);
    }

    public function createPet(Pet $pet, $file)
    {
        if (!$pet->exists) {
            $pet->user_id = $this->id;
            if ($pet->save()) {
                if ($file) $pet->updateAvatar($file);
            }
            return true;
        } else {
            return false;
        }
    }

    public function updatePet(Pet $pet, $file = null)
    {
        if ($pet->exists) {
            if ($pet->save()) {
                if ($file) $pet->updateAvatar($file);
            }
            return true;
        } else {
            return false;
        }
    }

    public function pets()
    {
        return $this->hasMany('Pet');
    }

    public function posts()
    {
        return $this->hasMany('Post');
    }

    public function postImages()
    {
        return $this->hasMany('PostImage');
    }

    public function updateAvatar(\Symfony\Component\HttpFoundation\File\UploadedFile $file)
    {
        $helper = Helper::instance();
        $uploadDir = $helper->getUploadDir($this->id);
        $tmpUploadDir = $uploadDir . 'tmp';
        if ($this->avatar) {
            File::delete($helper->getUploadURL($this->id, $this->avatar));
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