<?php 


/* Activation hook 
 * 
 * Uses the database to determine the version number and checks against
 * the current code version number. It then runs through all outstanding
 * update scripts in order of version number. If this is a fresh
 * install, it will run through all the update scripts (consider the
 * first update script as an install script).
 */
add_action( 'after_switch_theme', function(){
	
	define( 'BOP_THEME_ACTIVATING', true );
	
	$current_folder = get_template_directory() . DIRECTORY_SEPARATOR;
	
	$db_version = get_site_option( 'bop_null_theme_version', '0.0.0', false );
	$theme = wp_get_theme();
	
	if( version_compare( $db_version, $theme['Version'], '<' ) ){
		
		if( $handle = opendir( $current_folder . 'inc' . DIRECTORY_SEPARATOR . 'updates' ) ){
			
			$updates = array();
			
			while( false !== ( $entry = readdir( $handle ) ) ){
				if( $entry != '.' && $entry != '..' ) {
					if( version_compare( $db_version, $entry, '<' ) ){
						$updates[] = $entry;
					}
					
				}
			}
			
			usort( $updates, 'version_compare' );
			
			foreach( $updates as $update ){
				require_once( $current_folder . 'inc' . DIRECTORY_SEPARATOR . 'updates' . DIRECTORY_SEPARATOR . $update . DIRECTORY_SEPARATOR . 'update.php' );
			}
			
			closedir($handle);
			
		}
		
		update_option( 'bop_null_theme_version', $theme['Version'], false );
	}
} );



/* Deactivation hook
 * 
 * Runs deactivate.php
 * 
 */
add_action( 'switch_theme', function(){
	
	define( 'BOP_THEME_DEACTIVATING', true );
	
	require_once( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'deactivate.php' );
} );



/* Set up translations */
add_action( 'after_setup_theme', function(){
    load_theme_textdomain( 'bop-null', get_template_directory() . DIRECTORY_SEPARATOR . 'languages' );
}, 1 );
