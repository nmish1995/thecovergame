<!DOCTYPE HTML>
<html>
<head>
    <title>SchoolHelper</title>
    <script src="https://cdn.rawgit.com/zenorocha/clipboard.js/master/dist/clipboard.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css"><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <script type="text/javascript">

        function random(number) {

            return Math.floor( Math.random()*(number+1) );
        }

        // show random quote
        $(document).ready(function() {

            var quotes = $('.quote');
            quotes.hide();

            var qlen = quotes.length; //document.write( random(qlen-1) );
            $( '.quote:eq(' + random(qlen-1) + ')' ).show(); //tag:eq(1)
        });
    </script>
    <?php
    /*    if(isset($_GET['st'])){
            $old_dizayn=$_GET['st'];
        }else{
            $old_dizayn=1;
        }if($old_dizayn==2){
            echo "<link rel='stylesheet' type='text/css' href='/assets/css/main_new.css'>";
            $new_dizayn=1;
            include "/";
        }else{
            echo "<link rel='stylesheet' type='text/css' href='/assets/css/main.css'>";
            $new_dizayn=2;
            include "/";
        }*/
    ?>
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <div id="main">
        <div class="inner">

            <!-- Header -->
            <header id="header">
                <a href="/" class="logo"><strong>School</strong>Helper</a>
                <ul class="icons">
                    <li><a href="https://twitter.com/?lang=ru" class="icon fa-twitter" target="blank"><span class="label">Twitter</span></a></li>
                    <li><a href="https://www.facebook.com/" class="icon fa-facebook" target="blank"><span class="label">Facebook</span></a></li>
                    <li><a href="https://www.snapchat.com/" class="icon fa-snapchat-ghost" target="blank"><span class="label">Snapchat</span></a></li>
                    <li><a href="https://www.instagram.com/" class="icon fa-instagram" target="blank"><span class="label">Instagram</span></a></li>
                    <li><a href="https://medium.com/" class="icon fa-medium" target="blank"><span class="label">Medium</span></a></li>
                </ul>
            </header>

            <!-- Banner -->
            <section id="banner">
                <div class="content">
                    <?php include 'application/views/'.$content_view; ?>
                </div>
            </section>
            <!-- Section -->
            <!--section>
                <header class="major">
                    <h2>Unnamed</h2>
                </header>
                <div class="features">
                    <article>
                        <span class="icon fa-diamond"></span>
                        <div class="content">
                            <h3>№1</h3>
                            <p>Hello</p>
                        </div>
                    </article>
                    <article>
                        <span class="icon fa-paper-plane"></span>
                        <div class="content">
                            <h3>№2</h3>
                            <p>Hello</p>
                        </div>
                    </article>
                    <article>
                        <span class="icon fa-rocket"></span>
                        <div class="content">
                            <h3>№3</h3>
                            <p>Hello</p>
                        </div>
                    </article>
                    <article>
                        <span class="icon fa-signal"></span>
                        <div class="content">
                            <h3>№4</h3>
                            <p>Hello</p>
                        </div>
                    </article>
                </div>
            </section-->
        </div>
    </div>
    <!-- Sidebar -->
    <div id="sidebar">
        <div class="inner">
            <!-- Search -->
            <section id="search" class="alt">
                <form method="post" action="/search">
                    <input type="text" name="query" id="query" placeholder="Поиск..." />
                </form>
            </section>

            <!-- Menu -->
            <nav id="menu">
                <header class="major">
                    <h2>Меню</h2>
                </header>
                <ul>
                    <li><a href="/">Домашняя страница</a></li>
                    <li><a href="/contacts">Контакты</a></li>
                    <li><a href="/randpass">Генератор паролей</a></li>

                    <?php
                    include "application/models/model_users.php";
                    $enter = "<li><a href='/login'>Войти</a></li>";
                    $reg = "<li><a href='/registration'>Регистрация</a></li>";
                    $user = new Users();
                    $result = $user::sayHi();
                    if ($result==false){
                        echo $enter;
                        echo $reg;
                    }else{
                        echo "<li><a href=".$user::UserLogout().">Выйти</li>";
                    }
                    ?>
                    <li>
                        <span class="opener">Математика</span>
                        <ul>
                            <li><a href="/maths_frmls">Основные формулы</a></li>
                            <li><a href="/maths_logic">Логические задачи</a></li>
                            <li><a href="/calc">Онлайн калькулятор</a></li>
                            <li><a href="/hram_nauki">У входа в храм науки о случайном</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- Section -->
            <section>
                <header class="major">
                    <h2>Случайная цитата</h2>
                </header>
                <div>
                    <p align="justify" class="quote">
                        «Жизнь — не страдание и не наслаждение, а дело, которое мы обязаны делать и честно довести его до конца.»
                    </p>
                    <p align="justify" class="quote">
                        «Стремись не к тому, чтобы добиться успеха, а к тому, чтобы твоя жизнь имела смысл»
                    </p>
                    <p align="justify" class="quote">
                        «Тот, кто хочет - ищет возможности. Тот, кто не хочет - ищет причины... »
                    </p>
                    <p align="justify" class="quote">
                        «Сумасшедшим становится тот, кто попытался разобраться в этом сумасшедшем мире»
                    </p>
                    <p align="justify" class="quote">
                        «Каждый живет, как хочет, и расплачивается за это сам»
                    <p align="justify" class="quote">
                        «Восемьдесят три процента всех дней в году начинаются одинаково: звенит будильник»
                    <p align="justify" class="quote">
                        «Чем дольше ты ждёшь, тем больше вероятность, что ты ждёшь не там»
                    </p>
                    <p align="justify" class="quote">
                        «Новогоднее настроение – это когда рад видеть даже тех, кто ошибся дверью»
                    </p>
                </div>
            </section>
            <!-- Section -->
            <section>
                <header class="major">
                    <h2>Контакты</h2>
                </header>
                <ul class="contact">
                    <li class="fa-envelope-o"><a href="http://mail.google.com/">nmish2005@gmail.com</a></li>
                    <li class="fa-phone">(050) 525-1731</li>
                    <li class="fa-home">Украина, Винница<br />
                    </li>
                </ul>
            </section>

        </div>
    </div>
</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>
</body>
</html>