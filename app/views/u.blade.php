@extends('layouts.default')

<?php
/**
 * @var $user User
 * @var $posts Post[]
 */
?>

@section('title')
{{$user->username}}
@stop

@section('content')

<div id="content" class="ui-container">
    <div class="ui-grid-row">
        <div class="ui-grid-16">
            <div class="block">
                <h1 class="ui-underline">{{$user->username}} 的资料</h1>
                <div class="u-user-profile">
                    <div class="u-user-profile-avatar">
                        {{HTML::image($user->avatarPath, $user->username, array('width'=>150))}}
                    </div>
                </div>
            </div>
            <div class="block">
                <h2 class="ui-underline">碎碎念</h2>
                @foreach ($posts as $post)
                <div class="u-post-item">
                    <div class="u-post-item-info">
                        <span class="u-post-item-avatar"><img src="{{$post->pet->avatarPath}}" alt="{{$post->pet->name}}" width="30" /></span>
                        <div class="u-post-item-other"><span class="u-post-item-pet-name">{{HTML::link(URL::route('pet', array($post->pet->id)), HTML::entities($post->pet->name))}}</span> 在 <span class="u-post-item-time">{{$post->created_at->format('Y-m-d H:i')}}</span> 说:</div>
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
            <div class="block">

                <h2 class="ui-underline">{{$user->username}} 家的孩子</h2>
                <div class="u-pet-profile-box">
                    @if (!$user->pets->isEmpty())
                    @foreach ($user->pets as $pet)
                    <div class="u-pet-profile">
                        <div class="u-pet-profile-avatar">
                            <a href="{{URL::route('pet', array($pet->id))}}"><img width="50" src="{{$pet->avatarPath}}" alt="{{$pet->name}}"/></a>
                        </div>
                        <div class="u-pet-profile-content">
                            <div class="u-pet-profile-item pet-profile-name">
                                <a href="{{URL::route('pet', array($pet->id))}}">{{HTML::entities($pet->name)}}</a>
                                @if (Auth::check() && Auth::user()->id == $user->id)
                            <span class="pull-right">
                                {{HTML::link(URL::action('PetController@getEdit', array($pet->id)), '编辑')}}
                            </span>
                                @endif
                            </div>
                            <div class="u-pet-profile-item">
                                入住时间：{{$pet->created_at->format('Y-m-d')}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="ui-tiptext-container ui-tiptext-container-message">
                        <p class="ui-tiptext ui-tiptext-message">
                            <i class="ui-tiptext-icon"></i>您暂时还没有为宠物添加档案。
                            现在去 <a href="{{URL::action('PetController@getAdd')}}">添加档案</a>。
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

@stop