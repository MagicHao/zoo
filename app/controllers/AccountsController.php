<?php

class AccountsController extends BaseController {

    public function __construct(){
        $this->beforeFilter('auth', array('only'=> array('getProfile')));
        $this->beforeFilter('guest', array('only'=>array(
            'getRegister', 'getLogin',
            'postLogin', 'postLogin'
        )));
    }

    public function getRegister()
    {
        return View::make('accounts.register');
    }

    public function postRegister()
    {
        try {
            $validator = new \Services\Users\Validation(Input::all());
            $validator->create();
        } catch (\Services\ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
        $user = new User();
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->username = Input::get('username');
        if ($user->save()) {
            return Redirect::to('accounts/login')->with('redirect_notice', '注册成功，请登录。');
        } else {
            return Redirect::to('accounts/register')->withErrors($user->errors);
        }
    }

    public function getLogin()
    {
        return View::make('accounts.login');
    }

    public function postLogin()
    {
        $validatorRules = array(
            'email'=>'required|email',
            'password'=>'required|min:5|max:32'
        );
        $validator = Validator::make(Input::all(), $validatorRules);
        if ($validator->fails()) {
            return Redirect::to('accounts/login')->withErrors($validator)->withInput();
        } else {
            if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
                return Redirect::intended(URL::route('u', array(Auth::user()->id)))->with('redirect_notice', '登录成功。');
            } else {
                return Redirect::to('accounts/login')->with('redirect_notice', '用户名不存在或密码错误。')->withInput();
            }
        }
    }

    public function getProfile()
    {
        $user = Auth::user();
        return View::make('accounts.profile', array('user'=>$user));
    }

    public function postProfile()
    {
        $user = Auth::user();

        try {
            $validator = new Services\Users\Validation(Input::all());
            $validator->update();
        } catch (\Services\ValidationException $e) {
            return Redirect::action('AccountsController@getProfile')->withErrors($validator)->withInput();
        }
        $user->fill(Input::all());
        $user->save();
        if (Input::hasFile('avatar')) $user->updateAvatar(Input::file('avatar'));
        return Redirect::action('AccountsController@getProfile')->with('redirect_notice', '保存成功。');
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

}