<?php
/*
Template Name: Homepage
*/

get_header(); ?>

			<!-- Grab the featured image -->
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="featured-image" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'radius' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
					<?php the_post_thumbnail( 'large-image' ); ?>
					<div class="slogan">
						<div class="section">
							<?php echo get_bloginfo( 'description', 'display' ); ?>
						</div>
					</div>
				</div>
			<?php } ?>

			<div id="sections-wrap">
				<div id="sections" class="clearfix">

					<!-- Text Box Section -->
					<?php if ( is_active_sidebar( 'homepage-text-boxes' ) ) : ?>
						<div class="section-wrap clearfix">
							<div class="section top-section">
								<div class="section-widget-wrap">
									<?php dynamic_sidebar( 'homepage-text-boxes' ); ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<!-- Text and Video Section -->
					<?php if ( is_active_sidebar( 'homepage-mid-left' ) || is_active_sidebar( 'homepage-mid-right' ) ) : ?>
						<div class="section-wrap clearfix">
							<div class="section mid-section">
								<div class="mid-left">
									<?php dynamic_sidebar( 'homepage-mid-left' ); ?>
								</div>

								<div class="mid-right">
									<?php dynamic_sidebar( 'homepage-mid-right' ); ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<!-- Portfolio and Blog Section -->
					<?php if ( is_active_sidebar( 'homepage-portfolio-section' ) ) : ?>
						<div class="section-wrap clearfix">
							<div class="section bottom-section">
								<?php dynamic_sidebar( 'homepage-portfolio-section' ); ?>
							</div>
						</div>
					<?php endif; ?>
				</div><!-- sections -->
			</div><!-- sections wrap -->

<?php get_footer(); ?>
