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
    static public function UserLogout()
    {
        session_unset();
        session_destroy();
    }
}
