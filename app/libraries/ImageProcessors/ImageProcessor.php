<?php
namespace Services\ImageProcessors;

/**
 * Class ImageProcessor
 * @property \Symfony\Component\HttpFoundation\File\UploadedFile $file
 * @package Services
 *
 */
abstract class Processor {

    protected $user_id;

    protected $filename;
    protected $file;

    protected $uploadDir;
    protected $tmpUploadDir;

    public function __construct($user_id) {
        $this->user_id = $user_id;
        $this->uploadDir = \Helper::instance()->getUploadDir($user_id);
        $this->tmpUploadDir = $this->uploadDir . 'tmp' . DIRECTORY_SEPARATOR;
    }

    abstract protected function getSizes();
    abstract protected function afterProcess();

    protected function moveToTmpDir()
    {
        if (!\File::isDirectory($this->tmpUploadDir)) {
            \File::makeDirectory($this->tmpUploadDir, 511, true);
        }
        $this->file = $this->file->move($this->tmpUploadDir, $this->filename . '.' . $this->file->getClientOriginalExtension());
    }

    public function process($files)
    {
        if (!is_array($files)) {
            $files = array($files);
        }

        foreach ($files as $file) {

            $this->file = $file;

            $this->filename = \Helper::instance()->makeFilename();

            $this->moveToTmpDir();

            $image = new \ImageContainer($this->file->getPathname());
            $index = 0;
            foreach ($this->getSizes() as $size) {
                list ($width, $height) = $size;
                if ($index == 0)
                    $currentFilename = $this->filename . '.' . $this->file->getExtension();
                else
                    $currentFilename = $this->filename . '_' . $width . '_' . $height . '.' . $this->file->getExtension();
                $filePath = $this->uploadDir . $currentFilename;
                $image->smart_crop($width, $height)->save($filePath, 70);
                $index++;
            }
            $this->afterProcess();
        }

        \File::deleteDirectory($this->tmpUploadDir);
    }

}