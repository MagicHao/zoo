@extends('layouts.default')

<?php
/**
 * @var $user User
 */
?>

@section('title')
{{Auth::user()->username}}
@stop

@section('content')

<div id="content">
    <h1>{{$user->username}}</h1>
    <div class="user-profile">
    </div>
</div>

@stop