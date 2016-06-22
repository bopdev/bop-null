<?php
/**
 * The customisable file (like functions.php in other themes). Below are simply suggestions.
 */

add_action( 'after_setup_theme', function(){

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );


	/*
	 * Add support for ancillary WordPress parts
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support
	 */

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Switch default core markup for HTML5.
	 */
	add_theme_support( 'html5' );


	/*
	 * Register menus
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bop-null' ),
		'footer'  => __( 'Footer Menu', 'bop-null' ),
	) );


	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css' ) );


	/*
	 * Add image sizes
	 */
	$fontsize = '14';
	//add_image_size( 'xxs', 17 * $fontsize );
	add_image_size( 'xs', 34 * $fontsize );
	add_image_size( 'sm', 48 * $fontsize );
	//add_image_size( 'md', 62 * $fontsize );
	add_image_size( 'lg', 75 * $fontsize );
	add_image_size( 'xl', 100 * $fontsize );

} );


/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 */
add_action( 'widgets_init', function() {
/*
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentysixteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
*/
} );


/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
add_action( 'wp_head', function() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}, 0 );


/*
 * Register and enqueue styles and scripts
 */
add_action( 'wp_enqueue_scripts', function(){

	$jses = array(
		'modernizr'=>array(
			'src'=>bopdev( get_template_directory_uri() . '/js/modernizr.js', get_template_directory_uri() . '/js/modernizr.js' ),
			'dep'=>array( 'jquery' ),
			'version'=>'3.0-beta',
			'in_footer'=>true
		),
		'tether'=>array(
			'src'=>'https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js',
			'dep'=>array( 'jquery' ),
			'version'=>'1.2.0',
			'in_footer'=>true
		),
		'bootstrap'=>array(
			'src'=>'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js',
			'dep'=>array( 'jquery', 'tether' ),
			'version'=>'4.0.0-alpha.2',
			'in_footer'=>true
		),
		'object-fit'=>array(
			'src'=>get_template_directory_uri() . bopdev( '/js/object-fit-polyfill.js', '/js/object-fit-polyfill.js' ),
			'dep'=>array( 'jquery' ),
			'version'=>'0.1.0',
			'in_footer'=>true
		),
		'bop'=>array(
			'src'=>get_template_directory_uri() . bopdev( '/js/bop.js', '/js/bop.min.js' ),
			'dep'=>array( 'jquery' ),
			'version'=>'0.1.0',
			'in_footer'=>true
		)
	);

	//register scripts
	foreach( $jses as $id=>$js ){
		wp_register_script( $id, $js['src'], $js['dep'], $js['version'], $js['in_footer'] );
	}

	//enqueue scripts
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'bootstrap' );
	wp_enqueue_script( 'object-fit' );
	wp_enqueue_script( 'bop' );



	$csses = array(
		'font-awesome'=>array(
			'src'=>'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css',
			'dep'=>array(),
			'version'=>'4.6.1',
			'media'=>'all'
		),
		'bop'=>array(
			'src'=>get_template_directory_uri() . '/css/bop.css',
			'dep'=>array(),
			'version'=>'0.1.0',
			'media'=>'all'
		)
	);

	//register styles
	foreach( $csses as $id=>$css ){
		wp_register_style( $id, $css['src'], $css['dep'], $css['version'], $css['media'] );
	}

	//enqueue styles
	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'bop' );

} );


/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails. This should be tailored to design
 *
 * CHANGE ME
 *
 * @since Bop Null 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
add_filter( 'wp_get_attachment_image_attributes', function( $attr, $attachment, $size ) {
	if( $size == 'xxs' ){
		$attr['sizes'] = '(min-width: 75em) 17vw, (min-width: 62em) 23vw, (min-width: 48em) 27.5vw, (min-width: 34em) 35.5vw, 50vw';
	}elseif( $size == 'xs' ){
		$attr['sizes'] = '(min-width: 75em) 34vw, (min-width: 62em) 45.5vw, (min-width: 48em) 55vw, (min-width: 34em) 71vw, 100vw';
	}elseif( $size == 'sm' ){
		$attr['sizes'] = '(min-width: 75em) 48vw, (min-width: 62em) 64vw, (min-width: 48em) 77.5vw, 100vw';
	}elseif( $size == 'md' ){
		$attr['sizes'] = '(min-width: 75em) 62vw, (min-width: 62em) 83vw, 100vw';
	}elseif( $size == 'lg' ){
		$attr['sizes'] = '(min-width: 75em) 75vw, 100vw';
	}elseif( $size == 'xl' ){
		$attr['sizes'] = '100vw';
	}
	return $attr;
}, 10 , 3 );


// Add dynamic copyright
function comicpress_copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
	SELECT
	YEAR(min(post_date_gmt)) AS firstdate,
	YEAR(max(post_date_gmt)) AS lastdate
	FROM
	$wpdb->posts
	WHERE
	post_status = 'publish'
	");
	$output = '';
	if($copyright_dates) {
		$copyright = "&copy; " . $copyright_dates[0]->firstdate;
	if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
		$copyright .= '-' . $copyright_dates[0]->lastdate;
	}
	$output = $copyright;
	}
return $output;
}


//Further files
require_once get_template_directory() . '/inc/theme-customizer.php';
