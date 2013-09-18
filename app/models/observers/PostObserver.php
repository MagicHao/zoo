<?php

namespace Services\Posts;

class Observer {

    public function created($post)
    {
        /* @var $post \Post */
        $post->pet->num_of_posts++;
        $post->pet->save();
        $post->pet->user->num_of_posts++;
        $post->pet->user->save();
    }

}