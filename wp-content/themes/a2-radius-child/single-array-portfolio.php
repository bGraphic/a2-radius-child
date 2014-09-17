<?php
/**
 * Displays single portfolio items.
 *
 * @package Radius
 * @since 1.0
 */
get_header(); ?>

				<div class="container-wrap">
					<div class="container content-portfolio">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<!-- portfolio content -->
						<div class="content">
							<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post clearfix' ); ?>>
								<div class="blog-inside clearfix">
									<div class="page-title page-title-portfolio">
										<h1><?php the_title(); ?></h1>
										<?php the_terms($post->ID, 'a2-service', '', ', ', '') ?>
									</div>

									<div class="blog-entry">
										<div class="blog-content">
											<?php the_content(''); ?>
										</div><!-- blog content -->
									</div><!-- blog entry -->
								</div><!-- blog inside -->
							</div><!-- post -->

							<ul class="portfolio-sidebar-nav">
								<li class="previous"><?php previous_post_link( '%link', '&#8592; %title')?></li>
								<li class="next"><?php next_post_link( '%link', '%title &#8594;') ?></li>
							</ul>

						</div><!-- content -->

						<!-- portfolio meta details -->
						<div class="portfolio-sidebar">

							<!-- Grab the featured image -->
							<?php if ( get_field('image') ) {
								$image = get_field('image');
								?>
								<div class="featured-image">
									<?php if(get_field('image_type') == 'logo'): ?>
										<img class="logo" src="<?php echo $image['sizes']['portfolio-logo-thumb']; ?>" />
									<?php else : ?>
										<img src="<?php echo $image['sizes']['portfolio-photo-thumb']; ?>" />
									<?php endif; ?>
								</div>
							<?php } ?>

							<div class="portfolio-meta">
								<h3><?php _e( 'Project Details', 'radius' ); ?></h3>
								<ul class="portfolio-meta-links">
							    	<!-- <li><span><i class="fa fa-user"></i> <?php the_author_link(); ?></span></li> -->
									<?php if(get_field('timeframe')) : ?>
							    	<li><span class="meta-list"><i class="fa fa-calendar"></i> <?php the_field('timeframe')?></span></li>
									<?php endif; ?>
							    <?php echo get_the_term_list( $post->ID, 'categories', '<li><i class="fa fa-list"></i> ', ', ', '</li>' ); ?>
							    </ul>
							</div><!-- portfolio meta -->

						</div><!-- sidebar -->

						<div class="clear"></div>

						<?php endwhile; ?>
						<?php endif; ?>
					</div><!-- container -->
				</div>

<?php get_footer(); ?>
