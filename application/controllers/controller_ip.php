<?php

class Controller_Ip extends Controller
{

    function action_index()
    {
        $this->view->generate('ip_view.php', 'template_view.php');
    }
}