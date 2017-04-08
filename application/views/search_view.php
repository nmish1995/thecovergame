<?php
define('DB_HOST', 'webmait.mysql.ukraine.com.ua');
define('DB_USER', 'webmait_z129');
define('DB_PASS', 'lcs27nby');
define('DB_NAME', 'webmait_z129');

if (!mysql_connect(DB_HOST, DB_USER, DB_PASS)) {
    echo mysql_error();
}
if (!mysql_select_db(DB_NAME)) {
    echo mysql_error();
}

mysql_query('SET NAMES utf8');

function search ($query)
{
    $query = trim($query);
    $query = mysql_real_escape_string($query);
    $query = htmlspecialchars($query);

    $title="SELECT `title` FROM `search` WHERE `id` == 1";
    $text=$title;
    $content="SELECT `content` FROM `search` WHERE `id` == 1";
    $text=$content;

    if (!empty($query))
    {
        if (strlen($query) < 3) {
            $text = '<p>Слишком короткий поисковый запрос.</p>';
        } else if (strlen($query) > 100) {
            $text = '<p>Слишком длинный поисковый запрос.</p>';
        } else {
            $q = "SELECT * FROM search WHERE (`content` LIKE '%{$query}%') OR (`title` LIKE '%{$query}%') OR (`link` LIKE '%{$query}%') OR (`id` LIKE '%{$query}%')";

            $result = mysql_query($q);

            if (mysql_affected_rows() > 0) {
                $row = mysql_fetch_assoc($result);
                $num = mysql_num_rows($result);

                $text = '<p>По запросу <b>'.$query.'</b> найдено совпадений: '.$num.'</p>';

                do {
                    // Делаем запрос, получающий ссылки на статьи
                    $q1 = "SELECT `link` FROM `search` WHERE `id` == 1";
                    $result1 = mysql_query($q1);

                    if (mysql_affected_rows() > 0) {
                        $row1 = mysql_fetch_assoc($result1);
                    }

                    $text ="<a href='$q1'>". $title ."</a><br><br>".$content." ";

                } while ($row = mysql_fetch_assoc($result));
            } else {
                $text = '<p>По вашему запросу ничего не найдено.</p>';
            }
        }
    } else {
        $text = '<p>Задан пустой поисковый запрос.</p>';
    }

    return $text;
}
if (!empty($_POST['query'])) {
    $search_result = search ($_POST['query']);
    echo $search_result;
}
?>