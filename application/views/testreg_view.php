<?php
if (isset($_POST['login'])) {
    $login = $_POST['login'];
    if ($login == '') {
        unset($login);
    }
}
//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) {
    $password=$_POST['password'];
    if ($password =='') {
        unset($password);
    }
}
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit("<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>Вы не ввели всю информацию, вернитесь назад и заполните все поля!</div>");
}
if($_SESSION['login']==null or $_SESSION['password']==null){
    exit("<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>У вас нет доступа к этой странице!</div>");
}
$login=strtolower($login);
$password=strtolower($password);
$login=trim($login);
$password=trim($password);
// подключаемся к базе
include("start.php");// файл start.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь

$user_login=mysql_query("SELECT * FROM `users` WHERE login='' AND password=''", $db);

if(mysql_num_rows($user_login) > 0) {

    $result2 = mysql_query("UPDATE `users` SET `login`='{$_SESSION['login']}', `password`='{$_SESSION['password']}' WHERE `name`='{$_SESSION['name']}'");

    mysql_query("DELETE FROM `users` WHERE `password`='' AND `login`=''", $db);
    unset($user_login);
}
$result = mysql_query("SELECT * FROM `users` WHERE login='$login'",$db); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysql_fetch_assoc($result);
if (empty($login))
{
    //если пользователя с введенным логином не существует
    exit ("<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>Извините, введённый вами логин или пароль неверный</div>");
}
if ($myrow['login']==$login and $myrow['password']==$password) {
    //если существует, то сверяем пароли
        //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
        $_SESSION['login']=$myrow['login'];
        $_SESSION['password']=$myrow['password'];
        //эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
        echo "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span>Вы успешно вошли на сайт! <a href='/'>Главная страница</a>";
    } else {
        //если пароли не сошлись
        exit ("<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>Извините, введённый вами логин или пароль неверный</div>");
    }
