<?php

class Helper {

    const HASH_DIR_LEVEL = 400;

    private static $_instance;

    public static function instance()
    {
        if (!self::$_instance) self::$_instance = new static();
        return self::$_instance;
    }

    private function __construct() {}

    public function getUploadDir($id)
    {
        return public_path() . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, array('images', 'uploads', $id % self::HASH_DIR_LEVEL, $id, ''));
    }

    public function getUploadURL($id, $filename)
    {
        return URL::asset('images/uploads/' . $id % self::HASH_DIR_LEVEL . '/' . $id . '/' . $filename);
    }

    public function makeFilename() {
        $formatString='YmdHisu';
        $t = microtime(true);
        $micro = sprintf("%06d", ($t - floor($t)) * 1000000);
        $formatString = str_replace('u', $micro, $formatString);
        return date($formatString, $t);
    }

    public function getGenders()
    {
        return array(
            'f' => '男娃',
            'm' => '女娃',
            's' => '不清楚'
        );
    }

    public function getPetTypes()
    {
        $petTypes = PetType::get(array('id', 'name'));
        return $petTypes;
    }
}