<?php
/**
 * Initial requirement checking and procedures before running /inc/theme.php
 */

/**
 * Requires: > PHP 5.6, > WordPress 4.4.
 */

//This needs to be a declared function as PHP 5.2 and lower do not allow for anon fns.
function bop_null_requirements_error(){
	?>
	<div class="notice notice-error">
		<p><?php _e( 'Error: This theme requires WordPress v4.4 or higher (current: ' . $GLOBALS['wp_version'] . ') and PHP v5.6 or higher (current: ' . phpversion() . '). You must update or this theme will behave very erratically or just straight-up break', 'bop-null' ); ?></p>
	</div>
	<?php
}

if ( version_compare( $GLOBALS['wp_version'], '4.4.0', '<' ) || version_compare( phpversion(), '5.6.0', '<' ) ) {
	
	//throw error and end theme declarations and processes.
	add_action( 'admin_notices', 'bop_null_requirements_error' );
	return;
	
}else{
	
	//Init file handles activation, deactivation and upate procedures.
	require_once( get_template_directory() . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'init.php' );
	
	//Crux is for very useful functions that will likely be needed in every theme developed from this base.
	require_once( get_template_directory() . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'crux.php' );
	
	//Customisable file (akin to functions.php in ordinary WP themes).
	require_once( get_template_directory() . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'theme.php' );
	
}
