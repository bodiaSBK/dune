<?php 
include('connect.php'); 
$result = mysql_query("SELECT * FROM game_pref WHERE player = 'first'") or die("Error #1");
$row = mysql_fetch_assoc($result);				
$arr = explode(",",$row['values']);
$B2 = $arr['0'];
$B3 = $arr['1'];
$B5 = $arr['2'];
$B6 = $arr['3'];
$B7 = $arr['4'];

$result = mysql_query("SELECT * FROM game_pref WHERE player = 'second'") or die("Error #1");
$row = mysql_fetch_assoc($result);				
$arr = explode(",",$row['values']);
$E2 = $arr['0'];
$E3 = $arr['1'];
$E5 = $arr['2'];
$E6 = $arr['3'];
$E7 = $arr['4'];

$result = mysql_query("SELECT * FROM game_pref WHERE player = 'third'") or die("Error #1");
$row = mysql_fetch_assoc($result);				
$arr = explode(",",$row['values']);
$H2 = $arr['0'];
$H3 = $arr['1'];
$H5 = $arr['2'];
$H6 = $arr['3'];
$H7 = $arr['4'];

$result = mysql_query("SELECT * FROM game_pref WHERE player = 'fourth'") or die("Error #1");
$row = mysql_fetch_assoc($result);				
$arr = explode(",",$row['values']);
$K2 = $arr['0'];
$K3 = $arr['1'];
$K5 = $arr['2'];
$K6 = $arr['3'];
$K7 = $arr['4'];

?>






