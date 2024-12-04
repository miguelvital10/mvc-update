<?php

namespace app\classes;

use app\interfaces\ControllerInterface;
use Exception;

class BlockAccess
{
    public static function block(ControllerInterface $controllerInterface, array $blockMethods){
        $canBlockMethod = Block::getMethodToBlock($controllerInterface, $blockMethods);

        if ($canBlockMethod) {
            BlockPostRequest::block();
            return redirect('/');
        }
    }
}

