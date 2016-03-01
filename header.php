<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Bop Null
 * @since 0.1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header>
			<?php wp_nav_menu( array(
				'walker'=>new Bop_Nav_Walker,
				'theme_location'=>'primary',
				'container'=>'nav',
				'container_class'=>'navbar',
				'menu_class'=>'nav nav-tabs'
			) ) ?>
		</header>
		<div id="content">
