<?php
/**
* Displays archives for portfolio categories
*
* @package Radius
* @since 1.0
*/
get_header(); ?>

			<div class="container-wrap">
				<div class="container">
					<div class="portfolio-title-bar">
						<?php _ex( 'Service', 'Taxonomy archive title', 'radius' ); ?> / <?php single_cat_title(); ?></li>
					</div>

					<div class="portfolio-full clearfix">
						<div class="filter-posts">
							<!-- Portfolio Items -->
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'summary-array-portfolio' ); ?>

							<?php endwhile; ?>
							<?php endif; ?>
						</div><!-- filter posts -->
					</div><!-- portfolio full -->

					<!-- post navigation -->
					<?php radius_page_nav(); ?>

				</div><!-- container -->
			</div><!-- container wrap -->
		<!-- footer -->
		<?php get_footer(); ?>
