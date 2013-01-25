<?php 
include('data.php'); 
include('formuls.php');
include('players.php');
print <<<END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="ru"> 
<head> 
<title>Отменить кэширование картинки браузером</title> 
<meta name="title" content="Отменить кэширование картинки браузером" /> 
<meta http-equiv="content-type" content="text/html; charset=cp1251" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
END;
include('form.php');
print <<<END
</body>
</html>
END;
?>






