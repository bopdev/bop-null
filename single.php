<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bop Null
 * @since 0.1.0
 */

get_header(); ?>
<main id="main" class="site-main" role="main">
	<?php if ( have_posts() ) : ?>
		<?php while( have_posts() ): the_post() ?>
			<article>
				<header>
					<?php the_post_thumbnail() ?>
					<h1><?php the_title() ?></h1>
				</header>
				<section>
					<?php the_content() ?>
				</section>
				<footer>
					<span><?php printf( __( 'by %s at %s' ), get_the_author(), get_the_time( 'c' ) ) ?></span>
				</footer>
			</article>
		<?php endwhile ?>
	<?php endif ?>
</main>
<?php get_footer() ?>
