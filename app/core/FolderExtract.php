<?php

namespace app\core;

class FolderExtract
{
    public static function extract(){
        $uri = Uri::uri();

        $folder = '';

        if (isset($uri[0]) and $uri[0] !== '') {
            $folder = $uri[0];

            
            return is_dir(strtolower(ROOT.'/'.CONTROLLER_PATH.$folder)) ? $folder : '';
        }

        return $folder;
    }
}