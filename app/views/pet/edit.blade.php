@extends('layouts.default')

<?php
/**
 * @var $pet Pet
 */
?>

@section('title')
修改宠物
@stop

@section('content')

<div id="content" class="ui-container">
    <div class="ui-grid-row">
        <div class="ui-grid-24">
            <div class="block">
                <h1 class="ui-underline">修改宠物</h1>
                @if (Session::has('redirect_notice'))
                <div class="ui-tiptext-container ui-tiptext-container-success">
                    <p class="ui-tiptext ui-tiptext-success">
                        <i class="ui-tiptext-icon"></i>
                        {{Session::get('redirect_notice')}}
                    </p>
                </div>
                @endif
                <?php echo Form::open(array('class'=>'ui-form', 'files'=>true)) ?>

                <div class="ui-form-item{{$errors->has('name') ? ' ui-form-item-error' : ''}}">
                    <label class="ui-label" for="name">这个娃叫</label>
                    <input class="ui-input" type="text" name="name" id="name" placeholder="娃的名字" value="<?php echo $pet->name ?>" required/>
                    @if ($errors->has('name'))
                    <p class="ui-tiptext ui-tiptext-danger"><i class="ui-tiptext-icon"></i>{{$errors->first('name')}}</p>
                    @endif
                </div>

                <div class="ui-form-item{{$errors->has('gender') ? ' ui-form-item-error' : ''}}">
                    <label class="ui-label" for="gender">这个娃是</label>
                    <div class="ui-form-text">
                        @foreach (Helper::instance()->getGenders() as $key=>$gender)
                        <div class="ui-radio-group"><span>{{$gender}}</span> {{Form::radio('gender', $key, $pet->gender == $key)}}</div>
                        @endforeach
                    </div>
                    @if ($errors->has('gender'))
                    <p class="ui-tiptext ui-tiptext-danger"><i class="ui-tiptext-icon"></i>{{$errors->first('gender')}}</p>
                    @endif
                </div>

                <div class="ui-form-item{{$errors->has('birthdate') ? ' ui-form-item-error' : ''}}">
                    <label class="ui-label" for="birthdate">这个娃的生日是</label>
                    <input class="ui-input" type="text" name="birthdate" id="birthdate" placeholder="娃的生日" value="<?php echo $pet->birthdate ?>" required/>
                    <span class="ui-form-other">生日格式为： xxxx-xx-xx</span>
                    @if ($errors->has('birthdate'))
                    <p class="ui-tiptext ui-tiptext-danger"><i class="ui-tiptext-icon"></i>{{$errors->first('birthdate')}}</p>
                    @endif
                </div>

                <div class="ui-form-item{{$errors->has('avatar') ? ' ui-form-item-error' : ''}}">
                    <label class="ui-label" for="avatar">头像</label>
                    <div class="ui-file-input">
                        <span>上图图像</span>
                        <input class="ui-input" type="file" name="avatar" id="avatar" value="<?php echo Input::old('avatar') ?>"/>
                    </div>
                    @if ($errors->has('avatar'))
                    <p class="ui-tiptext ui-tiptext-danger"><i class="ui-tiptext-icon"></i>{{$errors->first('avatar')}}</p>
                    @endif
                </div>

                <div class="ui-form-item">
                    <div class="ui-label"></div>
                    <div class="ui-form-text">
                        <img width="100" src="{{$pet->avatarPath}}" alt="{{$pet->name}}"/>
                    </div>
                </div>

                <div class="ui-form-item">
                    <input type="submit" class="ui-button ui-button-primary" value="保存"/>
                </div>
                <?php echo Form::close() ?>
            </div>
        </div>
    </div>
</div>

@stop