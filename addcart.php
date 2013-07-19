<?php
session_start();
$ses_id = $_SESSION['user']; // Переменная с сессией
$id = $_POST['newsid']; // Переменная с ID новости

include 'connect.php'; // настройки и соединение с базой

print_r("Session: $ses_id\nYou add: $id (film id)\n");

$exec = mysql_query("SELECT * FROM cart WHERE session='$ses_id'") or die(mysql_error()); 
if (mysql_num_rows($exec) <= 0) { 
	mysql_query("INSERT INTO cart (id, news_id, sort, session) VALUES ('','$id','','$ses_id')") or die(mysql_error());	
	echo "New session add to database\n";
} 


$qop = mysql_query("SELECT * FROM cart WHERE session='$ses_id'") or die("Запрос не выполнен");
$row = mysql_fetch_assoc($qop);

$news_id = $row['news_id'];
$arr = explode(",",$news_id);

for($i = 0; $i < count($arr) ;$i++)
{
if($id == $arr[$i]){
$dubl = '1';
}
}


$result = "UPDATE cart SET news_id='$id' WHERE session='$ses_id'";
if($dubl == 1){
echo "unsuccessful(copy)";
}
else{
if($news_id == 0){
mysql_query($result);
}
else{
$id2 = $news_id . "," . $id;
$result2 = "UPDATE cart SET news_id='$id2' WHERE session='$ses_id'";
mysql_query($result2);
echo "Successful";
}
}




?>