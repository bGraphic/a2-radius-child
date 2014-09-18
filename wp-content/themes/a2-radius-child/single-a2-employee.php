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
										<?php the_terms($post->ID, 'a2-employee-skill', '', ', ', '') ?>
									</div>

									<div class="blog-entry">
										<div class="blog-content">
											<?php the_field('bio'); ?>

											<?php if(get_field('links')): ?>
												<ul>
    											<?php while(the_repeater_field('links')): ?>
														<li><a href="<?php the_sub_field('url'); ?>" alt="<?php the_sub_field('tag'); ?>"><?php the_sub_field('tag'); ?></a></li>
    											<?php endwhile; ?>
												</ul>
											<?php endif; ?>

										</div><!-- blog content -->
									</div><!-- blog entry -->
								</div><!-- blog inside -->
							</div><!-- post -->

						</div><!-- content -->

						<!-- portfolio meta details -->
						<div class="portfolio-sidebar">

							<?php
								$photo = get_field('photo');

								if( !empty($photo) ): ?>

									<div class="featured-image">
										<img src="<?php echo $photo['sizes']['portfolio-employee-thumb']; ?>" alt="<?php echo $photo['alt']; ?>" />
									</div>

							<?php endif; ?>

							<div class="portfolio-meta">
								<h3><?php _e( 'Contact Information', 'radius' ); ?></h3>
								<ul class="portfolio-meta-links">
									<?php
										if( get_field('phone') ): ?>
										<li><span class="meta-list"><i class="fa fa-phone"></i> <?php the_field('phone') ?></span></li>
									<?php endif; ?>
									<?php
										if( get_field('email') ): ?>
										<li><span class="meta-list"><i class="fa fa-envelope"></i> <?php the_field('email') ?></span></li>
									<?php endif; ?>
							  </ul>
							</div><!-- portfolio meta -->

						</div><!-- sidebar -->

						<div class="clear"></div>

						<?php endwhile; ?>
						<?php endif; ?>

						<!-- <ul class="portfolio-sidebar-nav">
							<li class="previous"><?php previous_post_link( '%link', '&#8592; %title')?></li>
							<li class="next"><?php next_post_link( '%link', '%title &#8594;') ?></li>
						</ul> -->

					</div><!-- container -->

				</div>

<?php get_footer(); ?>
