<?php

class PetController extends BaseController {

    public function __construct(){
        $this->beforeFilter('auth', array('only'=> array('getAdd', 'postAdd', 'getEdit', 'postEdit')));
        $this->beforeFilter('guest', array('only'=>array(

        )));
    }

    public function getAdd()
    {
        $user = Auth::user();
        return View::make('pet.add');
    }

    public function postAdd()
    {
        $user = Auth::user();
        try {
            $validator = new \Services\Pets\Validation(Input::all());
            $validator->create();
        } catch (\Services\ValidationException $e) {
            return Redirect::back()->withErrors($e->getErrors())->withInput();
        }

        $pet = new Pet(Input::all());
        if ($user->pets()->save($pet)) {
            $pet->updateAvatar(Input::file('avatar'));
            return Redirect::route('u', array($user->id));
        } else {
            return Redirect::back()->withErrors($pet->getErrors())->withInput();
        }
    }

    public function getEdit($id)
    {
        $pet = Pet::where('user_id', '=', Auth::user()->id)->findOrFail($id);
        return View::make('pet.edit', array('pet'=>$pet));
    }

    public function postEdit($id)
    {
        $pet = Pet::where('user_id', '=', Auth::user()->id)->findOrFail($id);
        /* @var $pet Pet */
        $validator = Validator::make(Input::all(), Pet::$updatingRules);
        if ($validator->fails()) {
            return Redirect::action('PetController@getEdit', array($id))->withErrors($validator)->withInput();
        } else {
            $pet->name = Input::get('name');
            $pet->gender = Input::get('gender');
            $pet->birthdate = Input::get('birthdate');
            Auth::user()->updatePet($pet, Input::file('avatar'));
            return Redirect::route('u', array(Auth::user()->id));
        }
    }

}