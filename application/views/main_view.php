<h1>Добро пожаловать!</h1>
<p>
<img src="/images/maths.jpg" align="right" hspace="3" height="50%" width="50%" class="img-rounded">
<a href="/">SchoolHelper</a> - это сервис, который поможет закрепить знания, полученные в школе, или наверстать пропущенный материал. Наш проект создан для дополнительных занятий по разным предметам школьной программы.<br>

     Например, выбрав раздел в основном меню "Математика", вы попадаете на страницу со списком тем. Перейдя к соответствующей теме, можно прочесть правила, а также выполнить упражнения или решить задачи. Ответы проверяются сервером и для зарегистрированных пользователей, сохраняются в базе данных "<a href="/">SchoolHelper</a>". Независимо от того, правильно решена задача или нет, вы сможете посмотреть правильное, подробное решение. Статистику своих занятий зарегистрированный пользователь сможет увидеть в личном кабинете.
</p>
<!--<button type="button" data-toggle="modal" data-target=".bs-example-modal-sm">Вы успешно вошли на сайт</button>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <h4>
                Ваше имя:<?php /*echo $_SESSION['name']; */?><br>
                Ваша фамилия:<?php /*echo $_SESSION['lastname']; */?><br>
                Ваш ID:<?php /*echo $_SESSION['id']; */?><br>
                Ваш логин:<?php /*echo $_SESSION['login']; */?><br>
                Ваш пароль:<?php /*echo $_SESSION['password']; */?><br>
            </h4>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
       </div>
</div>-->
<?
if (!empty($_SESSION['login'])) {
    echo "<h1><div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span>Вы успешно вошли на сайт, как " . $_SESSION['name'] . " " . $_SESSION['lastname'] . "</div></h1><br>";
}
?>