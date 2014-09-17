<?php
/*
Template Name: Contact
*/

get_header(); ?>

      <!-- Grab the featured image -->
      <?php if ( has_post_thumbnail() ) { ?>
        <a class="featured-image" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'radius' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_post_thumbnail( 'large-image' ); ?></a>
      <?php } ?>

      <div class="container-wrap">
        <div class="container">
          <div class="content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <div class="blog-post clearfix">
                <div class="blog-inside">
                  <div class="page-title">
                    <h1><?php the_title(); ?></h1>
                  </div>

                  <?php the_content(); ?>
                  <?php wp_link_pages(); ?>
                </div><!-- blog inside -->
              </div><!-- blog post -->
            <?php endwhile; ?>
            <?php endif; ?>

            <?php if ( have_rows("contact_sections") ) : while ( have_rows("contact_sections") ) : the_row(); ?>
              <div class="blog-post clearfix">
                <div class="blog-inside">
                  <div class="page-title">
                    <h1><?php the_sub_field("contact_section_heading"); ?></h1>
                  </div>

                  <?php foreach( get_sub_field('contact_section_employees') as $post): // variable must be called $post (IMPORTANT) ?>
                      <?php setup_postdata($post); ?>

                      <div class="employee">

                        <?php
                          $photo = get_field('photo');

                          if( !empty($photo) ): ?>

                            <div class="featured-image">
                              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <img src="<?php echo $photo['sizes']['portfolio-employee-thumb']; ?>" alt="<?php echo $photo['alt']; ?>" />
                              </a>
                            </div>

                        <?php endif; ?>

                        <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                          <?php the_title(); ?>
                        </a></h3>
                        <ul class="portfolio-meta-links">
                          <?php
                            if( get_field('phone') ): ?>
                            <li><span class="meta-list"><i class="fa fa-phone"></i> <?php the_field('phone') ?></span></li>
                          <?php endif; ?>
                          <?php
                            if( get_field('email') ): ?>
                            <li><span class="meta-list"><i class="fa fa-envelope"></i> <?php the_field('email') ?></span></li>
                          <?php endif; ?>
                          <!-- <li>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php printf( __( 'More information about %s', 'radius' ), get_the_title()); ?></a>
                          </li> -->
                        </ul>

                      </div>

                  <?php endforeach; ?>
                  <?php wp_reset_postdata(); ?>

                </div><!-- blog inside -->
              </div><!-- blog post -->
            <?php endwhile; ?>
            <?php endif; ?>

          </div><!-- content -->

          <?php get_sidebar(); ?>
        </div><!-- container -->
      </div><!-- container wrap -->

<?php get_footer(); ?>
