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
            <h1 class="ui-title">{{$user->username}}</h1>
            <div class="user-profile">
                <div class="user-profile-avatar">
                    {{HTML::image($user->avatar, $user->username, array('width'=>150))}}
                </div>
            </div>
        </div>

        <div class="ui-grid-24">
            <h2 class="ui-title">{{$user->username}} 家的孩子</h2>
        </div>
        @foreach ($user->pets as $pet)
        <div class="ui-grid-6">
            <div class="pet-profile">
                <div class="pet-profile-avatar">
                    <img width="80" src="{{$pet->avatar}}" alt="{{$pet->name}}"/>
                </div>
                <div class="pet-profile-content">
                    <div class="pet-profile-item pet-profile-name">
                        {{HTML::entities($pet->name)}}
                    </div>
                    <div class="pet-profile-item">
                        性别：{{$pet->gender}}
                    </div>
                    <div class="pet-profile-item">
                        入住时间：{{$pet->created_at->format('Y-m-d')}}
                    </div>
                    @if (Auth::check() && Auth::user()->id == $user->id)
                    <div class="pet-profile-item text-right">
                        {{HTML::link(URL::action('PetController@getEdit', array($pet->id)), '编辑')}}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@stop