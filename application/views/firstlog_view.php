<?php
//Отключаем вывод ошибок
function err_handler($errno, $errmsg, $filename, $linenum)
{
    if (!in_array($errno, Array(E_NOTICE, E_STRICT, E_WARNING)))
    {
        $date = date('Y-m-d H:i:s (T)');
        $f = fopen('errors.log', 'a');
        if (!empty($f)) { $err = "\r\n";
            $err .= " $date\r\n";
            $err .= " $errno\r\n";
            $err .= " $errmsg\r\n";
            $err .= " $filename\r\n";
            $err .= " $linenum\r\n";
            $err .= "\r\n";
            fwrite($f, $err);
            fclose($f);
        }
    }
}
set_error_handler('err_handler');

if($_SESSION['name']==null or $_SESSION['lastname']==null or $_SESSION['login']==null or $_SESSION['password']==null){
exit("<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>У вас нет доступа к этой странице!</div>");
}
?>
<h2>Страница подтверждения аккаунта</h2><br><hr width="50%">
<p>Чтобы подтвердить ваш аккаунт, просто повторно заполните поля:</p><br>
<form method="post" action="/testreg">
    <table class="login">
        <tr>
            <td>Логин<em>*</em></td>
            <td><label><input type="text" name="login" required="required"></label></td>
        </tr>
        <tr>
            <td>Пароль<em>*</em></td>
            <td><label><input type="password" name="password" required="required"></label></td>
        </tr>
        <tr>
            <th colspan="2" style="text-align: right">
                <input type="submit" value="Войти" name="send" style="width: 150px; height: 30px"></th>
        </tr>
    </table>