<?php
if (isset($_POST['login'])) {
    $login = $_POST['login'];
    if ($login == '') {
        unset($login);
    }
} //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) {
    $password=$_POST['password'];
    if ($password =='') {
        unset($password);
    }
}
if (isset($_POST['name'])) {
    $name=$_POST['name'];
    if ($name =='') {
        unset($name);
    }
}
if (isset($_POST['lastname'])) {
    $lastname=$_POST['lastname'];
    if ($lastname =='') {
        unset($lastname);
    }
}
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password) or empty($name) or empty($lastname)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit ("<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>Вы не ввели всю информацию, вернитесь назад и заполните все поля!</div>");
}
if (!function_exists('mb_ucfirst') && extension_loaded('mbstring'))
{
    function mb_ucfirst($name, $encoding='UTF-8')
    {
        $name = mb_ereg_replace('^[\ ]+', '', $name);
        $name = mb_strtoupper(mb_substr($name, 0, 1, $encoding), $encoding).
            mb_substr($name, 1, mb_strlen($name), $encoding);
        return $name;
    }
}
$name=mb_ucfirst($name);
if (!function_exists('mb_ucfirst') && extension_loaded('mbstring'))
{
    function mb_ucfirst($lastname, $encoding='UTF-8')
    {
        $lastname = mb_ereg_replace('^[\ ]+','',$lastname);
        $lastname = mb_strtoupper(mb_substr($lastname,0,1,$encoding),$encoding).
            mb_substr($lastname, 1, mb_strlen($lastname), $encoding);
        return $lastname;
    }
}
$lastname=mb_ucfirst($lastname);
$login=strtolower($login);
$password=strtolower($password);
//удаляем лишние пробелы
$login=trim($login);
$password=trim($password);
$name=trim($name);
$lastname=trim($lastname);
// подключаемся к базе
include("start.php");// файл start.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
// проверка на существование пользователя с таким же логином
$result = mysql_query("SELECT * FROM users WHERE login='$login'",$db);
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
    exit ("<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>Извините, пользователь с таким логином уже зарегистрирован</div>");
}
// если такого нет, то сохраняем данные
$result2 = mysql_query("INSERT INTO `users` (`name`, `lastname`) VALUES ('{$name}','{$lastname}')");
// Проверяем, есть ли ошибки
if ($result2=='TRUE' and mb_strlen($name)>2 and mb_strlen($name)<25 and mb_strlen($lastname)>2 and mb_strlen($lastname)<25  and mb_strlen($lastname)>2 and mb_strlen($login)<25  and mb_strlen($login)>2 and mb_strlen($password)<25 and mb_strlen($password)>2)
{
    echo "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span>Вы почти зарегистрированы! Чтобы подтвердить регистрацию, перейдите по <i><b><a href='/firstlog'>этой ссылке</a></b></i></div>";
    $_SESSION['name'] = $name;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['password'] = $password;
    $_SESSION['login'] = $login;
}else {
    echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>Ошибка! Вы не зарегистрированы</div>";
}
