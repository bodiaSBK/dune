<?php
$host="localhost";
$user="sbk";
$pwd="19061995";
$db=mysql_connect($host,$user,$pwd);
mysql_select_db("ivensart",$db);

$result = mysql_query("SELECT filename FROM dle_post") or die("������ �� ��������");



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