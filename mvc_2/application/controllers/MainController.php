<?php
namespace main\controllers;
use Controller;

class MainController extends Controller{
    function action_index()
    {
        $this->view->generate('main_view.php', 'template_view.php');
    }
}
