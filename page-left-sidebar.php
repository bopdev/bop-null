<?php
/**
 * Template Name: Left Sidebar Template
 *
 * @package Bop Null
 * @since 0.1.0
 */

get_header(); ?>
<div class="col-lg-8 pull-lg-right">
	<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			<?php while( have_posts() ): the_post() ?>
				<article>
					<header>
						<?php the_post_thumbnail('full', array('class' => 'img-fluid', 'data-object-fit' => 'cover')); ?>
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
</div>
<div class="col-lg-4">
	<?php get_sidebar(); ?>
</div>
<?php get_footer() ?>
