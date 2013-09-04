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

<div id="content" class="container">
    <h1 class="title">{{$user->username}}</h1>
    <div class="user-profile">
        <div class="user-profile-avatar">
            {{HTML::image($user->avatar, $user->username, array('width'=>150))}}
        </div>
    </div>

    <h2 class="title">{{$user->username}} 家的孩子</h2>

</div>

@stop