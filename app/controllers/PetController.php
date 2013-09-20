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
            if (Input::hasFile('avatar')) {
                $processor = new \Services\ImageProcessors\AvatarImageProcessor($user->id, $pet);
                $processor->process(Input::file('avatar'));
            }
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

        try {
            $validator = new Services\Pets\Validation(Input::all());
            $validator->update();
        } catch(\Services\ValidationException $e) {
            return Redirect::action('PetController@getEdit', array($id))->withErrors($e->getErrors())->withInput();
        }

        $pet->name = Input::get('name');
        $pet->gender = Input::get('gender');
        $pet->birthdate = Input::get('birthdate');
        if ($pet->save()) {
            if (Input::hasFile('avatar')) {
                $processor = new Services\ImageProcessors\AvatarImageProcessor(Auth::user()->id, $pet);
                $processor->process(Input::file('avatar'));
            }
            return Redirect::action('PetController@getEdit', array($id))->with('redirect_notice', '已更新宠物信息。');
        } else {
            return Redirect::action('PetController@getEdit', array($id))->withErrors($pet->getErrors())->withInput();
        }
    }

}