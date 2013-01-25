<?php
@error_reporting ( E_ALL ^ E_WARNING ^ E_NOTICE );
@ini_set ( 'display_errors', true );
@ini_set ( 'html_errors', false );
@ini_set ( 'error_reporting', E_ALL ^ E_WARNING ^ E_NOTICE );

@session_start();

define( 'DATALIFEENGINE', true );
define( 'ROOT_DIR', '../..' );
define( 'ENGINE_DIR', '..' );

include ENGINE_DIR . '/data/config.php';
require_once ENGINE_DIR . '/classes/mysql.php';
require_once ENGINE_DIR . '/data/dbconfig.php';
require_once ENGINE_DIR . '/modules/functions.php';
require_once ENGINE_DIR . '/classes/parse.class.php';
include_once ROOT_DIR . '/language/' . $config['langs'] . '/website.lng';

$action = $_REQUEST['action'];
@header( "Content-type: text/html; charset=UTF-8" );

switch ( $action ) {
	case 'authorization' :
		$login = $db->safesql( iconv( 'utf-8', 'windows-1251', trim( urldecode( $_REQUEST['login'] ) ) ) );
		$password = iconv( 'utf-8', 'windows-1251', trim( urldecode( $_REQUEST['password'] ) ) );
		$passhash = md5( md5( $password ) );
		
		$row = $db->super_query( "SELECT user_id FROM " . PREFIX . "_users WHERE name = '$login' AND password = '$passhash' AND user_group = '1'" );
		if ( $row['user_id'] > 0 ) echo 'success';
		else echo 'error';
		break;
	case 'movieGet' :
		$id = intval( $_REQUEST['id'] );
		$row = $db->super_query( "SELECT id, autor, date, title, filename FROM " . PREFIX . "_post WHERE id = '$id'" );
		if ( $id < 1 ) echo 'error';
		else {
			foreach ( $row as &$str ) $str = iconv( 'windows-1251', 'utf-8', $str );
			$nextsql = $db->super_query( "SELECT id FROM " . PREFIX . "_post WHERE id < '$id' ORDER BY id DESC LIMIT 1" );
			$prevsql = $db->super_query( "SELECT id FROM " . PREFIX . "_post WHERE id > '$id' ORDER BY id ASC LIMIT 1" );
			$nextid = $nextsql['id'] > 0 ? $nextsql['id'] : 0;
			$previd = $prevsql['id'] > 0 ? $prevsql['id'] : 0;
			echo $id . '|' . stripslashes( $row['autor'] ) . '|' . $row['date'] . '|' . stripslashes( $row['title'] ) . '|' . ( empty( $row['filename'] ) ? 'none-file' : stripslashes( $row['filename'] ) ) . '|' . $previd . '|' . $nextid;
		}
		break;
	case 'movieGetLast' :
		$row = $db->super_query( "SELECT id, autor, date, title, filename FROM " . PREFIX . "_post ORDER BY id DESC LIMIT 1" );
		if ( $row['id'] < 1 ) echo 'error';
		else {
			$id = $row['id'];
			foreach ( $row as &$str ) $str = iconv( 'windows-1251', 'utf-8', $str );
			$nextsql = $db->super_query( "SELECT id FROM " . PREFIX . "_post WHERE id < '$id' ORDER BY id DESC LIMIT 1" );
			$nextid = $nextsql['id'] > 0 ? $nextsql['id'] : 0;
			echo $id . '|' . stripslashes( $row['autor'] ) . '|' . $row['date'] . '|' . stripslashes( $row['title'] ) . '|' . ( empty( $row['filename'] ) ? 'none-file' : stripslashes( $row['filename'] ) ) . '|' . '0' . '|' . $nextid;
		}
		break;
	case 'fileSet' :
		$id = intval( $_REQUEST['id'] );
		if ( $id > 0 ) {
			$file = $db->safesql( iconv( 'utf-8', 'windows-1251', trim( urldecode( $_REQUEST['file'] ) ) ) );
			$db->query( "UPDATE " . PREFIX . "_post SET filename = '$file' WHERE id = '$id'" );
			$full = @file( './moviex/notprocessed.dat' );
			if ( is_array( $full ) and count( $full ) > 0 ) {
				$_i = false;
				foreach ( $full as $i => &$str ) {
					$str = trim( $str );
					if ( $str == $file ) $_i = $i;
				}
				if ( $_i !== false ) unset( $full[$_i] );
				$implode = trim( implode( "\n", $full ) );
				if ( empty( $implode ) or $implode == "\n" ) $implode = '';
				else $implode .= "\n";
				$fopen = @fopen( './moviex/notprocessed.dat', 'w+' );
				@fwrite( $fopen, $implode );
				@fclose( $fopen );
			}
			$fopen = @fopen( './moviex/processed.dat', 'a+' );
			@fwrite( $fopen, $file . "\n" );
			@fclose( $fopen );
			echo 'success';
		} else echo 'error';
		break;
	case 'search' :
		$parse = new ParseFilter( );
		$year = intval( $_REQUEST['year'] ) == 1 ? true : false;
		$string = $db->safesql( $parse->process( iconv( 'utf-8', 'windows-1251', trim( urldecode( $_REQUEST['string'] ) ) ) ) );
		if ( ! empty( $string ) ) $db->query( "SELECT id, title, title_eng, SUBSTRING_INDEX( SUBSTRING_INDEX( xfields, 'year|', -1 ) , '||', 1 ) AS year FROM " . PREFIX . "_post WHERE title REGEXP '$string' /*AND filename = ''*/ or title_eng REGEXP '$string' /*AND filename = ''*/ LIMIT 100" );
		if ( $db->num_rows( ) < 1 or empty( $string ) ) echo 'not-found';
		else {
			$result = '';
			while ( $row = $db->get_row( ) ) {
			    $t = $row['title'] . " / " . $row['title_eng'] . " (" .$row['year'] . ")";
				if ( ! $year ) $result .= $row['id'] . ';' . stripslashes( str_replace( ';', '.', $t  ) ) . '|';
				else $result .= $row['id'] . ';' . stripslashes( str_replace( ';', '.', $row['title'] ) . ' (' . $row['year'] . ')' ) . '|';
			}
			$result = iconv_substr( $result, 0, iconv_strlen( $result, 'windows-1251' ) - 1, 'windows-1251' );
			echo iconv( 'windows-1251', 'utf-8', $result );
		}
		break;
	default:
		echo 'error';
}
?>