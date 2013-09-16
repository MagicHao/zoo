@extends('layouts.default')

@section('title')
我们的家
@stop

@section('content')

<div id="content">
    <div class="ui-container">
        <div class="ui-grid-row">
            <div class="ui-grid-24" id="J-post-box">
                @foreach ($posts as $post)
                <div class="J-post-box-item">
                    <div class="block">
                        <div class="u-post-item">
                            <div class="u-post-item-info">
                                <div class="u-post-item-avatar"><img src="{{$post->pet->avatarPath}}" alt="{{$post->pet->name}}" width="30" /></div>
                                <div class="u-post-item-other"><span class="u-post-item-user-name">{{HTML::link(URL::route('u', array($post->user->id)), HTML::entities($post->user->username))}}</span> 家的 <span class="u-post-item-pet-name">{{HTML::link(URL::route('pet', array($post->pet->id)), HTML::entities($post->pet->name))}}</span> 在 <span class="u-post-item-time">{{$post->created_at->format('Y-m-d H:i')}}</span> 说:</div>
                            </div>
                            <div class="u-post-item-content">
                                <p>{{HTML::entities($post->content)}}</p>
                                @foreach ($post->postImages as $postImage)
                                {{HTML::image($postImage->filePath, '', array('width'=>200))}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="ui-grid-24">
                <?php echo $posts->links(); ?>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .J-post-box-item{
        width: 470px;
    }
</style>

<script type="text/javascript">
    seajs.use('site/u');
</script>

@stop