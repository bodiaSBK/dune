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




if($i == 2){
$l1 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$ll1 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}

if($i == 6){
$l2 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$ll2 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}

if($i == 10){
$l3 = $row[3] + $row[4] + $row[5] + $row[6] + $row[7] + $row[8] + $row[9];
$ll3 = $row[10] + $row[11] + $row[12] + $row[13] + $row[14];
}

if($i == 14){
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


include ("../src/jpgraph.php");
include ("../src/jpgraph_bar.php");



$data1y=array($kkk1,$lll1,$aaa1,$ccc1);
$data2y=array($kkk2,$lll2,$aaa2,$ccc2);


// Create the graph. These two calls are always required
$graph = new Graph(275,480,'auto');
$graph->SetScale("textlin");



$graph->yaxis->SetTickPositions(array(0,50,100,150,200,250,300), array(25,75,125,175,225,275));
$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('K','L','A','S'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($data1y);
$b2plot = new BarPlot($data2y);

$graph->SetFrame(false);

// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1plot,$b2plot));
// ...and add it to the graPH
$graph->Add($gbplot);


$graph->xaxis->SetFont(FF_VERDANA,FS_BOLD,14);
$graph->yaxis->SetFont(FF_VERDANA,FS_BOLD,12);


$b1plot->SetColor("white");
$b1plot->SetFillColor("#1760a5");

$b2plot->SetColor("white");
$b2plot->SetFillColor("#b82723");



// Display the graph

$graph->Stroke();


?>
