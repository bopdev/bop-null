<?php 

require_once( get_template_directory() . '/bop-nav-walker.php' );

if( ! function_exists( 'bopdev' ) ):
/**
 * Checks if WordPress is in debug mode or not. Useful for turning on/off minification, caching, etc.
 *
 * @since Bop Null 0.1.0
 *
 * @param mixed $is Output if is in debug environment.
 * @param mixed $isnt Output if isn't in debug environment.
 * @return bool/mixed If no params, the bool; else, the appropriate $is/$isnt value.
 */
function bopdev( $is = null, $isnt = false ){
	
	$dbg = defined( 'WP_DEBUG' ) && WP_DEBUG;
	
	if( is_null( $is ) ){
		return $dbg;
	}
	
	return $dbg ? $is : $isnt;
	
}
endif;
