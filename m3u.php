<?php

$host="localhost"; // ����
$user="sbk"; // ���� mysql
$pwd="19061995"; // ������ �����
$db=mysql_connect($host,$user,$pwd); // ���� �������
mysql_select_db("ivensart",$db); // ��� ����

$ip = "192.168.1.10";

$id = $_GET['id']; // ���� ������� � �������
$season = $_GET['s'] - 1; // ����� �������

$result = mysql_query("SELECT filename, title FROM dle_post WHERE id = $id") or die("������ �� ��������");
$row = mysql_fetch_assoc($result);
$filename = $id.".m3u"; // �������� ��������� ��� ����������
$title = $row["title"]; // �������� �������
$files = $row["filename"]; // ������ ������ � �������

$arr = explode("|",$files); // ��������� �������
$arr2 = explode(",",$arr[$season]); // ��������� �����

//echo count($arr); // ���������� �������


for($i = 0; $i < count($arr2); $i++) 
{
     echo $title;
	 echo " ";
     echo $i + 1;
     echo " �����\r\n";
	 echo "<br />";
     echo " http://" . $ip . "/media/serial/".$arr2[$i]."\r\n";
     echo "<br /><br />";
}

/*
 for($i = 0; $i < count($arr); $i++) 
  {  

     echo $title;
	 echo " ";
     echo $i + 1;
     echo " �����\r\n";
	 echo "<br />";
     echo " http://192.168.1.10/media/serial/".$arr[$i]."\r\n";
     echo "<br /><br />";	 
  }


header('Content-Disposition: attachment; filename='.$filename.'');
header('Content-Type: application/x-mpegurl; name='.$filename.'');
echo "#EXTM3U\n";

  for($i = 0; $i < count($arr); $i++) 
  {  
     echo "#EXTINF:0,";
     echo $title;
	 echo " ";
     echo $i + 1;
     echo " �����\r\n";
	 
     echo " http://192.168.1.10/media/serial/".$arr[$i]."\r\n"; 
  }
  */
?>