<!DOCTYPE html>
<html>
<head>
    <title>动物园 - @yield('title', '我们的家')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL::asset('css/style.css') ?>"/>
    <script type="text/javascript" src="<?php echo URL::asset('seajs/sea.js') ?>"></script>
    <script type="text/javascript">
        seajs.config({
            base: "seajs",
            alias: {
                "jquery": "jquery/jquery.min.js"
            }
        });
    </script>
</head>
<body>

<div class="global-nav-bar">
    <ul class="global-nav-bar-site-menu">
        <li class="global-nav-bar-item"><a href="<?php echo URL::to('/') ?>">首页</a></li>
    </ul>
    <ul class="global-nav-bar-user-menu">
        <li class="global-nav-bar-item"><a href="<?php echo URL::to('post/add') ?>">发布碎碎念</a></li>
        @if (!Auth::check())
        <li class="global-nav-bar-item"><a href="<?php echo URL::to('accounts/register') ?>">注册</a></li>
        <li class="global-nav-bar-item"><a href="<?php echo URL::to('accounts/login') ?>">登录</a></li>
        @else
        <li class="global-nav-bar-item dropdown">
            <a data-toggle="dropdown" href="<?php echo URL::to(join('/', array('u', Auth::user()->id))) ?>">{{Auth::user()->username}}<i class="caret"></i></a>
            <ul class="dropdown-menu">
                <li class="arrow"></li>
                <li><a href="<?php echo URL::to(join('/', array('u', Auth::user()->id))) ?>">个人主页</a></li>
                <li><a href="<?php echo URL::to('accounts/profile') ?>">账户设置</a></li>
                <li><a href="<?php echo URL::to('accounts/logout') ?>">退出</a></li>
            </ul>
        </li>
        @endif
    </ul>
</div>

@include('layouts.header')

@yield('content', '暂无显示内容。')

<script type="text/javascript">
    seajs.use("site/common");
</script>

</body>
</html>