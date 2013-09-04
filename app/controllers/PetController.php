<?php

class PetController extends BaseController {

    public function __construct(){
        $this->beforeFilter('auth', array('only'=> array('getAdd', 'postAdd')));
        $this->beforeFilter('guest', array('only'=>array(

        )));
    }

    public function getAdd()
    {
        return View::make('pet.add');
    }

    public function postAdd()
    {
        $validator = Validator::make(Input::all(), Pet::$validatorRules);
        if ($validator->fails()) {
            return Redirect::to('pet/add')->withErrors($validator)->withInput();
        } else {
            $pet = new Pet();
            $pet->name = Input::get('name');
            $pet->gender = Input::get('gender');
            $pet->save();
            return Redirect::to('pet/add');
        }
    }

}