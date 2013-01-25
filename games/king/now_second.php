<?php
$host="localhost"; // Хост
$user="sbk"; // юзер mysql
$pwd="19061995"; // пароль юзера
$db=mysql_connect($host,$user,$pwd); // инит конекта
mysql_select_db("ivensart",$db); // имя базы

$result = mysql_query("SELECT * FROM games") or die("Запрос не выполнен");

echo "<form name='form' id='form' method='post' style='margin: 0;'>"; 

$i = 0;
while ($row = mysql_fetch_assoc($result))
{
	$i++;
	if($i == 9){
		echo "<h2 style='margin:0; padding-left:215px;padding-top: 20px;' >Антон</h2>";
	}	
	elseif($i == 13){
		echo "<h2 style='margin:0; padding-left:215px;padding-top: 20px;' >Серж</h2>";
	}		
	
	
echo "<input type='hidden' name='id[]' value='" . $row['id'] . "' />";
echo "<table border=0>";

if($i == 9 or $i == 10 or $i == 11 or $i == 12 or $i == 13 or $i == 14 or $i == 15 or $i == 16){
if($i == 1 or $i == 5 or $i == 9 or $i == 13){
echo "    <tr>";
echo "        <td width=15></td>";
echo "        <td><input style='border:0; text-align:center; width: 30px; font-weight:bold; font-size: 16pt;' type='text' size='1' maxlength='3' name='В' value='В' tabindex='1' /></td>";
echo "        <td><input style='border:0; text-align:center; width: 30px; font-weight:bold; font-size: 16pt;' type='text' size='1' maxlength='3' name='Ч' value='Ч' tabindex='1' /></td>";
echo "        <td><input style='border:0; text-align:center; width: 30px; font-weight:bold; font-size: 16pt;' type='text' size='1' maxlength='3' name='М' value='М' tabindex='1' /></td>";
echo "        <td><input style='border:0; text-align:center; width: 30px; font-weight:bold; font-size: 16pt;' type='text' size='1' maxlength='3' name='Д' value='Д' tabindex='1' /></td>";
echo "        <td><input style='border:0; text-align:center; width: 30px; font-weight:bold; font-size: 16pt;' type='text' size='1' maxlength='3' name='К' value='К' tabindex='1' /></td>";
echo "        <td><input style='border:0; text-align:center; width: 30px; font-weight:bold; font-size: 16pt;' type='text' size='1' maxlength='3' name='ДП' value='ДП' tabindex='1' /></td>";
echo "        <td><input style='border:0; text-align:center; width: 30px; font-weight:bold; font-size: 16pt;' type='text' size='1' maxlength='3' name='Е' value='Е' tabindex='1' /></td>";
echo "        <td><input style='border:0; text-align:center; width: 30px; font-weight:bold; font-size: 16pt;' type='text' size='1' maxlength='3' name='1' value='1' tabindex='1' /></td>";
echo "        <td><input style='border:0; text-align:center; width: 30px; font-weight:bold; font-size: 16pt;' type='text' size='1' maxlength='3' name='2' value='2' tabindex='1' /></td>";
echo "        <td><input style='border:0; text-align:center; width: 30px; font-weight:bold; font-size: 16pt;' type='text' size='1' maxlength='3' name='3' value='3' tabindex='1' /></td>";
echo "        <td><input style='border:0; text-align:center; width: 30px; font-weight:bold; font-size: 16pt;' type='text' size='1' maxlength='3' name='4' value='4' tabindex='1' /></td>";
echo "        <td><input style='border:0; text-align:center; width: 30px; font-weight:bold; font-size: 16pt;' type='text' size='1' maxlength='3' name='Ае' value='Ае' tabindex='1' /></td>";
echo "    </tr>";
}
echo "    <tr>";
echo "        <td style='border:0; text-align:center; width: 30px; font-weight:bold; font-size: 16pt;' width=15>" . $row['round'] ."</td>";
echo "        <td><input style='text-align:center; width: 30px;' type='text' size='1' maxlength='3' name='V[]' value='" .  $row['V'] ."' tabindex='1' /></td>";
echo "        <td><input style='text-align:center; width: 30px;' type='text' size='1' maxlength='3' name='CH[]' value='" .  $row['CH'] ."' tabindex='1' /></td>";
echo "        <td><input style='text-align:center; width: 30px;' type='text' size='1' maxlength='3' name='M[]' value='" .  $row['M'] ."' tabindex='1' /></td>";
echo "        <td><input style='text-align:center; width: 30px;' type='text' size='1' maxlength='3' name='D[]' value='" .  $row['D'] ."' tabindex='1' /></td>";
echo "        <td><input style='text-align:center; width: 30px;' type='text' size='1' maxlength='3' name='K[]' value='" .  $row['K'] ."' tabindex='1' /></td>";
echo "        <td><input style='text-align:center; width: 30px;' type='text' size='1' maxlength='3' name='DP[]' value='" .  $row['DP'] ."' tabindex='1' /></td>";
echo "        <td><input style='text-align:center; width: 30px;' type='text' size='1' maxlength='3' name='E[]' value='" .  $row['E'] ."' tabindex='1' /></td>";
echo "        <td><input style='text-align:center; width: 30px;' type='text' size='1' maxlength='3' name='p1[]' value='" .  $row['p1'] ."' tabindex='1' /></td>";
echo "        <td><input style='text-align:center; width: 30px;' type='text' size='1' maxlength='3' name='p2[]' value='" .  $row['p2'] ."' tabindex='1' /></td>";
echo "        <td><input style='text-align:center; width: 30px;' type='text' size='1' maxlength='3' name='p3[]' value='" .  $row['p3'] ."' tabindex='1' /></td>";
echo "        <td><input style='text-align:center; width: 30px;' type='text' size='1' maxlength='3' name='p4[]' value='" .  $row['p4'] ."' tabindex='1' /></td>";
echo "        <td><input style='text-align:center; width: 30px;' type='text' size='1' maxlength='3' name='AE[]' value='" .  $row['AE'] ."' tabindex='1' /></td>";
echo "    </tr>";	
};
echo "</table>";
};
echo "</form>";
?>
