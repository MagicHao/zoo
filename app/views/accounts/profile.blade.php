@extends('layouts.default')

@section('title')
{{Auth::user()->username}}
@stop

@section('content')

<div id="content" class="container">
    <h1 class="title">个人基本信息<span class="sub-head pull-right"><a class="btn btn-primary" href="<?php echo URL::to('pet/add') ?>">添加宠物</a></span></h1>

</div>

@stop