		</div>
		<footer>
		<?php echo comicpress_copyright(); ?> <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
		<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>	
		</footer>

		<?php wp_footer(); ?>
	</body>
</html>
