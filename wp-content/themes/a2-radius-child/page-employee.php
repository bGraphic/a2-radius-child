<?php
/**
* Template Name: Employee Directory
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

            <div class="a2-portfolio-full clearfix">
                <?php
                  $global_posts_query = new WP_Query(
                    array(
                      'posts_per_page' => -1,
                      'post_type'      => 'a2-employee'
                    )
                  );
                  if ( $global_posts_query->have_posts() ) : while( $global_posts_query->have_posts() ) : $global_posts_query->the_post();
                ?>

                  <?php get_template_part( 'summary-a2-employee' ); ?>

                <?php endwhile; endif; ?>

            </div><!-- portfolio full -->

        </div><!-- container -->
      </div><!-- container wrap -->

    <!-- footer -->
    <?php get_footer(); ?>
