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

<div id="content" class="container">
    <h1 class="title">需要添加一个新的宠物吗？</h1>

    <?php echo Form::open(array('class'=>'form-type-1')) ?>

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
        <label for="name">这个娃叫</label>
        <input class="form-text" type="text" name="name" id="name" placeholder="娃的名字" value="<?php echo Input::old('name') ?>"/>
    </div>

    <div class="form-row">
        <label for="gender">这个娃是</label>
        {{Form::radio('gender', 'm', Input::old('gender') == 'm')}} 男娃 /
        {{Form::radio('gender', 'f', Input::old('gender') == 'm')}} 女娃 /
        {{Form::radio('gender', 's', Input::old('gender') == 'm')}} 不清楚
    </div>

    <div class="form-row">
        <input type="submit" class="btn btn-primary" value="入住"/>
    </div>
    <?php echo Form::close() ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-6">1</div>
        <div class="col-6">2</div>
    </div>
</div>

@stop