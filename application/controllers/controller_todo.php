<?php
class Controller_Todo extends Controller
{

function action_index()
{
$this->view->generate('todo_view.php', 'template_view.php');
}

}