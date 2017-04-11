<h1>Регистрация</h1>
<form action="/save_user" method="post">
    <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
    <table class="login">
        <tr>
            <td><h4><b><label>Как вас зовут?<br></label></b></h4></td>
            <td><h5>Имя:<em>*</em></h5><input name="name" type="text" size="15" maxlength="15" required="required" placeholder="Например:Иван"></td>
            <td><h5>Фамилия:<em>*</em></h5><input name="lastname" type="text" size="15" maxlength="15" required="required" placeholder="Например:Иванов"></td>
        </tr>
        <tr>
            <td colspan="1"><h4><b><label>Введите придуманный логин:<em>*</em><br></label></b></h4></td>
            <td colspan="1"><input name="login" type="text" size="15" maxlength="15" required="required" placeholder="Например: login"></td>
        </tr>
        <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
        <tr>
            <td colspan="1"><h4><b><label>Введите придуманный пароль:<em>*</em><br></label></b></h4></td>
            <td colspan="1"><input name="password" type="password" size="15" maxlength="15" required="required" placeholder="Например: password"></td>
            <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->
        </tr>
        <tr>
            <td colspan="1"><h4><b><label>Повторно введите пароль:<em>*</em><br></label></b></h4></td>
            <td colspan="1"><input name="password" type="password" size="15" maxlength="15" required="required" placeholder="Например: password"></td>
            <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->
        </tr>
        <tr>
            <td colspan="3"><input type="submit" name="send" value="Зарегистрироваться"><br></td>
        </tr>
    </table>
    <!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** -->
</form>