<?php

include '../../connect.php';

$result = mysql_query("SELECT filename, title FROM dle_post WHERE id = $id") or die("������ �� ��������");
$row = mysql_fetch_assoc($result);


$filename = $id.".m3u"; // �������� ��������� ��� ����������
$title = $row["title"]; // �������� �������
$files = $row["filename"]; // ������ ������ � �������



$arr = explode("|",$files); // ��������� �������



print <<<END
                    <div class="showtvserial" ip="192.168.1.100">�� 1</div>
                    <div class="showtvserial" ip="192.168.1.101">�� 2</div>
                    <div class="showtvserial" ip="192.168.1.102">�� 3</div>
                    <div class="showtvserial" ip="192.168.1.103">�� 3</div>
                    <div class="showtvserial" ip="192.168.1.104">�� 3</div>
END;
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
for($i = 0; $i < count($arr); $i++) 
{
$se = $i + 1;
echo "<div class='showtv' onclick=showSeries(" . $i . ")>Ce���" . $se . "</div>";          
}

echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";

   for($a = 0; $a < count($arr); $a++) 
           {
		         $arr2 = explode(",",$arr[$a]); // ��������� �����
                 echo "<div  id=subDiv" . $a . " style='display: none'>";
                 
                     for($b = 0; $b < count($arr2); $b++) 
                    {
					      echo "<div id='seria' ip='none' class='seria' newsid='" . $id . "' season=" . $a. " seria=" . $b. ">";
                             echo $arr2[$b];
	                         echo " ";
                             echo $b + 1;
                             echo " �����\r\n";
                             echo "</div>";
                    }

                echo "</div>";

           }

?>