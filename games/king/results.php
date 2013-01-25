<?php


$host="localhost"; // Хост
$user="sbk"; // юзер mysql
$pwd="19061995"; // пароль юзера
$db=mysql_connect($host,$user,$pwd); // инит конекта
mysql_select_db("ivensart",$db); // имя базы
$result = mysql_query("SELECT * FROM games") or die("Запрос не выполнен");
for($i = 1;$i < 17;$i++){
$row=mysql_fetch_array($result);

if($row['round'] == 'K' and $i == 1){
$k1 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$kk1 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}

if($row['round'] == 'K' and $i == 5){
$k2 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$kk2 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}

if($row['round'] == 'K' and $i == 9){
$k3 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$kk3 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}

if($row['round'] == 'K' and $i == 13){
$k4 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$kk4 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}




if($row['round'] == 'Л' and $i == 2){
$l1 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$ll1 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}

if($row['round'] == 'Л' and $i == 6){
$l2 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$ll2 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}

if($row['round'] == 'Л' and $i == 10){
$l3 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$ll3 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}

if($row['round'] == 'Л' and $i == 14){
$l4 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$ll4 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}


if($row['round'] == 'A' and $i == 3){
$a1 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$aa1 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}

if($row['round'] == 'A' and $i == 7){
$a2 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$aa2 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}

if($row['round'] == 'A' and $i == 11){
$a3 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$aa3 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}

if($row['round'] == 'A' and $i == 15){
$a4 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$aa4 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}


if($row['round'] == 'C' and $i == 4){
$c1 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$cc1 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}

if($row['round'] == 'C' and $i == 8){
$c2 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$cc2 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}

if($row['round'] == 'C' and $i == 12){
$c3 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$cc3 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}

if($row['round'] == 'C' and $i == 16){
$c4 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$cc4 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}
}

$kkk1 = $k1 + $k2 + $k3 + $k4;
$kkk2 = $kk1 + $kk2 + $kk3 + $kk4;
$kkk3 = $kkk2 - $kkk1;

$lll1 = $l1 + $l2 + $l3 + $l4;
$lll2 = $ll1 + $ll2 + $ll3 + $ll4;
$lll3 = $lll2 - $lll1;

$aaa1 = $a1 + $a2 + $a3 + $a4;
$aaa2 = $aa1 + $aa2 + $aa3 + $aa4;
$aaa3 = $aaa2 - $aaa1;

$ccc1 = $c1 + $c2 + $c3 + $c4;
$ccc2 = $cc1 + $cc2 + $cc3 + $cc4;
$ccc3 = $ccc2 - $ccc1;

$sum1 = $kkk1 + $lll1 + $aaa1 + $ccc1;
$ost1 = $sum1 - $kkk1 - $lll1 - $aaa1 - $ccc1;

$sum2 = $kkk2 + $lll2 + $aaa2 + $ccc2;
$ost2 = $sum2 - $kkk2 - $lll2 - $aaa2 - $ccc2;

print <<<END
<table  cellpadding='0' cellspacing='0' border='1'  align='center' width='100%'>
<tr valign=top align=center>
<td width="50"></td>
<td width="34">Костя</td>
<td width="34">Ленка</td>
<td width="34">Антон</td>
<td width="34">Серж</td>
<td width="34">Ост</td>
<td width="34">Всего</td>
</tr>

<tr valign=top align=center>
<td width="50">Гора</td>
<td width="34">$kkk1</td>
<td width="34">$lll1</td>
<td width="34">$aaa1</td>
<td width="34">$ccc1</td>
<td width="34">$ost1</td>
<td width="34">$sum1</td>
</tr>

<tr valign=top align=center>
<td width="50">Пуля</td>
<td width="34">$kkk2</td>
<td width="34">$lll2</td>
<td width="34">$aaa2</td>
<td width="34">$ccc2</td>
<td width="34">$ost2</td>
<td width="34">$sum2</td>
</tr>

<tr valign=top align=center>
<td width="50">Сумма</td>
<td width="34">$kkk3</td>
<td width="34">$lll3</td>
<td width="34">$aaa3</td>
<td width="34">$ccc3</td>
<td width="34"></td>
<td width="34"></td>
</tr>
</table>
END;

echo "<br />";
echo "<br />";

print <<<END
<table  cellpadding='0' cellspacing='0' border='1'  align='center' width='100%'>
<tr valign=top align=center>
<td width="50" >Костя</td>
<td width="34">$k1</td>
<td width="34">$k2</td>
<td width="34">$k3</td>
<td width="34">$k4</td>
<td width="34">$kk1</td>
<td width="34">$kk2</td>
<td width="34">$kk3</td>
<td width="34">$kk4</td>
</tr>
<tr   valign=top align=center>
<td>Ленка</td>
<td>$l1</td>
<td>$l2</td>
<td>$l3</td>
<td>$l4</td>
<td>$ll1</td>
<td>$ll2</td>
<td>$ll3</td>
<td>$ll4</td>
</tr>
<tr   valign=top align=center>
<td>Антон</td>
<td>$a1</td>
<td>$a2</td>
<td>$a3</td>
<td>$a4</td>
<td>$aa1</td>
<td>$aa2</td>
<td>$aa3</td>
<td>$aa4</td>
</tr>
<tr   valign=top align=center>
<td>Серж</td>
<td>$c1</td>
<td>$c2</td>
<td>$c3</td>
<td>$c4</td>
<td>$cc1</td>
<td>$cc2</td>
<td>$cc3</td>
<td>$cc4</td>
</tr>
</table>
END;
echo "<br />";
echo "<img src='grap.php' />";
?>