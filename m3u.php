<?php

$host="localhost"; // ’ост
$user="sbk"; // юзер mysql
$pwd="19061995"; // пароль юзера
$db=mysql_connect($host,$user,$pwd); // инит конекта
mysql_select_db("ivensart",$db); // им€ базы

$ip = "192.168.1.10";

$id = $_GET['id']; // айди новости с запроса
$season = $_GET['s'] - 1; // сезон сериала

$result = mysql_query("SELECT filename, title FROM dle_post WHERE id = $id") or die("«апрос не выполнен");
$row = mysql_fetch_assoc($result);
$filename = $id.".m3u"; // название плейлиста при сохранении
$title = $row["title"]; // название новости
$files = $row["filename"]; // список файлов в новости

$arr = explode("|",$files); // обработка сезонов
$arr2 = explode(",",$arr[$season]); // обработка серий

//echo count($arr); // количество сезонов


for($i = 0; $i < count($arr2); $i++) 
{
     echo $title;
	 echo " ";
     echo $i + 1;
     echo " сери€\r\n";
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
     echo " сери€\r\n";
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
     echo " сери€\r\n";
	 
     echo " http://192.168.1.10/media/serial/".$arr[$i]."\r\n"; 
  }
  */
?>