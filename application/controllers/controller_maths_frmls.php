<?php

class Controller_Maths_Frmls extends Controller
{

    function action_index()
    {
        $this->view->generate('maths_frmls_view.php', 'template_view.php');
    }
}