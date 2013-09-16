<?php

class CustomValidator extends Illuminate\Validation\Validator {

    public function validateFileCount($attribute, $value, $parameters)
    {
        $max = $parameters[0];
        if ($max == 0) return true;
        if (!is_array($value)) $value = array($value);
        $count = count($value);
        if ($count > $max) return false;
        return true;
    }

    protected function replaceFileCount($message, $attribute, $rule, $parameters)
    {
        return str_replace(':count', $parameters[0], $message);
    }

}