<?php

include '../../connect.php';

$result = mysql_query("SELECT filename, title FROM dle_post WHERE id = $id") or die("Запрос не выполнен");
$row = mysql_fetch_assoc($result);


$filename = $id.".m3u"; // название плейлиста при сохранении
$title = $row["title"]; // название новости
$files = $row["filename"]; // список файлов в новости



$arr = explode("|",$files); // обработка сезонов



print <<<END
                    <div class="showtvserial" ip="192.168.1.100">ТВ 1</div>
                    <div class="showtvserial" ip="192.168.1.101">ТВ 2</div>
                    <div class="showtvserial" ip="192.168.1.102">ТВ 3</div>
                    <div class="showtvserial" ip="192.168.1.103">ТВ 3</div>
                    <div class="showtvserial" ip="192.168.1.104">ТВ 3</div>
END;
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
for($i = 0; $i < count($arr); $i++) 
{
$se = $i + 1;
echo "<div class='showtv' onclick=showSeries(" . $i . ")>Ceзон" . $se . "</div>";          
}

echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";

   for($a = 0; $a < count($arr); $a++) 
           {
		         $arr2 = explode(",",$arr[$a]); // обработка серий
                 echo "<div  id=subDiv" . $a . " style='display: none'>";
                 
                     for($b = 0; $b < count($arr2); $b++) 
                    {
					      echo "<div id='seria' ip='none' class='seria' newsid='" . $id . "' season=" . $a. " seria=" . $b. ">";
                             echo $arr2[$b];
	                         echo " ";
                             echo $b + 1;
                             echo " серия\r\n";
                             echo "</div>";
                    }

                echo "</div>";

           }

?>