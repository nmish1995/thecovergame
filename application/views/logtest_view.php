<?php

require_once("start.php");

session_start();

if(isset($_POST["password"])){

    $password = $_POST["password"];

}
if(isset($_POST["login"])){

    $login = $_POST["login"];

}
if(isset($_POST["send"])){

    $send = $_POST["send"];

}

$login = mb_strtolower($login);

$password = mb_strtolower($password);

//удаляем лишние пробелы

$login=trim($login);

$password=trim($password);

/* Проверяем если была нажата кнопка Войти. Если да, то сравниваем данные полученные из формы с тем логином и паролем который есть в БД и если они совпадаю то пользователь успешно авторизирован, иначе, выводим сообщение что неправильный логин или пароль. Если кнопка не была нажата, значит что пользователь зашел на страницу напрямую и поэтому выводим ему сообщение об этом. */

if(isset($send)) {

    // делаем запрос к БД для выбора данных.

    $query = " SELECT * FROM `users` WHERE `login` = '{$login}' AND `password` = '{$password}'";

    $result = mysql_query($query) or die ("Error : " . mysql_error());

    if(!$result){

        exit ("<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>Логин и/или пароль введены неверно</div>");

    }else{

        $_SESSION['login'] = $result["login"];
        $_SESSION['lastname'] = $result["lastname"];

        header("Location: /");

        exit;
    }
}