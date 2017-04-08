<?php
class Controller_Search extends Controller
{

    function action_index()
    {
        $this->view->generate('search_view.php', 'template_view.php');
    }

}