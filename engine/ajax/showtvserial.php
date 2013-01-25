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

$url = 'http://' .  $addr . '/cgi-bin/do?cmd=start_file_playback&media_url=http://i.vensart.com/engine/ajax/showtvplaylist_gen.php?ses=' . $ses_id . '&addr=' . $addr;
var_dump($url); //это конечный урл который будет на выходе уже после всех обработок
if ( @file_get_contents( $url ) ) echo 'Success';

//if ( @file_get_contents( 'http://' . $addr . '/cgi-bin/do?cmd=start_file_playback&media_url=' . str_replace( '{tv-addr}', $addr, $config['moviex_path'] ) . stripslashes( $row['filename'] ) ) ) echo 'Success';
//else echo 'Error';
?>