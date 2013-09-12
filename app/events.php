<?php

Event::listen('auth.login', function($user){
    /* @var $user User */
    $ip = Request::getClientIp();
    $user->last_ip = ip2long($ip);
    $user->save();
});

User::observe(new Services\Users\Observer());
Pet::observe(new Services\Pets\Observer());
Post::observe(new Services\Posts\Observer());