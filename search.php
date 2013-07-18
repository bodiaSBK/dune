<?php
$host="localhost";
$user="sbk";
$pwd="19061995";
$db=mysql_connect($host,$user,$pwd);
mysql_select_db("ivensart",$db);

$result = mysql_query("SELECT * FROM dle_post WHERE id = '15' ") or die("error #1");
$row = mysql_fetch_assoc($result);
//$arr = explode(",",$row['news_id']);
echo $row;
?>