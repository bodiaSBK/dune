<?php
$host="localhost";
$user="sbk";
$pwd="19061995";
$db=mysql_connect($host,$user,$pwd);
mysql_select_db("ivensart",$db);

$success = iconv('cp1251','utf-8',"<p align='center'><b>Текст страницы успешно обновлен!</b></p>");
$unsuccess = iconv('cp1251','utf-8',"<p align='center'><b>Текст страницы не обновлен!</b></p>");

if (count($_POST['id']) > 0) {

	// переприсваиваем переменные, являющиеся массивами
	$id = $_POST['id'];
	$V = $_POST['V'];
	$CH = $_POST['CH'];
	$M = $_POST['M'];
	$D = $_POST['D'];
	$K = $_POST['K'];
	$DP = $_POST['DP'];
	$E= $_POST['E'];
	$p1 = $_POST['p1'];
	$p2 = $_POST['p2'];
	$p3 = $_POST['p3'];
	$p4 = $_POST['p4'];
	$AE = $_POST['AE'];


    // выводим полученный результат
	for ($i=0;$i<count($id);$i++) {
		// производим действие над этим элементом
	
			// обновляем должность в БД
			//echo "UPDATE games SET V='".$V[$i]."', CH='".$CH[$i]."', M='".$M[$i]."', D='".$D[$i]."', K='".$K[$i]."', DP='".$DP[$i]."', E='".$E[$i]."', 1='".$p1[$i]."', 2='".$p2[$i]."', 3='".$p3[$i]."', 4='".$p4[$i]."', AE='".$AE[$i]."' WHERE id='".$id[$i]."'";
			//echo "<br />";
			$upd = mysql_query("UPDATE games SET V='".$V[$i]."', CH='".$CH[$i]."', M='".$M[$i]."', D='".$D[$i]."', K='".$K[$i]."', DP='".$DP[$i]."', E='".$E[$i]."', p1='".$p1[$i]."', p2='".$p2[$i]."', p3='".$p3[$i]."', p4='".$p4[$i]."', AE='".$AE[$i]."' WHERE id='".$id[$i]."'");
			// выводим информацию о процессе обновления 
			if ($upd){
			header("Location:/games/");
			}
			else echo 'Не обновлено!';
		
		
	} 
}
else echo 'Нет данных!';

?>
