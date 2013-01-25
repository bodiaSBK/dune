<?php
$host="localhost";
$user="sbk";
$pwd="19061995";
$db=mysql_connect($host,$user,$pwd);
mysql_select_db("ivensart",$db);


$to_download = mysql_query("SELECT COUNT(*) FROM dle_post WHERE filename = ''") or die("Запрос не выполнен");
$all = mysql_query("SELECT COUNT(*) filename FROM dle_post") or die("Запрос не выполнен");

$row_to_download = mysql_fetch_row($to_download);
$row_all = mysql_fetch_row($all);

$total_to_download = $row_to_download[0];
$total_all = $row_all[0];
$total_downloaded = $total_all - $total_to_download;


print ( "Всего фильмов: $total_all" );
print ( "<br />");
print ( "Фильмов привязано:$total_downloaded" );
print ( "<br />");
print ( "Не привязанных фильмов: $total_to_download ");


?>