<?php

class PostController extends BaseController {

    public function __construct(){
        $this->beforeFilter('auth', array('only'=> array('getAdd', 'postAdd', 'getEdit', 'postEdit')));
        $this->beforeFilter('guest', array('only'=>array(

        )));
    }

    public function getAdd()
    {
        $user = Auth::user();
        $pets = Pet::where('user_id', '=', $user->id)->get(array('id', 'name'));
        $petsData = array();
        $pets->each(function($pet) use (&$petsData){
            /* @var $pet Pet */
            $petsData[$pet->id] = $pet->name;
        });
        return View::make('post.add', array('pets'=>$petsData));
    }

    public function postAdd()
    {
        $user = Auth::user();
        if (Input::has('pet_id')) {
            $pet = Pet::where('user_id', '=', $user->id)->findOrFail(Input::get('pet_id'));
            /* @var $pet Pet */
            try {
                $validator = new Services\Posts\Validation(Input::all());
                $validator->create();
            } catch (Services\ValidationException $e) {
                return Redirect::back()->withErrors($e->getErrors())->withInput();
            }
            $post = new Post(Input::all());
            $pet->posts()->save($post);
            return Redirect::route('u', array($user->id));
        } else {
            $messages = New \Illuminate\Support\MessageBag();
            $messages->add('pet_id', '你需要选择一只宠物。');
            return Redirect::back()->withInput()->withErrors($messages);
        }
    }

    public function getEdit($id)
    {
    }

    public function postEdit($id)
    {
    }

}