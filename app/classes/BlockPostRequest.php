<?php

namespace app\classes;

class BlockPostRequest
{
    public static function block(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "Request Method Not Allowed | <a href='/'>Home</a>";
            die();
        }
    }
}