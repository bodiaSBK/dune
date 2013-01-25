<?php
@error_reporting ( E_ALL ^ E_WARNING ^ E_NOTICE );
@ini_set ( 'display_errors', true );
@ini_set ( 'html_errors', false );
@ini_set ( 'error_reporting', E_ALL ^ E_WARNING ^ E_NOTICE );

define( 'DATALIFEENGINE', true );
define( 'ROOT_DIR', '../..' );
define( 'ENGINE_DIR', '..' );

include ENGINE_DIR . '/data/config.php';
require_once ENGINE_DIR . '/classes/mysql.php';
require_once ENGINE_DIR . '/data/dbconfig.php';
require_once ENGINE_DIR . '/data/cat_dirs.php';
require_once ENGINE_DIR . '/modules/functions.php';

$ses_id = ( $_REQUEST['ses'] > 0 ) ? intval( $_REQUEST['ses'] ) : 0;
$addr = ( substr_count( $_REQUEST['addr'], '.' ) == 3 ) ? trim( $_REQUEST['addr'] ) : '-1';
if ( $ses_id < 1 ) die( 'Error #1' );
if ( $addr == '-1' ) die( 'Error #2' );
$row = $db->super_query( "SELECT * FROM cart WHERE session = '$ses_id'" );

$filename = $ses_id.".m3u"; // название плейлиста при сохранении
$arr = explode(",",$row['news_id']);

if ( $row['id'] < 1 ) die( 'Error #3' );



$pattern = "/\\b(" . implode("|", $cats_get) . ")\\b/si";




header('Content-Disposition: attachment; filename='.$filename.'');
header('Content-Type: application/x-mpegurl; name='.$filename.'');
echo "#EXTM3U\n";

for($i = 0; $i < count($arr); $i++){
$row = $db->super_query( "SELECT id, filename, category, title FROM " . PREFIX . "_post WHERE id = '$arr[$i]'" );




if(preg_match("/\b28\b/i", $row['category'])){
//echo "Error #4";
}
else {
    echo "#EXTINF:0,";  
	if(preg_match($pattern, $row[category], $matches))
{
	$cat = $matches[1];
	$url = $cat_dirs[$cat];
}
    else
	 $url = $config['moviex_path'];


     $url = str_replace( '{tv-addr}', $addr, $url );	
     echo stripslashes( mb_convert_encoding($row['title'], "utf8", "windows-1251")) . "\r\n";
     echo $url . stripslashes( mb_convert_encoding($row['filename'], "utf8", "windows-1251")) . "\r\n";
}


}

?>