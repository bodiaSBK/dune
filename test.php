<?php
$host="localhost";
$user="sbk";
$pwd="19061995";
$db=mysql_connect($host,$user,$pwd);
mysql_select_db("ivensart",$db);


$to_download = mysql_query("SELECT COUNT(*) FROM dle_post WHERE filename = ''") or die("������ �� ��������");
$all = mysql_query("SELECT COUNT(*) filename FROM dle_post") or die("������ �� ��������");

$row_to_download = mysql_fetch_row($to_download);
$row_all = mysql_fetch_row($all);

$total_to_download = $row_to_download[0];
$total_all = $row_all[0];
$total_downloaded = $total_all - $total_to_download;


print ( "����� �������: $total_all" );
print ( "<br />");
print ( "������� ���������:$total_downloaded" );
print ( "<br />");
print ( "�� ����������� �������: $total_to_download ");


?>