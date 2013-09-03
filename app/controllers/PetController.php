<?php

class PetController extends BaseController {

    public function __construct(){
        $this->beforeFilter('auth', array('only'=> array('')));
        $this->beforeFilter('guest', array('only'=>array(

        )));
    }

    public function getAdd()
    {
        return View::make('pet.add');
    }

}