<?php
namespace Services\ImageProcessors;


/**
 * Class AvatarImageProcessor
 * @package Services\ImageProcessors
 */
class AvatarImageProcessor extends Processor {

    protected $model;

    public function __construct($user_id, $model)
    {
        parent::__construct($user_id);
        $this->model = $model;
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
        if ($this->model->avatar) {
            $index = 0;
            foreach ($this->sizes as $size) {
                list($width, $height) = $size;
                if ($index == 0)
                    $filename = $this->model->avatar;
                else {
                    list($name, $ext) = explode('.', $this->model->avatar);
                    $filename = $name . '_' . $width . '_' . $height . '.' . $ext;
                }
                \File::delete($this->uploadDir . $filename);
                $index++;
            }
        }
        $this->model->avatar = $this->filename . '.' . $this->file->getExtension();
        $this->model->save();
    }

}