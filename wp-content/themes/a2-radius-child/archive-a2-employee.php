<?php
/**
 * Template for displaying Employee archives.
 */
get_header(); ?>

				<div class="container-wrap">
					<div class="container">

						<div class="a2-portfolio-full clearfix">
								<!-- Grab Portfolio Items -->
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

									<?php get_template_part( 'summary-a2-employee' ); ?>

								<?php endwhile; endif; ?>

						</div><!-- portfolio full -->

				</div><!-- container -->
			</div><!-- container wrap -->

		<!-- footer -->
		<?php get_footer(); ?>
