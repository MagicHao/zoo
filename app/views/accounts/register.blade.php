@extends('layouts.default')

@section('title')
注册
@stop

@section('content')

<div id="content" class="ui-container">
    <div class="ui-grid-row">
        <div class="ui-grid-15 ui-grid-push-5">
            <div class="block">
                <h1 class="ui-underline">注册</h1>

                <?php echo Form::open(array('class'=>'ui-form')) ?>

                <div class="ui-form-item form-tip">
                    您正在注册本站独立帐号
                </div>

                <div class="ui-form-item{{$errors->has('email') ? ' ui-form-item-error' : ''}}">
                    <label class="ui-label" for="email">E-mail</label>
                    <input class="ui-input" type="email" name="email" id="email" placeholder="E-mail" value="<?php echo Input::old('email') ?>" required />
                    @if ($errors->has('email'))
                    <p class="ui-form-explain ui-tiptext ui-tiptext-error"><i class="ui-tiptext-icon"></i>{{$errors->first('email')}}</p>
                    @endif
                </div>
                <div class="ui-form-item{{$errors->has('password') ? ' ui-form-item-error' : ''}}">
                    <label class="ui-label" for="password">密码</label>
                    <input class="ui-input" type="password" name="password" id="password" placeholder="密码" required />
                    @if ($errors->has('password'))
                    <p class="ui-form-explain ui-tiptext ui-tiptext-error"><i class="ui-tiptext-icon"></i>{{$errors->first('password')}}</p>
                    @endif
                </div>
                <div class="ui-form-item{{$errors->has('username') ? ' ui-form-item-error' : ''}}">
                    <label class="ui-label" for="username">用户名或昵称</label>
                    <input class="ui-input" type="text" name="username" id="username" placeholder="用户名"  value="<?php echo Input::old('username') ?>" required />
                    @if ($errors->has('username'))
                    <p class="ui-form-explain ui-tiptext ui-tiptext-error"><i class="ui-tiptext-icon"></i>{{$errors->first('username')}}</p>
                    @endif
                </div>
                <div class="ui-form-item">
                    <input type="submit" class="ui-button ui-button-primary" value="注册"/>
                </div>
                <?php echo Form::close() ?>
            </div>
        </div>
    </div>
</div>

@stop