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

if( ! function_exists( 'bop_null_register_script_attributes' ) ):
/**
 * Adds extra/overwrites html attributes to the tag output by enqueue scripts
 *
 * @since Bop Null 0.1.1
 *
 * @param mixed $h Script's registered handle.
 * @param mixed $attrs Array of attributes to add to the script tag.
 * @return void
 */
function bop_null_register_script_attributes( $h, $attrs ){
  add_filter( 'script_loader_tag', function( $html, $handle, $src ) use ( $h, $attrs ){
    //Take note that $html may have conditional tags around the script tag in it.
    if( $h == $handle ){
      $attrs = array_merge( array( 'type'=>'text/javascript', 'src'=>$src ), $attrs );
      
      $attrs_str = "";
      foreach( $attrs as $name=>$val ){
        $attrs_str .= ' ' . esc_attr( $name ) . '="' . esc_attr( $val ) . '"';
      }
      
      $script_tag = "<script{$attrs_str}></script>";
      $html = str_replace( "<script type='text/javascript' src='$src'></script>", $script_tag, $html );
    }
    return $html;
  }, 10, 3 );
}
endif;

if( ! function_exists( 'bop_null_register_style_attributes' ) ):
/**
 * Adds extra/overwrites html attributes to the tag output by enqueue styles
 *
 * @since Bop Null 0.1.1
 *
 * @param mixed $h Script's registered handle.
 * @param mixed $attrs Array of attributes to add to the script tag.
 * @return void
 */
function bop_null_register_style_attributes( $h, $attrs ){
  add_filter( 'style_loader_tag', function( $html, $handle, $href, $media ) use ( $h, $attrs ){
    if( $h == $handle ){
      $wp_styles = wp_styles();
      $obj = $wp_styles->registered[$handle];
      
      $rel = isset( $obj->extra['alt'] ) && $obj->extra['alt'] ? 'alternate stylesheet' : 'stylesheet';
      $title = isset( $obj->extra['title'] ) ? "title='" . esc_attr( $obj->extra['title'] ) . "'" : '';
      
      $is_rtl = ( 'rtl' === $wp_styles->text_direction && isset( $obj->extra['rtl']) && $obj->extra['rtl'] );
      
      
      $default_attrs = array( 'rel'=>$rel, 'href'=>$href, 'type'=>'text/css', 'media'=>$media );
      
      if( isset( $obj->extra['title'] ) ){
        $default_attrs['title'] = $obj->extra['title'];
      }
      
      if( $is_rtl ){
        $default_attrs['id'] = "$handle-rtl-css";
      }else{
        $default_attrs['id'] = "$handle-css";
      }
      
      $attrs = array_merge( $default_attrs, $attrs );
      
      $attrs_str = "";
      foreach( $attrs as $name=>$val ){
        $attrs_str .= ' ' . esc_attr( $name ) . '="' . esc_attr( $val ) . '"';
      }
      
      if( $is_rtl ){
        $html = str_replace( "<link rel='$rel' id='$handle-rtl-css' $title href='$href' type='text/css' media='$media' />\n", "<link $attrs_str />\n", $html );
      }else{
        $html = str_replace( "<link rel='$rel' id='$handle-css' $title href='$href' type='text/css' media='$media' />\n", "<link $attrs_str />\n", $html );
      }
    }
    return $html;
  }, 2, 4 );
}
endif;
