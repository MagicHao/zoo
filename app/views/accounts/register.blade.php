@extends('layouts.default')

@section('title')
注册
@stop

@section('content')

<div id="content">
    <div class="centered-content">
        <h1>注册</h1>

        <?php echo Form::open(array('class'=>'form-type-1')) ?>
        <div class="form-row form-tip">
            您正在注册本站独立帐号
        </div>

        @if ($errors->any())
        <div class="form-row">
            <ol class="form-errors">
                @foreach ($errors->all() as $message)
                <li>{{$message}}</li>
                @endforeach
            </ol>
        </div>
        @endif

        <div class="form-row">
            <label for="email">E-mail</label>
            <input class="form-text" type="text" name="email" id="email" placeholder="E-mail" value="<?php echo Input::old('email') ?>"/>
        </div>
        <div class="form-row">
            <label for="password">密码</label>
            <input class="form-text" type="password" name="password" id="password" placeholder="密码"/>
        </div>
        <div class="form-row">
            <label for="repeat-password">重复密码</label>
            <input class="form-text" type="password" name="repeat-password" id="repeat-password" placeholder="重复密码"/>
        </div>
        <div class="form-row">
            <label for="username">用户名或昵称</label>
            <input class="form-text" type="text" name="username" id="username" placeholder="用户名"  value="<?php echo Input::old('username') ?>"/>
        </div>
        <div class="form-row">
            <input type="submit" class="btn btn-primary" value="注册"/>
        </div>
        <?php echo Form::close() ?>
    </div>
</div>

@stop