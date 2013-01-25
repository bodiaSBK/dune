<?php
session_start();
$ses_id = $_SESSION['user'];

$host="localhost"; // Хост
$user="sbk"; // юзер mysql
$pwd="19061995"; // пароль юзера
$db=mysql_connect($host,$user,$pwd); // инит конекта
mysql_select_db("ivensart",$db); // имя базы

$result = mysql_query("SELECT * FROM cart WHERE session = '$ses_id' ") or die("Запрос не выполнен");
$row = mysql_fetch_assoc($result);
$arr = explode(",",$row['news_id']);

if(isset($_POST['clearplaylist'])){
$sql = "UPDATE cart SET news_id='0' WHERE session = '$ses_id' ";
$result = mysql_query($sql);
}

if(isset($_POST['shuffleplaylist'])){
$pieces = explode(",", $row['news_id']);
shuffle($pieces);
$string = implode(",", $pieces);
$sql = "UPDATE cart SET news_id='$string' WHERE session = '$ses_id' ";
$result = mysql_query($sql);
}

if(isset($_POST['iptv'])){
$_SESSION['iptv'] = $_POST['iptv'];
}

print <<<END

<script>
function clearPlayllist(id){ 
	$.post(
  "/cart.php",
  {
    clearplaylist: id,
  },
  onAjaxSuccess
);

function onAjaxSuccess(data)
{
location.replace("/cart.html");
}
 }

function shufflePlayllist(id){ 
	$.post(
  "/cart.php",
  {
    shuffleplaylist: id,
  },
  onAjaxSuccess
);

function onAjaxSuccess(data)
{
location.replace("/cart.html");
}
 } 
 
$(function(){
		$("div.playPlaylist").live("click",function()
		{
			var elem = $(this);
			if(!elem.hasClass("proccess"))
			{
				elem.addClass( 'proccess' );
				$.get( "/engine/ajax/showtvplaylist.php", 
					{ 'ses': $(this).attr("ses"), 'addr': $(this).attr("ip") }, 
					function( response ) {
						setTimeout(function() {
						    elem.removeClass( 'proccess' );
						}, 5000);
		    		});
			}
		});
	});
	

 
</script>

END;
echo "<div class='clearPlayllist' onclick='clearPlayllist(" . $ses_id . ")'> Очистить плейлист </div> ";
echo "<div class='playPlaylist' ip='192.168.1.100' ses=" . $ses_id . ">Первый</div> ";
echo "<div class='playPlaylist' ip='192.168.1.101' ses=" . $ses_id . ">Второй</div> ";
echo "<div class='playPlaylist' ip='192.168.1.102' ses=" . $ses_id . ">Третий</div> ";
echo "<div class='playPlaylist' ip='192.168.1.103' ses=" . $ses_id . ">Четвертый</div> ";
echo "<div class='playPlaylist' ip='192.168.1.104' ses=" . $ses_id . ">Пятый</div> ";
echo "<div class='clearPlayllist' onclick='shufflePlayllist(" . $ses_id . ")'>Перемешать</div> ";

echo "<div id='content'>";
echo "<table border=0> ";

for($i = 0; $i < count($arr) ;$i++){
$result = mysql_query("SELECT id, title, SUBSTRING_INDEX( SUBSTRING_INDEX( xfields, 'year|', -1 ) , '||', 1 ) AS year, SUBSTRING_INDEX( SUBSTRING_INDEX( xfields, 'image|', -1 ) , '||', 1 ) AS image FROM dle_post WHERE id = '$arr[$i]' ") or die("Запрос не выполнен");
$row = mysql_fetch_assoc($result);
if($i == 5 or $i == 10 or $i == 15 or $i == 20 or $i == 25 or $i == 30 or $i == 35){
echo "<tr>";
}
echo "<td width='183px' id=" . $row['id'] . ">";
echo "<div align='center'><img width='150px' src='" . $row['image'] . "' /></div>";
echo $row['title'];
}

echo "</td>";
if($i == 5 or $i == 10 or $i == 15 or $i == 20 or $i == 25 or $i == 30 or $i == 35){
echo "</tr>";
}
echo "</table>";
echo "</div>";
?>