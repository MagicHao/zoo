@extends('layouts.default')

@section('title')
登录
@stop

@section('content')

<div id="content" class="ui-container">
    <div class="ui-grid-row">
        <div class="ui-grid-15 ui-grid-push-5">
            <div class="content-main">
                <div class="content-header">
                    <div class="header-inner ui-underline">
                        <h1>登录</h1>
                    </div>
                </div>

                @if (Session::has('redirect_notice'))
                <div class="ui-tipbox ui-tipbox-danger">
                    <div class="ui-tipbox-icon"></div>
                    <div class="ui-tipbox-content">
                        <div class="ui-tipbox-title">
                            <?php echo Session::get('redirect_notice'); ?>
                        </div>
                    </div>
                </div>
                @endif

                <div class="content-body">
                    <?php echo Form::open(array('class'=>'ui-form')) ?>

                    <div class="ui-form-item{{$errors->has('email') ? ' ui-form-item-error' : ''}}">
                        <label for="email" class="ui-label">E-mail</label>
                        <input class="ui-input" type="email" name="email" id="email" placeholder="E-mail" value="<?php echo Input::old('email') ?>" required />
                        @if ($errors->has('email'))
                        <p class="ui-form-explain ui-tiptext ui-tiptext-danger">
                            <i class="ui-tiptext-icon"></i>
                            {{$errors->first('email')}}
                        </p>
                        @endif
                    </div>
                    <div class="ui-form-item{{$errors->has('password') ? ' ui-form-item-error' : ''}}">
                        <label for="password" class="ui-label">密码</label>
                        <input class="ui-input" type="password" name="password" id="password" placeholder="密码" required />
                        @if ($errors->has('password'))
                        <p class="ui-form-explain ui-tiptext ui-tiptext-danger"><i class="ui-tiptext-icon"></i>{{$errors->first('password')}}</p>
                        @endif
                    </div>
                    <div class="ui-form-item">
                        <input type="submit" class="ui-button ui-button-primary" value="登录"/>
                    </div>
                    <?php echo Form::close() ?>
                </div>

            </div>
        </div>
    </div>

    @stop