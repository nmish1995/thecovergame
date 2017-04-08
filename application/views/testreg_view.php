<?php
session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
if (isset($_POST['name'])) { $name=$_POST['name']; if ($name =='') { unset($name);} }
if (isset($_POST['lastname'])) { $lastname=$_POST['lastname']; if ($lastname =='') { unset($lastname);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password) or empty($name) or empty($lastname)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>Вы не ввели всю информацию, вернитесь назад и заполните все поля!</div>";
}
//удаляем лишние пробелы
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
$login=trim($login);
$password=trim($password);
$name=trim($name);
$lastname=trim($lastname);
// подключаемся к базе
include("start.php");// файл start.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь

$result = mysql_query("SELECT * FROM `users` WHERE login='$login'",$db); //извлекаем из базы все данные о пользователе с введенным логином
$user_login=mysql_query("SELECT `login` FROM `users` WHERE login='null'", $db);
$user_pass=mysql_query("SELECT `password` FROM `users` WHERE password='null'", $db);
if($user_login==null and $user_pass==null) {
    $result2 = mysql_query("INSERT INTO users (login,password) VALUES('$login','$password')");
}
if($user_login==null and $user_pass==null){
    mysql_query("DELETE `name` FROM `users` WHERE `login`='null' AND `password`='null'", $db);
    mysql_query("DELETE `name` FROM `users` WHERE `password`='null' AND `login`='null'", $db);
    unset($user_pass);
    unset($user_login);
}
$myrow = mysql_fetch_array($result);
if (empty($myrow['password']))
{
    //если пользователя с введенным логином не существует
    exit ("<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>Извините, введённый вами логин или пароль неверный</div>");
}
else {
    //если существует, то сверяем пароли
    if ($myrow['password']==$password) {
        //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
        $_SESSION['login']=$myrow['login'];
        $_SESSION['password']=$myrow['password'];
        $_SESSION['name']=$myrow['name'];
        $_SESSION['lastname']=$myrow['lastname'];
        //эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
        echo "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span>Вы успешно вошли на сайт! <a href='/'>Главная страница</a>";
    }
    else {
        //если пароли не сошлись
        exit ("<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>Извините, введённый вами логин или пароль неверный</div>");
    }
}
