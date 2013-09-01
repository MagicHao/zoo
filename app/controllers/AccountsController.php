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
        $validator = Validator::make(Input::all(), User::$validatorRules);
        if ($validator->fails()) {
            return Redirect::to('accounts/register')->withErrors($validator)->withInput();
        } else {
            $user = new User();
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->username = Input::get('username');
            if ($user->save()) {
                return Redirect::to('accounts/login')->with('redirect_notice', '注册成功，请登录。');
            } else {
                return Redirect::to('accounts/register')->with('redirect_notice', '注册失败，请稍后重试。');
            }
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
                return Redirect::intended(join('/', array('u', Auth::user()->id)))->with('redirect_notice', '登录成功。');
            } else {
                return Redirect::to('accounts/login')->with('redirect_notice', '用户名不存在或密码错误。')->withInput();
            }
        }
    }

    public function getProfile()
    {
        return View::make('accounts.profile');
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

}