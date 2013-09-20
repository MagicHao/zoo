<?php

namespace Services\Pets;

class Observer {

    public function creating($pet)
    {
        /* @var $pet \Pet */
        if ($pet->user->num_of_pets >= \User::PETS_MAX) {
            $pet->addError('name', '用户宠物数已超过范围。');
            return false;
        }
        return true;
    }

    public function created($pet)
    {
        $pet->user->num_of_pets++;
        $pet->user->save();
    }

    public function saving($pet)
    {
        /* @var $pet \Pet */
        if (\PetType::find($pet->pet_type_id)->count() == 0) {
            return false;
        }
        return true;
    }

}