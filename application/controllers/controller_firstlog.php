<?php

class Controller_Firstlog extends Controller
{

    function action_index()
    {
        $this->view->generate('firstlog_view.php', 'template_view.php');
    }
}