@extends('layouts.default')

<?php
/**
 * @var $user User
 */
?>

@section('title')
{{$user->username}}
@stop

@section('content')

<div id="content" class="ui-container">
    <div class="ui-grid-row">
        <div class="ui-grid-24">
            <div class="block">
                <h1 class="ui-title">
                    个人基本信息
                <span class="ui-sub-title pull-right">
                @if ($user->num_of_pets < User::PETS_MAX)
                <a class="ui-button ui-button-sorange" href="<?php echo URL::action('PetController@getAdd') ?>">添加宠物</a>
                @else
                您的宠物个数已经为最大允许数: {{User::PETS_MAX}}
                @endif
                </span>
                </h1>
                @if (Session::has('redirect_notice'))
                <div class="ui-tiptext-container ui-tiptext-container-success">
                    <p class="ui-tiptext ui-tiptext-success">
                        <i class="ui-tiptext-icon"></i>
                        {{Session::get('redirect_notice')}}
                    </p>
                </div>
                @endif
                <?php echo Form::open(array('class'=>'ui-form', 'files'=>true)) ?>

                <div class="ui-form-item{{$errors->has('gender') ? ' ui-form-item-error' : ''}}">
                    <label class="ui-label" for="gender">性别</label>
                    {{Form::select('gender', array('m'=>'男', 'f'=>'女', 's'=>'不清楚'), $user->gender)}}
                    @if ($errors->has('gender'))
                    <p class="ui-tiptext ui-tiptext-error">{{$errors->first('gender')}}</p>
                    @endif
                </div>

                <div class="ui-form-item{{$errors->has('avatar') ? ' ui-form-item-error' : ''}}">
                    <label class="ui-label" for="avatar">头像</label>
                    <div class="ui-file-input">
                        上传图像
                        <input class="ui-input" type="file" name="avatar" id="avatar" value="<?php echo Input::old('avatar') ?>"/>
                    </div>
                    @if ($errors->has('avatar'))
                    <p class="ui-tiptext ui-tiptext-error">{{$errors->first('avatar')}}</p>
                    @endif
                </div>

                <div class="ui-form-item">
                    <label class="ui-label" for="avatarPreview"></label>
                    <div class="ui-form-text"><img width="100" src="{{$user->avatarPath}}" alt="{{$user->username}}"/></div>
                </div>

                <div class="ui-form-item">
                    <input type="submit" class="ui-button ui-button-morange" value="保存"/>
                </div>
                <?php echo Form::close() ?>
            </div>
        </div>
    </div>
</div>

@stop