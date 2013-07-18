<?php
$host="localhost";
$user="root";
$pwd="Ax3Mig";
$db=mysql_connect($host,$user,$pwd);
mysql_select_db("dune",$db);

$result = mysql_query("SELECT filename FROM dle_post") or die("Запрос не выполнен");



if (mysql_num_rows($result)>0) 
{
while ($row = mysql_fetch_assoc($result))
{

$sqlname=$row["filename"];
$sqlname = iconv( 'windows-1251', 'utf-8', trim( urldecode( $sqlname ) ) );

if ($sqlname != NULL){
echo "$sqlname \n";
}

}
}
?>