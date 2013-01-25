<?php 
$random = rand(); // ссесия юзера

$host="localhost"; // Хост
$user="sbk"; // юзер mysql
$pwd="19061995"; // пароль юзера
$db=mysql_connect($host,$user,$pwd); // инит конекта
mysql_select_db("ivensart",$db); // имя базы
$result = "INSERT INTO cart(session, news_id, sort) VALUES ($random, '0', '0')";


if($_SESSION['user'] == NULL){
$_SESSION['user'] = $random;
mysql_query($result);
}
else{
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
{headers}
<link rel="shortcut icon" href="{THEME}/images/favicon.ico" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<link media="screen" href="{THEME}/style/styles.css" type="text/css" rel="stylesheet" />
<link media="screen" href="{THEME}/style/engine.css" type="text/css" rel="stylesheet" />
<link media="screen" href="{THEME}/colorbox/colorbox.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{THEME}/colorbox/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="{THEME}/js/all.js"></script>
</head>
<body>
{AJAX}
<div id='cart'></div>

<div id="wrapper">
	<div class="head">
    	<div class="logo">
        	<a href="/"><img src="{THEME}/i/logo.png" /></a>
        </div>
        <div class="middle_block">
		    <a href="/cart.html"><img src="{THEME}/i/alco.png" /></a>
			<a href="/advanced.html"><img src="{THEME}/i/fish.png" /></a>
			
		</div>
		<div class="right_block">
        	
            
                <form class="form-wrapper" method="post" action=''>
                <input type="hidden" name="do" value="search" />
                <input type="hidden" name="subaction" value="search" />
                <input name="story" type="text" id="search" value="Поиск..." onblur="if(this.value=='') this.value='Поиск...';" onfocus="if(this.value=='Поиск...') this.value='';">
                <input title="Найти" id="submit" value="" type="submit" />
				
				<!--<li><input class="h_search_inp" id="story" name="story" value="Поиск..." onblur="if(this.value=='') this.value='Поиск...';" onfocus="if(this.value=='Поиск...') this.value='';" type="text" /><div style=display:none><a href=http://8dle.ru/free-templates/>Скачать шаблоны</a></div></li>-->
                <!--<li><input title="Найти" class="h_search_bottom" value="Найти" type="submit" /></li>-->
            
                </form>
       

	   </div>
	 
</div>   
	 
    </div>
  <div class="menu">
	 <a href="/films/"><img src="{THEME}/i/films[category=29].this[/category].png" /></a>
	 <a href="/mult/"><img src="{THEME}/i/mults[category=27].this[/category].png" /></a>
	 <a href="/serial/"><img src="{THEME}/i/serials[category=28].this[/category].png" /></a>
	 <a href="/videos/"><img src="{THEME}/i/videos[category=30].this[/category].png" /></a>
	 <a href="/clips/"><img src="{THEME}/i/clips[category=31].this[/category].png" /></a>
	 </div>

    <div class="wrapper">
    	<div class="wrapper-top">
			<!-- div class="sort-all" align="center">		   
                     [ sort ]<div class="sortn dpad" style="padding-top:15px"><div class="sortn">{ sort }</div></div>[/ sort ]		   
			</div-->
		
			[not-aviable=static]
			<div style="padding:20px 0 0 25px;" class="lettersbar">
					<!--<a href="/catalog/%C0">А</a>
				<a href="/catalog/%C1">Б</a>
				<a href="/catalog/%C2">В</a>
				<a href="/catalog/%C3">Г</a>
				<a href="/catalog/%C4">Д</a>
				<a href="/catalog/%C5">Е</a>
				<a href="/catalog/%C6">Ж</a>
				<a href="/catalog/%C7">З</a>
				<a href="/catalog/%C8">И</a>
				<a href="/catalog/%CA">К</a>
				<a href="/catalog/%CB">Л</a>
				<a href="/catalog/%CC">М</a>
				<a href="/catalog/%CD">Н</a>
				<a href="/catalog/%CE">О</a>
				<a href="/catalog/%CF">П</a>
				<a href="/catalog/%D0">Р</a>
				<a href="/catalog/%D1">С</a>
				<a href="/catalog/%D2">Т</a>
				<a href="/catalog/%D3">У</a>
				<a href="/catalog/%D4">Ф</a>
				<a href="/catalog/%D5">Х</a>
				<a href="/catalog/%D6">Ц</a>
				<a href="/catalog/%D7">Ч</a>
				<a href="/catalog/%D8">Ш</a>
				<a href="/catalog/%D9">Щ</a>
				<a href="/catalog/%DD">Э</a>
				<a href="/catalog/%DE">Ю</a>
				<a href="/catalog/%DF">Я</a>
				&nbsp;|&nbsp;
				<a href="/catalog/A">A</a>
				<a href="/catalog/B">B</a>
				<a href="/catalog/C">C</a>
				<a href="/catalog/D">D</a>
				<a href="/catalog/E">E</a>
				<a href="/catalog/F">F</a>
				<a href="/catalog/G">G</a>
				<a href="/catalog/H">H</a>
				<a href="/catalog/I">I</a>
				<a href="/catalog/J">J</a>
				<a href="/catalog/K">K</a>
				<a href="/catalog/L">L</a>
				<a href="/catalog/M">M</a>
				<a href="/catalog/N">N</a>
				<a href="/catalog/O">O</a>
				<a href="/catalog/P">P</a>
				<a href="/catalog/Q">Q</a>
				<a href="/catalog/R">R</a>
				<a href="/catalog/S">S</a>
				<a href="/catalog/T">T</a>
				<a href="/catalog/U">U</a>
				<a href="/catalog/V">V</a>
				<a href="/catalog/W">W</a>
				<a href="/catalog/X">X</a>
				<a href="/catalog/Y">Y</a>
				<a href="/catalog/Z">Z</a>
				&nbsp;|&nbsp;
				<a href="/catalog/1">1</a>
				<a href="/catalog/2">2</a>
				<a href="/catalog/3">3</a>
				<a href="/catalog/4">4</a>
				<a href="/catalog/5">5</a>
				<a href="/catalog/6">6</a>
				<a href="/catalog/7">7</a>
				<a href="/catalog/8">8</a>
				<a href="/catalog/9">9</a>
				<a href="/catalog/0">0</a>	-->
			</div>
			[/not-aviable]
			[aviable=main|cat|search|favorites|newposts|catalog]
			<div class="view" align="right" style="padding:0 25px 0 0;margin-top:-10px">
				<script type="text/javascript">var varids = '{var-ids}';</script>
				<a href="#" onclick="DleShortstorySet('#dle-content',1,varids);return false;"><img src="{THEME}/i/view-1.png" /></a>
				<a href="#" onclick="DleShortstorySet('#dle-content',2,varids);return false;"><img src="{THEME}/i/view-2.png" /></a>
				<a href="#" onclick="DleShortstorySet('#dle-content',0,varids);return false;"><img src="{THEME}/i/view-3.png" /></a>
			</div>
			[/aviable]
		</div>
<div class="wrapper-middle">
<div class="wrapper-ewe">
 {info}
 {content}
 <div class="clr"></div>
 </div>
 </div>         

            
<div class="wrapper-bottom">
<br />
<div align="center"><a href="/system.html">Системные инструменты</a></div> 
</div>
        
    </div>
 
</div>
</body>
</html>