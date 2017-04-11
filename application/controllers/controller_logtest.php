<?php

class Controller_Logtest extends Controller
{

    function action_index()
    {
        $this->view->generate('logtest_view.php', 'template_view.php');
    }
}