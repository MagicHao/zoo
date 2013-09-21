@extends('layouts.default')

<?php
/**
 * @var $user User
 * @var $pets Array
 */
?>

@section('title')
发布碎碎念
@stop

@section('content')

<div id="content" class="ui-container">
    <div class="ui-grid-row">
        <div class="ui-grid-24">
            <div class="content-main">
                <div class="content-header">
                    <div class="header-inner ui-underline">
                        <h1>发布一条碎碎念</h1>
                    </div>
                </div>
                <?php echo Form::open(array('class'=>'ui-form', 'files'=>true)) ?>

                <div class="ui-form-item{{$errors->has('pet_id') ? ' ui-form-item-error' : ''}}">
                    <label class="ui-label" for="pet_id">选择要说话的娃</label>
                    {{Form::select('pet_id', $pets, Input::old('pet_id'))}}
                    @if ($errors->has('pet_id'))
                    <p class="ui-form-explain ui-tiptext ui-tiptext-error">
                        <i class="ui-tiptext-icon"></i>
                        {{$errors->first('pet_id')}}
                    </p>
                    @endif
                </div>

                <div class="ui-form-item{{$errors->has('content') ? ' ui-form-item-error' : ''}}">
                    <label class="ui-label" for="content">要说的话</label>
                    <textarea class="ui-textarea" name="content" id="content" required>{{Input::old('content')}}</textarea>
                    @if ($errors->has('content'))
                    <p class="ui-form-explain ui-tiptext ui-tiptext-error">
                        <i class="ui-tiptext-icon"></i>{{$errors->first('content')}}
                    </p>
                    @endif
                </div>

                <div class="ui-form-item{{$errors->has('image') ? ' ui-form-item-error' : ''}}">
                    <label class="ui-label" for="image">添加一张图片</label>
                    <div class="ui-file-input">
                        <span>上传图像</span>
                        <input class="ui-input" type="file" name="image" id="image" value="<?php echo Input::old('image') ?>"/>
                    </div>
                    @if ($errors->has('image'))
                    <p class="ui-form-explain ui-tiptext ui-tiptext-error">
                        <i class="ui-tiptext-icon"></i>{{$errors->first('image')}}
                    </p>
                    @endif
                </div>

                <div class="ui-form-item">
                    <input type="submit" class="ui-button ui-button-primary" value="发布"/>
                </div>
                <?php echo Form::close() ?>
            </div>
        </div>
    </div>
</div>

@stop