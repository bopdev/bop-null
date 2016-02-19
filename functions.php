<?php
/**
 * Bop functions and definitions
 */

/**
 * Requires: > PHP 5.6, > WordPress 4.4.
 */

function bop_null_requirements_error(){
	?>
	<div class="notice notice-error">
		<p><?php _e( 'Error: This theme requires WordPress v4.4 or higher (current: ' . $GLOBALS['wp_version'] . ') and PHP v5.6 or higher (current: ' . phpversion() . '). You must update or this theme will behave very erratically or just straight-up break', 'bop-null' ); ?></p>
	</div>
	<?php
}

if ( version_compare( $GLOBALS['wp_version'], '4.4.0', '<' ) || version_compare( phpversion(), '5.6.0', '<' ) ) {
	
	add_action( 'admin_notices', 'bop_null_requirements_error' );
	return;
	
}else{
	
	require_once( get_template_directory() . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'init.php' );
	require_once( get_template_directory() . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'theme.php' );
	
}
