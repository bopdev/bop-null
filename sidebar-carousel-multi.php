<div class="row carousel-container">
    <div id="homepage-carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php $i=0; while( have_rows( 'slides' ) ): the_row(); ?>
            <li data-target="#homepage-carousel" data-slide-to="<?php echo $i ?>"<?php echo $i==0 ? ' class="active"' : '' ?>></li>
          <?php ++$i; endwhile ?>
        </ol>
        <div class="carousel-inner" role="listbox">
			<?php $per_slide = 3; $i=0; $esc_loop = false; while( have_rows( 'slides' ) && ! $esc_loop ): ?>
				<div class="carousel-item<?php echo $i==0 ? ' active' : '' ?>">
					<?php $j = 0; while( $j<$per_slide && have_rows( 'slides' ) ): the_row(); ?>
						<div class="col-lg-4">
							<div class="carousel-item-inner">
								<a href="<?php echo esc_html( get_sub_field( 'link' ) ); ?>">
									<?php
										$image_id = get_sub_field( 'slide' );
										echo wp_get_attachment_image( $image_id, 'full', false , array('class'=>'img-fluid'));
									?>
									<div class="carousel-caption">
										<?php echo esc_html( get_sub_field( 'slide_caption' ) ); ?>
									</div>
								</a>
							</div>
						</div>
					<?php ++$j; endwhile; $esc_loop = ($j!=$per_slide) ?>
				</div>
            <?php ++$i; endwhile ?>
        </div>
        <a class="left carousel-control hidden-md-down" href="#homepage-carousel" role="button" data-slide="prev">
          <span class="previous-arrow"><i class="fa fa-caret-left fa-3x" aria-hidden="true"></i></span>
          <span class="sr-only"><?php _e( 'Previous', 'bop-illusioneer' ) ?></span>
        </a>
        <a class="right carousel-control hidden-md-down" href="#homepage-carousel" role="button" data-slide="next">
          <span class="next-arrow"><i class="fa fa-caret-right fa-3x" aria-hidden="true"></i></span>
          <span class="sr-only"><?php _e( 'Next', 'bop-illusioneer' ) ?></span>
        </a>
    </div>
</div><!-- end .row -->
