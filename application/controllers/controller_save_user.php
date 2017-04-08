<?php

class Controller_Save_User extends Controller
{

    function action_index()
    {
        $this->view->generate('save_user_view.php', 'template_view.php');
    }
}