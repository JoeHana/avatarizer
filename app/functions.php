<?php

/**
 *	**************************************************
 *
 *	File Name:			functions.php
 *	Description:		general functions for the application
 *
 *	@since 1.0.0
 *
 *	**************************************************
 */

//function avatarizer_authentication_cookie() {
//	
//	if ( isset( $_GET['skylord'] ) && $_GET['skylord'] == TRUE ) {
//		setcookie( 'avatarizer', sha256( 'PRO' . $_SERVER['REMOTE_ADDR'] ), NULL, '/', '.' . str_ireplace( 'www.', '', $_SERVER['SERVER_NAME'] ) ); 
//	} elseif ( isset( $_GET['pro'] ) && $_GET['pro'] == 'skylord' ) {
//		setcookie( 'avatarizer', sha256( 'SKYLORD' . $_SERVER['REMOTE_ADDR'] ), NULL, '/', '.' . str_ireplace( 'www.', '', $_SERVER['SERVER_NAME'] ) ); 
//	} else {
//		setcookie( 'avatarizer', sha256( 'BASIC' . $_SERVER['REMOTE_ADDR'] ), NULL, '/', '.' . str_ireplace( 'www.', '', $_SERVER['SERVER_NAME'] ) ); 
//	}
//	
//}

//avatarizer_authentication_cookie();


//function avatarizer_is_authenticated() {
//	
//	if ( isset( $_COOKIE['avatarizer'] ) )
//		var_dump( $_COOKIE['avatarizer'] );
//	
//}

//avatarizer_is_authenticated();

function avatarizer_info( $data = '' ) {
	
	if( $data == 'name' ) {
		$data = APP_TITLE;
	} elseif( $data == 'version' ) {
		$data = APP_VERSION;
	} elseif( $data == 'url' ) {
		$data = APP_BASE_URL;
	} else {
		$data = '';
	}
	
	return $data;
	
}

//function sha256( $str ) {
//	//global $salt;
//	return hash( 'SHA256', $str . SALT );
//}