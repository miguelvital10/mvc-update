<?php

function formatException (Throwable $throw) {
    var_dump("Erro no arquivo <b>{$throw->getFile()}</b> na linha <b>{$throw->getLine()}</b>: <b><i>{$throw->getMessage()}</i><b>");
}