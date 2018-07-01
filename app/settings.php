<?php

/**
 *	**************************************************
 *
 *	File Name:			settings.php
 *	Description:		app settings
 *
 *	@since 1.0.0
 *
 *	**************************************************
 */

##################################################
# GENERAL SETTINGS ###############################
##################################################

// the baseurl where this script is installed
if( !defined( 'APP_BASE_URL' ) )
	define('APP_BASE_URL', 'http://avatarize.skylord.pro' );

// title of the app	
if( !defined( 'APP_TITLE' ) )
	define( 'APP_TITLE', 'SkyLord Gaming - Avatarizer' );

// title of the app	
if( !defined( 'APP_VERSION' ) )
	define( 'APP_VERSION', '1.0.0' );

// path where changelogs get generated
if( !defined( 'CHANGELOG_PATH' ) )
	define( 'CHANGELOG_PATH', './content/' );



##################################################
# ADMIN SETTINGS #################################
##################################################

/**
 * MODE
 *
 * The Mode defines if everyone is able to use the same features of avatarizer,
 * or if there is a level for premium members.
 *
 * public,premium
 */
if( !defined( 'MODE' ) )
	define('MODE', 'premium' ); // premium or public

/**
 * PASSWORD
 *
 * The Mode defines if everyone is able to use the same features of avatarizer,
 * or if there is a level for premium members.
 *
 * public,premium
 */
if( !defined( 'PASSWORD' ) )
	define( 'PASSWORD', 'skylord' ); // set a password

/**
 * SALT
 *
 * The Mode defines if everyone is able to use the same features of avatarizer,
 * or if there is a level for premium members.
 *
 * public,premium
 */
if( !defined( 'SALT' ) )
	define( 'SALT', '' ); // change this to whatever you want



##################################################
# APPEARANCE & BRANDING ##########################
##################################################

// path to the logo
if( !defined( 'LOGO_PATH' ) )
	define( 'LOGO_PATH', 'http://avatarize.skylord.pro/content/logo.png' );

// the link where the user should be redirected by clicking on the logo
if( !defined( 'LOGO_LINK' ) )
	define( 'LOGO_LINK', APP_BASE_URL );

// title of the link
if( !defined( 'LOGO_TITLE' ) )
	define('LOGO_TITLE', APP_TITLE );

// path to the icon (used for favicon)
if( !defined( 'ICON_PATH' ) )
	define( 'ICON_PATH', 'application/assets/img/icon.jpg' );



##################################################
# DEFINE PROJECTS & CATEGORIES ###################
##################################################

function avatarizer_backgrounds_basic() {
	
	$directory		= dirname( dirname(__FILE__) ) . '/content/images/backgrounds/basic';
	$files			= array_diff( scandir( $directory ), array( '..', '.' ) );
		
	return $files;
	
}

function avatarizer_backgrounds_pro() {
	
	$directory		= dirname( dirname(__FILE__) ) . '/content/images/backgrounds/pro';
	$files			= array_diff( scandir( $directory ), array( '..', '.' ) );
		
	return $files;
	
}