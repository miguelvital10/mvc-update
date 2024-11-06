<?php

namespace app\interfaces;

interface ActiveRecordInterface
{
    public function execute(ActiveRecordExecuteInterface $updateInterface);
    public function __set($attributes, $value);
    public function __get($attribute);
    public function getTable();
    public function getAttributes();
}