<?php

namespace app\classes;

use app\interfaces\ValidateInterface;

class ValidateMaxlen implements ValidateInterface
{
    public function handle($field, $param)
    {
        $string = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);

        if (strlen($string) > 5) {
            Flash::set($field,"O campo não pode ter mais que {$param} caracteres");
            return false;
        }

        return $string;
    }
}