<?php
header('Refresh: 30; url=' .$_SERVER['PHP_SELF']); 

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

$random = rand();
$graph = "<div align='center'><img src='grap.php?random=". $random . "' /></div>";
//$main = include('now.php');

print <<<END

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="ru"> 
<head> 
<title>Отменить кэширование картинки браузером</title> 
<meta name="title" content="Отменить кэширование картинки браузером" /> 
<meta http-equiv="content-type" content="text/html; charset=cp1251" />
</head>
<body>

<br /><br />


<table  cellpadding='0' cellspacing='0' border='1'  align='center' width='100%'>
<tr valign=top align=center>
<td width="50"></td>
<td width="34" style="font-size: 30px;"><b>Костя</b></td>
<td width="34" style="font-size: 30px;"><b>Ленка</b></td>
<td width="34" style="font-size: 30px;"><b>Антон</b></td>
<td width="34" style="font-size: 30px;"><b>Серж</b></td>
<td width="34" style="font-size: 30px;"><b>Ост</b></td>
<td width="34" style="font-size: 30px;"><b>Всего</b></td>
</tr>

<tr valign=top align=center>
<td width="50" style="font-size: 30px;"><b>Гора</b></td>
<td width="34" style="font-size: 30px;">$kkk1</td>
<td width="34" style="font-size: 30px;">$lll1</td>
<td width="34" style="font-size: 30px;">$aaa1</td>
<td width="34" style="font-size: 30px;">$ccc1</td>
<td width="34" style="font-size: 30px;">$ost1</td>
<td width="34" style="font-size: 30px;">$sum1</td>
</tr>

<tr valign=top align=center>
<td width="50" style="font-size: 30px;"><b>Пуля</b></td>
<td width="34" style="font-size: 30px;">$kkk2</td>
<td width="34" style="font-size: 30px;">$lll2</td>
<td width="34" style="font-size: 30px;">$aaa2</td>
<td width="34" style="font-size: 30px;">$ccc2</td>
<td width="34" style="font-size: 30px;">$ost2</td>
<td width="34" style="font-size: 30px;">$sum2</td>
</tr>

<tr valign=top align=center>
<td width="50" style="font-size: 30px;"><b>Сумма</b></td>
<td width="34" style="font-size: 30px;">$kkk3</td>
<td width="34" style="font-size: 30px;">$lll3</td>
<td width="34" style="font-size: 30px;">$aaa3</td>
<td width="34" style="font-size: 30px;">$ccc3</td>
<td width="34"></td>
<td width="34"></td>
</tr>
</table>
END;

print <<<END

<table valign=top>

<tr  valign="top">
<td>
END;
include('now_first.php');
print <<<END
</td>
<td>
END;
include('now_second.php');
print <<<END
</td>
<td>
$graph
</td>

</tr>

</table>

END;











echo "</body>";
echo "</html>";
?>