<?php
@error_reporting ( E_ALL ^ E_WARNING ^ E_NOTICE );
@ini_set ( 'display_errors', true );
@ini_set ( 'html_errors', false );
@ini_set ( 'error_reporting', E_ALL ^ E_WARNING ^ E_NOTICE );

@session_start( );

define( 'DATALIFEENGINE', true );
define( 'ROOT_DIR', substr( dirname(  __FILE__ ), 0, -12 ) );
define( 'ENGINE_DIR', ROOT_DIR . '/engine' );

include ENGINE_DIR . '/data/config.php';

if ( $config['http_home_url'] == '' ) {
	$config['http_home_url'] = explode( "engine/ajax/shortstory.php", $_SERVER['PHP_SELF'] );
	$config['http_home_url'] = reset( $config['http_home_url'] );
	$config['http_home_url'] = "http://" . $_SERVER['HTTP_HOST'] . $config['http_home_url'];
}

require_once ENGINE_DIR . '/classes/mysql.php';
require_once ENGINE_DIR . '/data/dbconfig.php';
require_once ENGINE_DIR . '/modules/functions.php';
require_once ENGINE_DIR . '/classes/templates.class.php';

$_REQUEST['skin'] = trim(totranslit($_REQUEST['skin'], false, false));

if( $_REQUEST['skin'] == "" OR !@is_dir( ROOT_DIR . '/templates/' . $_REQUEST['skin'] ) ) {
	die( "Hacking attempt!" );
}

$cat_info = get_vars ( "category" );

if (! is_array ( $cat_info )) {
	$cat_info = array ();
	
	$db->query ( "SELECT * FROM " . PREFIX . "_category ORDER BY posi ASC" );
	while ( $row = $db->get_row () ) {
		
		$cat_info[$row['id']] = array ();
		
		foreach ( $row as $key => $value ) {
			$cat_info[$row['id']][$key] = stripslashes ( $value );
		}
	
	}
	set_vars ( "category", $cat_info );
	$db->free ();
}

$user_group = get_vars( "usergroup" );

if( ! $user_group ) {
	$user_group = array ();
	
	$db->query( "SELECT * FROM " . USERPREFIX . "_usergroups ORDER BY id ASC" );
	
	while ( $row = $db->get_row() ) {
		
		$user_group[$row['id']] = array ();
		
		foreach ( $row as $key => $value ) {
			$user_group[$row['id']][$key] = stripslashes($value);
		}
	
	}
	set_vars( "usergroup", $user_group );
	$db->free();
}

//####################################################################################################################
//                    ����������� ���������� ������������� � IP
//####################################################################################################################
$banned_info = get_vars ( "banned" );
if (! is_array ( $banned_info )) {
	$banned_info = array ();
	$db->query ( "SELECT * FROM " . USERPREFIX . "_banned" );
	while ( $row = $db->get_row () ) {
		if ($row['users_id']) {
			$banned_info['users_id'][$row['users_id']] = array (
																'users_id' => $row['users_id'], 
																'descr' => stripslashes ( $row['descr'] ), 
																'date' => $row['date'] );
		} else {
			if (count ( explode ( ".", $row['ip'] ) ) == 4)
				$banned_info['ip'][$row['ip']] = array (
														'ip' => $row['ip'], 
														'descr' => stripslashes ( $row['descr'] ), 
														'date' => $row['date']
														);
			elseif (strpos ( $row['ip'], "@" ) !== false)
				$banned_info['email'][$row['ip']] = array (
															'email' => $row['ip'], 
															'descr' => stripslashes ( $row['descr'] ), 
															'date' => $row['date'] );
			else $banned_info['name'][$row['ip']] = array (
															'name' => $row['ip'], 
															'descr' => stripslashes ( $row['descr'] ), 
															'date' => $row['date'] );
		}
	}
	set_vars ( "banned", $banned_info );
	$db->free ();
}
if( $config["lang_" . $_REQUEST['skin']] ) {
	if ( file_exists( ROOT_DIR . '/language/' . $config["lang_" . $_REQUEST['skin']] . '/website.lng' ) ) {
		@include_once (ROOT_DIR . '/language/' . $config["lang_" . $_REQUEST['skin']] . '/website.lng');
	} else die("Language file not found");
} else {
	@include_once ROOT_DIR . '/language/' . $config['langs'] . '/website.lng';
}
$config['charset'] = ($lang['charset'] != '') ? $lang['charset'] : $config['charset'];
require_once ENGINE_DIR . '/modules/sitelogin.php';
if( ! $is_logged ) $member_id['user_group'] = 5;
if ( check_ip ( $banned_info['ip'] ) ) die("error");

$tpl = new dle_template( );
$tpl->dir = ROOT_DIR . '/templates/' . $_REQUEST['skin'];
define( 'TEMPLATE_DIR', $tpl->dir );

$newsid = intval( $_REQUEST['newsid'] );
$_TIME = time () + ($config['date_adjust'] * 60);

$sql_news = "SELECT id, autor, date, short_story, full_story, xfields, title, category, descr, keywords, alt_name, comm_num, allow_comm, allow_rate, fixed, rating, vote_num, news_read, approve, votes, access, flag, editdate, editor, reason, view_edit, tags, metatitle FROM " . PREFIX . "_post WHERE  id = '$newsid'";
include_once ENGINE_DIR . '/modules/show.full.php';

$tpl->result['content'] = str_replace( '{THEME}', $config['http_home_url'] . 'templates/' . $_REQUEST['skin'], $tpl->result['content'] );

@header( "Content-type: text/html; charset=" . $config['charset'] );
echo $tpl->result['content'];
?>