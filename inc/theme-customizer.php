<?php 

/**
 * Custom theme options.
 *
 * @link https://developer.wordpress.org/reference/hooks/customize_register/
 */
add_action( 'customize_register', function( $wp_customize ){
	
	/*
	//telephone label
	$wp_customize->add_setting( 'telephone_number_label',
		array(
			'default' => __( 'T: 01234 567890', 'bop-null' ),
			'sanitize_callback'=>'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'telephone_number_label',
        array(
            'label'          => __( 'Phone Number Label', 'bop-null' ),
            'section'        => 'title_tagline',
            'settings'       => 'telephone_number_label',
            'type'           => 'text'
        )
	) );
	*/
	
	/* See here for usage:
		https://codex.wordpress.org/Theme_Customization_API
		
		https://codex.wordpress.org/Class_Reference/WP_Customize_Control
		https://developer.wordpress.org/reference/classes/wp_customize_control/
		
		https://codex.wordpress.org/Class_Reference/WP_Customize_Color_Control
		https://developer.wordpress.org/reference/classes/wp_customize_color_control/
	*/
	
}, 10, 1 );
