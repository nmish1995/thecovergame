<?php

class Controller_Testreg extends Controller
{

    function action_index()
    {
        $this->view->generate('testreg_view.php', 'template_view.php');
    }
}