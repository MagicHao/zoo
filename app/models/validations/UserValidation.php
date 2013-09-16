<?php

namespace Services\Users;

use Services\Validation as ValidationService;

class Validation extends ValidationService {

    public $creatingRules = array(
        'email'=>'required|email|unique:users',
        'username'=>'required|unique:users|min:3|max:10',
        'password'=>'required|min:6|max:16',
        'gender'=>'in:m,f,s',
        'avatar'=>'image|file_count:1'
    );

    public $updatingRules = array(
        'gender'=>'in:m,f,s',
        'avatar'=>'image|file_count:1'
    );

}