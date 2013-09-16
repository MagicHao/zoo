<?php

namespace Services\PostImages;
use Services\Observer as ObserverService;

class Observer extends ObserverService {

    public function created($postImage)
    {
        /* @var $postImage \PostImage */
        $postImage->post->num_of_images++;
        $postImage->post->save();
        return true;
    }

}