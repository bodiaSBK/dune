<?php
@error_reporting ( E_ALL ^ E_WARNING ^ E_NOTICE );
@ini_set ( 'display_errors', true );
@ini_set ( 'html_errors', false );
@ini_set ( 'error_reporting', E_ALL ^ E_WARNING ^ E_NOTICE );

@session_start( );

define( 'DATALIFEENGINE', true );
define( 'ROOT_DIR', '../..' );
define( 'ENGINE_DIR', '..' );

include ENGINE_DIR . '/data/config.php';
require_once ENGINE_DIR . '/classes/mysql.php';
require_once ENGINE_DIR . '/data/dbconfig.php';
require_once ENGINE_DIR . '/data/cat_dirs.php';
require_once ENGINE_DIR . '/modules/functions.php';


$newsid = ( $_REQUEST['newsid'] > 0 ) ? intval( $_REQUEST['newsid'] ) : 0;
$addr = ( substr_count( $_REQUEST['addr'], '.' ) == 3 ) ? trim( $_REQUEST['addr'] ) : '-1';
if ( $newsid < 1 ) die( 'Error #1' );
if ( $addr == '-1' ) die( 'Error #2' );

$row = $db->super_query( "SELECT id, filename, category FROM " . PREFIX . "_post WHERE id = '$newsid'" );
if ( $row['id'] < 1 ) die( 'Error #3' );

if ( $config['allow_read_count'] == "yes" ) {
	if ( $config['cache_count'] ) $db->query( "INSERT INTO " . PREFIX . "_views (news_id) VALUES ('{$newsid}')" );
	else $db->query( "UPDATE " . PREFIX . "_post set news_read=news_read+1 where id='{$newsid}'" );
}

$pattern = "/\\b(" . implode("|", $cats_get) . ")\\b/si";
if(preg_match($pattern, $row[category], $matches))
{
	$cat = $matches[1];
	$url = $cat_dirs[$cat];

}
else
	$url = $config['moviex_path'];


$url = str_replace( '{tv-addr}', $addr, $url );




$url = 'http://' . $addr . '/cgi-bin/do?cmd=start_file_playback&media_url=' . $url . stripslashes( mb_convert_encoding($row['filename'], "utf8", "windows-1251"));
$url = str_replace(' ', '%20', $url);
var_dump($url); //это конечный урл который будет на выходе уже после всех обработок

if ( @file_get_contents( $url ) ) echo 'Success';

//if ( @file_get_contents( 'http://' . $addr . '/cgi-bin/do?cmd=start_file_playback&media_url=' . str_replace( '{tv-addr}', $addr, $config['moviex_path'] ) . stripslashes( $row['filename'] ) ) ) echo 'Success';
else echo 'Error';
?>