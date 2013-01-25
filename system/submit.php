<?php
$host="localhost";
$user="sbk";
$pwd="19061995";
$db=mysql_connect($host,$user,$pwd);
mysql_select_db("ivensart",$db);
$success = iconv('cp1251','utf-8',"<p align='center'><b>Текст страницы успешно обновлен!</b></p>");
$unsuccess = iconv('cp1251','utf-8',"<p align='center'><b>Текст страницы не обновлен!</b></p>");



if (isset($_POST['id']))
    {
    $id = iconv('utf-8','cp1251',$_POST['id']);
    $title = iconv('utf-8','cp1251',$_POST['title']);
    $year = iconv('utf-8','cp1251',$_POST['year']);
    $filename = iconv('utf-8','cp1251',$_POST['filename']);
    $checkbox = iconv('utf-8','cp1251',$_POST['checkbox']);
    $screen2 = iconv('utf-8','cp1251',$_POST['screen2']);
    $image = iconv('utf-8','cp1251',$_POST['image']);
	
	
$result = mysql_query("SELECT id, title, filename, checkbox, xfields, SUBSTRING_INDEX( SUBSTRING_INDEX( xfields, 'year|', -1 ) , '||', 1 ) AS year, SUBSTRING_INDEX( SUBSTRING_INDEX( xfields, 'screen2|', -1 ) , '||', 1 ) AS screen2, SUBSTRING_INDEX( SUBSTRING_INDEX( xfields, 'image|', -1 ) , '||', 1 ) AS image FROM dle_post WHERE id = '$id'") or die("Запрос не выполнен");
$row = mysql_fetch_assoc($result);

$year_row = $row['year'];
$screen2_row = $row['screen2'];
$image_row = $row['image'];
 
	$data = $row['xfields']; 
	
    $new_year = $year;
    $old_year = $year_row;
    $data = str_replace($old_year, $new_year, $data);
	
	$new_screen2 = $screen2;
    $old_screen2 = $screen2_row;
    $data = str_replace($old_screen2, $new_screen2, $data);
 
    $new_image = $image;
    $old_image = $image_row;
    $data = str_replace($old_image, $new_image, $data);

	//проверка чекбокса
	
	if (strlen($checkbox)> 0) {
	$checkb = 1;
	}
	else {
	$checkb = 0;
	}
	
    $sql = "UPDATE dle_post SET title='$title', filename='$filename', xfields='$data', checkbox='$checkb' WHERE id = '$id'";
    $result = mysql_query($sql);
    if ($result) echo $success;
    else echo $unsuccess;
	}

?>
