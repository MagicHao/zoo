<?php

namespace Services\ImageProcessors;

use \PostImage as PostImage;

/**
 * Class ImageProcessor
 * @property \Post $post
 * @package Services\Posts
 */

class PostImageProcessor extends Processor {

    protected $post;

    public function __construct($user_id, $post)
    {
        parent::__construct($user_id);
        $this->post = $post;
    }

    protected $sizes = array(
        array('400', '400'),
        array('800', '800'),
    );

    protected function getSizes()
    {
        return $this->sizes;
    }

    protected function afterProcess()
    {
        $postImage = new PostImage();
        $postImage->filename = $this->filename . '.' . $this->file->getExtension();
        $postImage->post()->associate($this->post);
        $postImage->user()->associate($this->post->user);
        $postImage->pet()->associate($this->post->pet);
        $postImage->save();
    }

}