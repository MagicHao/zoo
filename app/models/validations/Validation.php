<?php

namespace Services;

use Validator;

/**
 * Class Validation
 * @package Services
 *
 */
abstract class Validation {

    protected $creatingRules = array();

    protected $updatingRules = array();

    protected $rules = array();

    protected $validator;

    protected $input;

    protected $existRules = array();

    protected $messages = array();

    public function __construct($input, $rules = array(), $messages = array())
    {
        $this->input = $input;
        $this->rules = $rules;
        $this->messages = array_merge($this->messages, $messages);
    }

    public function mergeRules($rules)
    {
        foreach($rules as $attribute=>$rule) {
            $this->addRule($attribute, $rule);
        }
    }

    public function addRule($attribute, $rule)
    {
        if (array_key_exists($attribute, $this->rules)) {
            $this->rules[$attribute] .= '|'. $rule;
        } else {
            $this->rules[$attribute] = $rule;
        }
    }

    protected function validate()
    {
        $this->validator = Validator::make($this->input, $this->rules, $this->messages);

        if ($this->validator->fails()) {
            throw new ValidationException($this->validator);
        }
    }

    public function create()
    {
        $this->mergeRules($this->creatingRules);
        $this->validate();
    }

    public function update()
    {
        $this->mergeRules($this->updatingRules);
        $this->validate();
    }

}