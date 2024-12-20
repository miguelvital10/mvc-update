<?php

namespace app\classes;

use app\interfaces\ValidateInterface;

class Validate
{

    public $errors = false;
    public array $data = [];

    private function validationInstance(string $field, array $validations)
    {
        foreach ($validations as $classValidate) {
            $namespace = "app\\classes\\";

            $class = $namespace . $classValidate;

            [$class, $param] = $this->classWithColon($class);
            
            if (class_exists($class)) {
                $this->data[$field] = $this->executeClass(new $class, $field,$param);
            }
        }

    }

    private function classWithColon($class){
        $param = null;
        
        if (str_contains($class, ':')) {
            [$class, $param] = explode(':', $class);
            var_dump($class);
        }

        return [ $class, $param ];
    }

    public function handle(array $validations)
    {
        foreach ($validations as $field => $validation) {
            $this->validationInstance($field, $validation);
        }

        if (in_array(false, $this->data)) {
            $this->errors = true;   
        }
    }

    private function executeClass(ValidateInterface $validateInterface, $field, $param){
        return $validateInterface->handle($field, $param);
    }
}
