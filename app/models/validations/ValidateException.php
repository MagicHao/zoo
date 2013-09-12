<?php

namespace Services;

use Validator;
use Exception;

/**
 * Class ValidationException
 * @package Services
 */
class ValidationException extends Exception {

    private $_errors;

    public function __construct($container)
    {
        $this->_errors = $container;

        parent::__construct();
    }

    public function getErrors()
    {
        return $this->_errors;
    }
    
}