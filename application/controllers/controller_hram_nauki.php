<?php

class Controller_Hram_Nauki extends Controller
{

    function action_index()
    {
        $this->view->generate('hram_nauki_view.php', 'template_view.php');
    }
}