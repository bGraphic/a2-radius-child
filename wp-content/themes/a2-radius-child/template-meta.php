<?php
/**
 * Template part for displaying post meta
 *
 * @package Radius
 * @since 1.0
 */
 ?>
							<div class="blog-meta">
								<ul class="meta-links">
							    	<!-- <li><span class="meta-list"><i class="fa fa-user"></i> <?php the_author_posts_link(); ?></span></li> -->
							    	<li><span class="meta-list"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></span></li>
							    	<li><span class="meta-list"><i class="fa fa-list"></i> <?php the_category( ', ' ) ?></span></li>
							    	<?php the_tags( '<li><span class="meta-list"><i class="fa fa-tag"></i> ', ', ', '</span></li>' ); ?>
							    	<!-- <li><span class="meta-list"><i class="fa fa-comment"></i> <a href="<?php the_permalink(); ?>#comments"><?php comments_number( __( 'No Comments', 'radius' ), __( '1 Comment', 'radius' ), __( '% Comments', 'radius' ) );?></a></span></li> -->
							    </ul>
								<div class="clear"></div>
							</div><!-- blog meta -->
