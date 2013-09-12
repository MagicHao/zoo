<?php
namespace Services\Posts;

use Services\Validation as ValidationService;

class Validation extends ValidationService{

    protected $creatingRules = array(
        'content'=>'required|min:1|max:128',
        'image'=>'image',
    );

    protected $updatingRules = array(
        'content'=>'min:1|max:128',
        'image'=>'image',
    );

    protected $messages = array(
        'content.required'=>'要说的话 是必填项。',
    );

}