<!DOCTYPE html>
<html>
<head>
    <title>动物园 - @yield('title', '我们的家')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL::asset('css/normalize.css') ?>"/>
    <link rel="stylesheet" href="<?php echo URL::asset('css/style.css') ?>"/>
</head>
<body>

<div class="global-nav-bar">
    <ul class="global-nav-bar-site-menu">
        <li class="global-nav-bar-item"><a href="<?php echo URL::to('/') ?>">首页</a></li>
    </ul>
    <ul class="global-nav-bar-user-menu">
        @if (!Auth::check())
        <li class="global-nav-bar-item"><a href="<?php echo URL::to('accounts/register') ?>">注册</a></li>
        <li class="global-nav-bar-item"><a href="<?php echo URL::to('accounts/login') ?>">登录</a></li>
        @else
        <li class="global-nav-bar-item"><a href="<?php echo URL::to('accounts/profile') ?>">{{Auth::user()->username}}</a></li>
        <li class="global-nav-bar-item"><a href="<?php echo URL::to('accounts/logout') ?>">退出</a></li>
        @endif
    </ul>
</div>

@include('layouts.header')

@yield('content', '暂无显示内容。')

</body>
</html>