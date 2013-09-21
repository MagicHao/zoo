@extends('layouts.default')

<?php
/**
 * @var $pet Pet
 */
?>

@section('title')
{{$pet->name}}
@stop

@section('content')

<div id="content" class="ui-container">
    <div class="ui-grid-row">
        <div class="ui-grid-16">
            <div class="content-main">
                <div class="content-header">
                    <div class="header-inner ui-underline">
                        <h1>{{$pet->name}} 的碎碎念</h1>
                    </div>
                </div>
                @foreach ($posts as $post)
                <div class="u-post-item ui-underline">
                    <div class="u-post-item-info">
                        <span class="u-post-item-avatar"><img src="{{$pet->avatarPath}}" alt="{{$pet->name}}" width="30" /></span>
                        <div class="u-post-item-other"><span class="u-post-item-pet-name">{{HTML::link(URL::route('pet', array($pet->id)), HTML::entities($pet->name))}}</span> 在 <span class="u-post-item-time">{{$post->created_at->format('Y-m-d H:i')}}</span> 说:</div>
                    </div>
                    <div class="u-post-item-content">
                        <p>{{HTML::entities($post->content)}}</p>
                        @foreach ($post->postImages as $postImage)
                        {{HTML::image($postImage->filePath, '', array('width'=>200))}}
                        @endforeach
                    </div>
                </div>
                @endforeach
                <?php echo $posts->links(); ?>
            </div>
        </div>

        <div class="ui-grid-8">
            <div class="content-main">
                <div class="u-pet-profile-box">
                    <div class="u-pet-profile">
                        <div class="u-pet-profile-avatar">
                            <a href="{{URL::route('pet', array($pet->id))}}"><img width="50" src="{{$pet->avatarPath}}" alt="{{$pet->name}}"/></a>
                        </div>
                        <div class="u-pet-profile-content">
                            <div class="u-pet-profile-item pet-profile-name">
                                <a href="{{URL::route('pet', array($pet->id))}}">{{HTML::entities($pet->name)}}</a>
                                @if (Auth::check() && Auth::user()->id == $pet->user->id)
                            <span class="pull-right">
                                {{HTML::link(URL::action('PetController@getEdit', array($pet->id)), '编辑')}}
                            </span>
                                @endif
                            </div>
                            <div class="u-pet-profile-item">
                                <dl>
                                    <dt>1</dt>
                                    <dd>1</dd>
                                </dl>
                                生日：{{$pet->birthdate}}
                            </div>
                            <div class="u-pet-profile-item">
                                性别：{{$pet->gender}}
                            </div>
                            <div class="u-pet-profile-item">
                                入住时间：{{$pet->created_at->format('Y-m-d')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop