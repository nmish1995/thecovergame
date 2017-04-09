<?php
include("/application/SxGeo.php");
include("/application/SxGeoCity.php");
//$SxGeo = new SxGeo(); // Режим по умолчанию, файл бд SxGeo.dat
$SxGeo = new SxGeo('SxGeoCity.dat', SXGEO_BATCH | SXGEO_MEMORY); // Самый быстрый режим
$SxGeo->get($ip);
// $SxGeo->getCityFull($ip); (возвращает полную информацию о городе и регионе)
echo "<div class='alert alert-warning' role='alert'><span class='glyphicon glyphicon-console' aria-hidden='true'></span>Ваш IP-адрес -- ".$ip."</div>";