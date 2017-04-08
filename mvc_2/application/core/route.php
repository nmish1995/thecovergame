<?php
namespace application\core\root;

class Route {

    static function start() {

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        //var_dump($routes);

        // получаем имя контроллера и экшна
        $controller_name = empty($_GET['page']) ? 'isNotExist' : strtolower($_GET['page']);
        $action_name = empty($_GET['action']) ? 'template_view' : strtolower($_GET['action']);

        // добавляем префиксы
        $model_name = ucfirst($controller_name);
        $controller_name = ucfirst($controller_name) . 'Controller';
        $action_name = 'action_'.$action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)
        $model_file = ucfirst($model_name) . '.php';
        $model_path = "mvc_2/application/models/" . $model_file;
        if (file_exists($model_path))
            include "mvc_2/application/models/".$model_file;

        // подцепляем файл с классом контроллера
        $controller_file = $controller_name.'.php';
        $controller_path = "application/controllers/".$controller_file;
        if (!file_exists($controller_path))
            Route::ErrorPage404(); // правильно было бы кинуть здесь исключение

        // создаем контроллер
        $controller_name = "mvc_2\\application\\controllers\\{$controller_name}";
        $controller = new $controller_name;

        $action = $action_name;

        if(method_exists($controller, $action)) {
            $controller->$action(); // вызываем действие контроллера
        }else{
            Route::ErrorPage404(); // здесь также разумнее было бы кинуть исключение
        }
    }

    static function ErrorPage404() {

        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
        header("Status: 404 Not Found");

        $mainController = new MainController();
        $mainController->action_404();
    }
}