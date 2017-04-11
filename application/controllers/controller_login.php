<?php

class Controller_Login extends Controller
{
	
	function action_index()
	{
		$data["login_status"] = "";

		if(isset($_POST['login']) and isset($_POST['password']))
		{
			$login = $_POST['login'];
			$password =$_POST['password'];

			if($login=="admin_mike" and $password=="2508")
			{

				$data["login_status"] = "access_granted";
				
				echo $_SESSION['admin_mike'];

				$_SESSION['admin_mike'] = $password;

				header('Location:/admin/');
			}
			else
			{

                $data["login_status"] = "access_denied";

            }
		}
		else
		{
			$data["login_status"] = "";
		}

		$this->view->generate('login_view.php', 'template_view.php', $data);
	}
	
}