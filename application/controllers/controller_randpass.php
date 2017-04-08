<?php
class Controller_RandPass extends Controller
{

    function action_index()
    {
        $this->view->generate('randpass_view.php', 'template_view.php');
    }

}