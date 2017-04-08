<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>SchoolHelper</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
		<script type="text/javascript">
		// return a random integer between 0 and number
		function random(number) {
			
			return Math.floor( Math.random()*(number+1) );
		};
		
		// show random quote
		$(document).ready(function() { 

			var quotes = $('.quote');
			quotes.hide();
			
			var qlen = quotes.length; //document.write( random(qlen-1) );
			$( '.quote:eq(' + random(qlen-1) + ')' ).show(); //tag:eq(1)
		});
		</script>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<a href="/">School</span> <span class="cms">Helper</span></a>
				</div>
				<div id="menu">
					<ul>
						<li class="first active"><a href="/">Главная</a></li>
						<li><a href="/calc">Приложения</a></li>
						<li class="last"><a href="/contacts">Контакты</a></li>
					</ul>
					<br class="clearfix" />
				</div>
			</div>
			<div id="page">
				<div id="sidebar">
					<div class="side-box">
						<!--p>
							<h2><b><i>Внимание!!!</i></b><br></h2><h4>Запущена <b>БЕТА</b>-версия данного сайта, то есть он сейчас находится в разработке.<br>Позже на месте предупреждения будут случайные цитаты.</h4>
						</p-->
						<h3>Случайная цитата</h3>
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
					<div class="side-box">
						<h3>Основное меню</h3>
						<ul class="list">
							<li class="first "><a href="/">Главная</a></li>
							<li><a href="/calc">Калькулятор</a></li>
							<li class="last"><a href="/contacts">Контакты</a></li>
						</ul>
					</div>
				</div>
				<div id="content">
					<div class="box">
						<?php include 'application/views/'.$content_view; ?>
						<!--
						<h2>Welcome to Accumen</h2>
						<img class="alignleft" src="images/pic01.jpg" width="200" height="180" alt="" />
						<p>
							This is <strong>Accumen</strong>, a free, fully standards-compliant CSS template by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>. The images used in this template are from <a href="http://fotogrph.com/">Fotogrph</a>. This free template is released under a <a href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attributions 3.0</a> license, so you are pretty much free to do whatever you want with it (even use it commercially) provided you keep the footer credits intact. Aside from that, have fun with it :)
						</p>
						-->
					</div>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
			<div id="page-bottom">
				<div id="page-bottom-sidebar">
					<h3>Наши контакты</h3>
					<ul class="list">
						<li class="first">Номер телефона: +380505251731</li>
						<li>skypeid: nmish2005</li>
						<li class="last">email: nmish2005@gmail.com</li>
					</ul>
				</div>
				<!-- div id="page-bottom-content">
					<h3>О сайте</h3>
					<p>
			
					</p>
				</div -->
				<br class="clearfix" />
			</div>
		</div>
		<div id="footer">
			<a href="/">МИША_CMS v2.0</a> &copy; 2017</a>
		</div>
	</body>
</html>