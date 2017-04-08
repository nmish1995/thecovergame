<?php

class Controller_Calc extends Controller
{
	
	function action_index()
	{
		$this->view->generate('calc_view.php', 'template_view.php');
	}
}