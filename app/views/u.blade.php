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
    <div class="ui-grid-row" id="J_post_box">

        <div class="ui-grid-8 J_post_item">
            <div class="block">
                <div class="u-user-profile">
                    <div class="u-user-profile-main">
                        <div class="u-user-profile-avatar">
                            {{HTML::image($user->avatarPath, $user->username, array('width'=>80, 'class'=>'img-circled'))}}
                        </div>
                        <div class="u-user-profile-info">
                            <div class="u-user-profile-username font-20">
                                {{HTML::entities($user->username)}}
                            </div>
                            <div class="u-user-profile-item">{{$user->customGender}}</div>
                            <div class="u-user-profile-item">入住于: {{$user->created_at->format('Y-m-d H:i')}}</div>
                        </div>
                    </div>
                    <ul class="u-user-profile-stats">
                        <li><a href=""><strong>{{$user->num_of_posts}}</strong> 碎碎念</a></li>
                        <li><a href=""><strong>{{$user->num_of_pets}}</strong> 宠物</a></li>
                        <li><a href=""><strong>{{$user->num_of_visits}}</strong> 人气</a></li>
                    </ul>
                </div>
                @if (Auth::check() && Auth::user()->id == $user->id)
                <div class="u-quick-post">
                    <a href="{{URL::action('PostController@getAdd')}}" class="ui-button ui-button-primary">发布碎碎念</a>
                </div>
                @endif
            </div>
        </div>
        <div class="ui-grid-8 J_post_item">
            <div class="block">
                <div class="u-pet-profile-box">
                    @if (!$user->pets->isEmpty())
                    @foreach ($user->pets as $pet)
                    <div class="u-pet-profile">
                        <div class="u-pet-profile-avatar">
                            <a href="{{URL::route('pet', array($pet->id))}}"><img class="img-circled" width="50" src="{{$pet->avatarPath}}" alt="{{$pet->name}}"/></a>
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
                                出生于：{{$pet->birthdate}}
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

        @foreach ($posts as $post)
        <div class="ui-grid-8 J_post_item">
            <div class="block">
                <div class="u-post-item">
                    <div class="u-post-item-info">
                        <span class="u-post-item-avatar"><img class="img-circled" src="{{$post->pet->avatarPath}}" alt="{{$post->pet->name}}" width="40" /></span>
                        <div class="u-post-item-other"><span class="u-post-item-pet-name">{{HTML::link(URL::route('pet', array($post->pet->id)), HTML::entities($post->pet->name))}}</span> 在 <span class="u-post-item-time">{{$post->created_at->format('Y-m-d H:i')}}</span> 说:</div>
                    </div>
                    <div class="u-post-item-content">
                        <p>{{HTML::entities($post->content)}}</p>
                        @foreach ($post->postImages as $postImage)
                        {{HTML::image($postImage->filePath, '', array('width'=>200))}}
                        @endforeach
                    </div>
                </div>
                <?php echo $posts->links(); ?>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script type="text/javascript">
    seajs.use('site/u');
</script>

@stop