<?php

namespace app\models\activerecord;

use app\interfaces\ActiveRecordInterface;
use app\interfaces\ActiveRecordExecuteInterface;
use app\models\connection\Connection;

class Find implements ActiveRecordExecuteInterface{

    public function execute(ActiveRecordInterface $activeRecordInterface)
    {
        var_dump($activeRecordInterface->getAttributes());
    }
    
}