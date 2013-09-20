<?php

namespace Services\Pets;

use Services\Validation as ValidationService;

class Validation extends ValidationService {
    protected $creatingRules = array(
        'name'=>'required|min:2|max:6',
        'gender'=>'required|in:m,f,s',
        'birthdate'=>'required|date',
        'avatar'=>'required|image|file_count:1',
        'pet_type_id'=>'required|exists:pet_types,id'
    );

    protected $updatingRules = array(
        'name'=>'min:2|max:6',
        'gender'=>'in:m,f,s',
        'birthdate'=>'date',
        'avatar'=>'image|file_count:1',
        'pet_type_id'=>'exists:pet_types,id'
    );
}