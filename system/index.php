<?php
include '../connect.php';

$result = mysql_query("SELECT id, title, filename, checkbox, SUBSTRING_INDEX( SUBSTRING_INDEX( xfields, 'year|', -1 ) , '||', 1 ) AS year, SUBSTRING_INDEX( SUBSTRING_INDEX( xfields, 'screen2|', -1 ) , '||', 1 ) AS screen2, SUBSTRING_INDEX( SUBSTRING_INDEX( xfields, 'image|', -1 ) , '||', 1 ) AS image FROM dle_post") or die("Запрос не выполнен");
$row = mysql_fetch_assoc($result);
?>

<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Отправка формы без перезагрузки страницы</title>
	<meta http-equiv="Content-Type" content="text/html; charset=cp-1251">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript">
	$('document').ready(function()
	{
		$('#form').ajaxForm( {
			target: '#preview', 
			success: function() { 
				$('#none').slideUp('fast'); 
			} 
		}); 
	});
    </script>
	

<body>

<?php
echo "<div id='preview'></div>";
echo "<br />";
while ($row = mysql_fetch_assoc($result))
{
if ($row['filename'] != "") 
{
echo "<div id='formbox'>"; 
echo "<form action='submit.php' name='form' id='form' method='post' style='margin: 0;'>";
echo "<input type='submit' value='UPDATE'>";
echo "<input type='hidden' name='id' value='" . $row['id'] . "' />";
if($row['checkbox'] == 1){echo "<input type='checkbox' name='checkbox' checked='checked' />";}
else                     {echo "<input type='checkbox' name='checkbox' />";}
if($row['checkbox'] == 1){echo "<input style='background: #24c424; border: 1px solid #CCCCCC;padding-left:3px;' type='text' size='50' maxlength='255' name='title' value='" . $row['title'] . "' tabindex='1' />";
                          } 
else                     {echo "<input style='border: 1px solid #CCCCCC;padding-left:3px;' type='text' size='50' maxlength='255' name='title' value='" . $row['title'] . "' tabindex='1' />";
                          }
echo "<a href='#'><img src='http://www.clker.com/cliparts/Y/x/X/j/U/f/search-button-without-text-md.png' height='15'/></a>";
echo "<input style='text-align:center' type='text' size='3' maxlength='20' name='year' value='" . $row['year'] . "' tabindex='1' />";	   			   
echo "<input type='text' size='40' maxlength='255' name='filename' value='" . $row['filename'] . "' tabindex='1' />";
echo "<input type='text' size='20' maxlength='200' name='image' value='" . $row['image'] . "' tabindex='1' />";
echo "<input type='text' size='25' maxlength='200' name='screen2' value='" . $row['screen2'] . "' tabindex='1' />";
echo "<input type='submit' value='UPDATE'>";
echo "</form>";		
echo "</div>";   			   
}
}



   
?>

</html>
</body>