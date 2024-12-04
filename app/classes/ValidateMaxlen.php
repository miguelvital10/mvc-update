<?php

namespace app\classes;

use app\interfaces\ValidateInterface;

class ValidateMaxlen implements ValidateInterface
{
    const MAX_LEN= 5;
    public function handle($field, $param)
    {
        $string = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);

        if (strlen($string) > self::MAX_LEN) {
            Flash::set($field,"O campo não pode ter mais que 5 caracteres");
            return false;
        }

        Old::set($field,$string);

        return $string;
    }
}