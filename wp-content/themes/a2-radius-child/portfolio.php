<?php
/*
Template Name: Portfolio
*/

get_header(); ?>
			<div class="container-wrap">
				<div class="container">

						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php if(!empty($post->post_content)) : ?>
							<div class="blog-post clearfix">
								<div class="blog-inside">
									<div class="page-title">
										<h1><?php the_title(); ?></h1>
									</div>
									<?php the_content(); ?>
									<?php wp_link_pages(); ?>
								</div><!-- blog inside -->
							</div><!-- blog post -->
							<?php endif; ?>
						<?php endwhile; ?>
						<?php endif; ?>


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
								<?php
									$global_posts_query = new WP_Query(
										array(
											'posts_per_page' => -1,
											'post_type'      => 'array-portfolio'
										)
									);

									if ( $global_posts_query->have_posts() ) : while( $global_posts_query->have_posts() ) : $global_posts_query->the_post();
								?>

									<?php get_template_part( 'summary-array-portfolio' ); ?>

						      <?php endwhile; endif; ?>
							</div><!-- filter posts -->
						</div><!-- content -->

				</div><!-- container -->
			</div><!-- container wrap -->

<?php get_footer(); ?>
