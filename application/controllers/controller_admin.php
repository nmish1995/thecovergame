<?php

class Controller_Admin extends Controller
{
	
	function action_index()
	{
		
		/*
		Для простоты, в нашем случае, проверяется равенство сессионной переменной admin прописанному
		в коде значению — паролю. Такое решение не правильно с точки зрения безопасности.
		Пароль должен храниться в базе данных в захешированном виде, но пока оставим как есть.
		*/
		if ( $_SESSION['admin_mike'] == "2508" )
		{
			$this->view->generate('admin_view.php', 'template_view.php');
		}
		else
		{
			/*
		    session_destroy();
			Route::ErrorPage404();
			*/
			echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>Вы не вошли в аккаунт, доступ запрещен</div>";
            $this->view->generate('login_view.php', 'template_view.php');
		}

	}
	
	// Действие для разлогинивания администратора
	function action_logout()
	{

		session_start();
		session_destroy();
		header('Location:/');
	}

}