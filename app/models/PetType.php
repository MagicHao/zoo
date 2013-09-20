<?php

/**
 * Class PetType
 * @property string $id
 * @property string $name
 * @property string $num_of_pets
 * @property string $created_time;
 * @property string $updated_time;
 *
 * @property Pet[] $pets
 */

class PetType extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pet_types';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('');

    protected $fillable = array('');

    public function pets()
    {
        return $this->hasMany('Pet');
    }
}