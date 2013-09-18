@extends('layouts.default')

<?php
/**
 * @var $user User
 */
?>

@section('title')
添加宠物
@stop

@section('content')

<div id="content" class="ui-container">
    <div class="ui-grid-row">
        <div class="ui-grid-24">
            <div class="block">
                <h1 class="ui-title">需要添加一个新的宠物吗？</h1>
                <?php echo Form::open(array('class'=>'ui-form', 'files'=>true)) ?>

                <div class="ui-form-item{{$errors->has('name') ? ' ui-form-item-error' : ''}}">
                    <label class="ui-label" for="name">这个娃叫</label>
                    <input class="ui-input" type="text" name="name" id="name" placeholder="娃的名字" value="<?php echo Input::old('name') ?>" required/>
                    @if ($errors->has('name'))
                    <p class="ui-tiptext ui-tiptext-error">{{$errors->first('name')}}</p>
                    @endif
                </div>

                <div class="ui-form-item{{$errors->has('gender') ? ' ui-form-item-error' : ''}}">
                    <label class="ui-label" for="gender">这个娃是</label>
                    {{Form::select('gender', array('m'=>'男娃', 'f'=>'女娃', 's'=>'不清楚'), Input::old('gender'))}}
                    @if ($errors->has('gender'))
                    <p class="ui-tiptext ui-tiptext-error">{{$errors->first('gender')}}</p>
                    @endif
                </div>

                <div class="ui-form-item{{$errors->has('birthdate') ? ' ui-form-item-error' : ''}}">
                    <label class="ui-label" for="birthdate">这个娃的生日是</label>
                    <input class="ui-input" type="text" name="birthdate" id="birthdate" placeholder="娃的生日" value="<?php echo Input::old('birthdate') ?>" required/>
                    @if ($errors->has('birthdate'))
                    <p class="ui-tiptext ui-tiptext-error">{{$errors->first('birthdate')}}</p>
                    @endif
                </div>

                <div class="ui-form-item{{$errors->has('avatar') ? ' ui-form-item-error' : ''}}">
                    <label class="ui-label" for="avatar">头像</label>
                    <div class="ui-file-input">
                        <span>上传头像</span>
                        <input class="ui-input" type="file" name="avatar" id="avatar" value="<?php echo Input::old('avatar') ?>"  required/>
                    </div>
                    @if ($errors->has('avatar'))
                    <p class="ui-tiptext ui-tiptext-error">{{$errors->first('avatar')}}</p>
                    @endif
                </div>

                <div class="ui-form-item">
                    <input type="submit" class="ui-button ui-button-morange" value="入住"/>
                </div>
                <?php echo Form::close() ?>
            </div>
        </div>
    </div>
</div>

@stop