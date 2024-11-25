<?php

namespace app\classes;

use app\interfaces\ControllerInterface;

class BlockAccess
{
    public static function block(ControllerInterface $controllerInterface, array $blockMethods){
        $canBlockMethod = Block::getMethodToBlock($controllerInterface, $blockMethods);

        if ($canBlockMethod) {
            return redirect('/');
        }
    }
}

