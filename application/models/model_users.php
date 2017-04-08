<?php

class Users
{

    static public function sayHi()
    {
        if (!empty($_SESSION['login'])) {
            return true;
        } else {
            return false;
        }
    }
}
