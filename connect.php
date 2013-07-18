<?php

header( 'Content-Type: text/html; charset=cp1251' );

$host="localhost";
$user="root";
$pwd="Ax3Mig";
$db=mysql_connect($host,$user,$pwd);
mysql_select_db("dune",$db);

mysql_query ("set_client='cp1251'");
mysql_query ("set character_set_results='cp1251'");
mysql_query ("set collation_connection='cp1251'");
mysql_query ("SET NAMES cp1251");

?>