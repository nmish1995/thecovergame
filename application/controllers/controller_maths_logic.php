<?php

class Controller_Maths_Logic extends Controller
{

    function action_index()
    {
        $this->view->generate('maths_logic_view.php', 'template_view.php');
    }
}