<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<h1>Страница авторизации</h1>

<form method="post">
    <table class="login">
        <tr>
            <th colspan="2">Авторизация</th>
        </tr>
        <tr>
            <td>Логин<em>*</em></td>
            <td><input type="text" name="login" required="required"></td>
        </tr>
        <tr>
            <td>Пароль<em>*</em></td>
            <td><input type="password" name="password" required="required"></td>
        </tr>
        <tr>
        <th colspan="2" style="text-align: right">
            <input type="submit" value="Войти" name="send" style="width: 150px; height: 30px"></th>
        </tr>
    </table>
</form>
<div><p>Похожие статьи: <code><a href="/registration">Регистрация</a></code> <code><a href="/randpass">Генератор паролей</a></code></p></div>


<?php

require_once("start.php");

if(isset($_POST["password"])){ $password = $_POST["password"]; }
if(isset($_POST["login"])){ $login = $_POST["login"]; }
if(isset($_POST["send"])){ $send = $_POST["send"]; }
$login=mb_strtolower($login);
$password=mb_strtolower($password);
//удаляем лишние пробелы
$login=trim($login);
$password=trim($password);
/* Проверяем если была нажата кнопка Войти. Если да, то сравниваем данные полученные из формы с тем логином и паролем который есть в БД и если они совпадаю то пользователь успешно авторизирован, иначе, выводим сообщение что неправильный логин или пароль. Если кнопка не была нажата, значит что пользователь зашел на страницу напрямую и поэтому выводим ему сообщение об этом. */
if(isset($send)) {
    // делаем запрос к БД для выбора данных.
    $query = " SELECT * FROM users WHERE login = $login AND password = '$password'";
    $result = mysql_query($query) or die ("Error : " . mysql_error());

    if(!$result){
        exit ("<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>Логин и/или пароль введены неверно</div>");
    }else{
        $_SESSION['login'] = $result["login"];
        $_SESSION['id'] = $result["id"];
        $_SESSION['password'] = $result["password"];
        $_SESSION['name'] = $result["name"];
        $_SESSION['lastname'] = $result["lastname"];
        header("Location: /");
        exit;
    }
}
?>