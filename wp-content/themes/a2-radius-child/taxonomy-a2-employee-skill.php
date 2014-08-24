<?php
/**
 * Template for displaying Portfolio archives.
 */
get_header(); ?>

				<div class="container-wrap">
					<div class="container">

						<div class="portfolio-title-bar">
							<?php _e( 'Skill', 'Taxonomy archive title', 'a2_radius_child' ) ?> / <?php single_cat_title(); ?></li>
						</div>

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
