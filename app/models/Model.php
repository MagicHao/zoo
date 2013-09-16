<?php

/**
 * Class Model
 */

class Model extends Eloquent {

    protected $errors;

    public $creatingRules = array();
    public $updatingRules = array();

    public function addError($key, $value)
    {
        if (!$this->errors)
            $this->errors = new Illuminate\Support\MessageBag();
        $this->errors->add($key, $value);
    }

    public function getErrors()
    {
        if (!$this->errors)
            $this->errors = new Illuminate\Support\MessageBag();
        return $this->errors;
    }
}