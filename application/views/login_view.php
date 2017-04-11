<h1>Страница авторизации</h1>

<form method="post" action="/logtest">
    <table class="login">
        <tr>
            <th colspan="2">Авторизация</th>
        </tr>
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
</form>
<div>
    <p>Похожие статьи:
        <code>
            <a href="/registration">Регистрация</a>
        </code>

        <code>
            <a href="/randpass">Генератор паролей</a>
        </code>
    </p>
</div>
