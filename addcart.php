<?php
session_start();
$ses_id = $_SESSION['user'];

$host="localhost"; // Хост
$user="sbk"; // юзер mysql
$pwd="19061995"; // пароль юзера
$db=mysql_connect($host,$user,$pwd); // инит конекта
mysql_select_db("ivensart",$db); // имя базы


$id = $_POST['newsid'];


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
echo "DUBLIKAT";
}
else{
if($news_id == 0){
mysql_query($result);
}
else{
$id2 = $news_id . "," . $id;
$result2 = "UPDATE cart SET news_id='$id2' WHERE session='$ses_id'";
mysql_query($result2);
echo "DOBAVLENO";
}
}




?>