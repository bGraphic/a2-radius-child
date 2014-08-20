<?php
/**
* Template for displaying Portfolio archives.
*/
get_header(); ?>

				<div class="container-wrap">
					<div class="container">
						<div class="filter-bar clearfix">
							<ul class="filter-list filter clearfix">
								<li class="reset active all-projects"><i class="fa fa-refresh"></i></li>
								<?php
									$terms = get_terms( 'categories' );
									$count = count( $terms );

									if ( $count > 0 ) {
										$term_list = '';
										foreach ( $terms as $term ) {
											$term_list .= '<li class="cat-item '. esc_attr( $term->name ) .'"><a href="#" class="'. esc_attr( $term->name ) .'">' . esc_html( $term->name ) . '</a></li>';
										}
										echo $term_list;
									}
								?>
							</ul>
						</div>

						<div class="a2-portfolio-full clearfix">
							<div class="filter-posts">
								<!-- Grab Portfolio Items -->
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

									<div class="project a2-portfolio" data-id="post-<?php the_ID(); ?>" <?php echo 'data-type="'. strip_tags( get_the_term_list( get_the_ID(), 'categories', '', ' ', '' ) ) .'"'; ?>>
										<div class="portfolio-item">
											<a href="<?php the_permalink(); ?>">
												<?php if ( get_field('logo') || get_field('photo') ) { ?>
												<?php if(get_field('image_type') == 'logo'): ?>
													<img class="logo" src="<?php echo get_field('logo')['sizes']['portfolio-logo-thumb']; ?>" />
												<?php else : ?>
													<img src="<?php echo get_field('photo')['sizes']['portfolio-photo-thumb']; ?>" />
												<?php endif; ?>
											<?php } ?>
											</a>
											<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<?php the_title(); ?>
											</a></h4>
										</div>
									</div>

								<?php endwhile; endif; ?>

							</div><!-- filter posts -->
						</div><!-- portfolio full -->

						<!-- post navigation -->
						<?php if ( $wp_query->max_num_pages > 1 ) { ?>
							<div class="portfolio-nav clearfix">
								<div class="portfolio-nav-right">
									<?php next_posts_link( __( 'Older Entries', 'radius' )) ?>
								</div>
								<div class="portfolio-nav-left">
									<?php previous_posts_link(__( 'Newer Entries', 'radius' )) ?>
								</div>
							</div>
						<?php } ?>
				</div><!-- container -->
			</div><!-- container wrap -->

		<!-- footer -->
		<?php get_footer(); ?>
