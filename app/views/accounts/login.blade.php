@extends('layouts.default')

@section('title')
登录
@stop

@section('content')

<div id="content">
    <div class="centered-content">
        <h1>登录</h1>

        <?php echo Form::open(array('class'=>'form-type-1')) ?>

        @if (Session::has('redirect_notice'))
        <div class="form-row form-tip">
            <?php echo Session::get('redirect_notice'); ?>
        </div>
        @endif

        <div class="form-row">
            @if ($errors->any())
            <ol class="form-errors">
                @foreach ($errors->all() as $message)
                <li>{{$message}}</li>
                @endforeach
            </ol>
            @endif
        </div>

        <div class="form-row">
            <label for="email">E-mail</label>
            <input class="form-text" type="text" name="email" id="email" placeholder="E-mail" value="<?php echo Input::old('email') ?>"/>
        </div>
        <div class="form-row">
            <label for="password">密码</label>
            <input class="form-text" type="password" name="password" id="password" placeholder="密码"/>
        </div>
        <div class="form-row">
            <input type="submit" class="btn btn-primary" value="登录"/>
        </div>
        <?php echo Form::close() ?>
    </div>
</div>

@stop