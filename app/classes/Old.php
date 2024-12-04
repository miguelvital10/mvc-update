<?php

namespace app\classes;

Class Old
{
    public static function set($key)
    {
        if (!isset($_SESSION['old'][$key])) {
            $_SESSION['old'][$key] = [];
        }
    }

    public static function get($key)
    {
        if (isset($_SESSION['old'][$key])) {
            $flash = $_SESSION['old'][$key];
            unset ($_SESSION['old'][$key]);

            return $flash;
        }
    }
}