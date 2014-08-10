<?php

/* Homepage Portfolio Widget Class */

class a2_home_portfolio extends WP_Widget {

	/**
	* Holds settings defaults. Populated in __construct().
	*
	* @var array
	*/
	protected $defaults;



	/**
	* Set default options and create widget.
	*
	* @since 1.0.0
	*/
	function __construct() {

		$this->defaults = array(
			'portfolio_section_title' => __( 'Latest Work', 'radius' ),
			'portfolio_section_text'  => '',
			'portfolio_item_count'    => 6,
			'blog_section_title'      => __( 'Recent Posts', 'radius' ),
			'blog_item_count'         => 2,
		);

		$widget_ops = array(
			'classname'   => 'homepage-portfolio',
			'description' => __( 'Display your Portfolio.', 'radius' ),
		);

		$control_ops = array(
			'id_base' => 'a2-home-portfolio',
		);

		parent::__construct( 'a2-home-portfolio', __( 'A2 Homepage Portfolio and Blog', 'radius' ), $widget_ops, $control_ops );
	}



	/**
	* Display the widget content
	*
	* @since 1.0.0
	*/
	function widget( $args, $instance ) {

		extract( $args );

		$instance = wp_parse_args( (array) $instance, $this->defaults );

		// Portfolio section - forcing defaults fallback because no values = ugly presentation
		$portfolio_section_title = ( ! empty ( $instance['portfolio_section_title'] ) ? $instance['portfolio_section_title'] : $this->defaults['portfolio_section_title'] );
		$portfolio_item_count    = ( ! empty ( $instance['portfolio_item_count'] ) ? $instance['portfolio_item_count'] : $this->defaults['portfolio_item_count'] );

		echo $before_widget; ?>

		<div class="home-portfolio">

				<h2><?php echo $portfolio_section_title; ?></h2>

				<div class="portfolio-full clearfix">
					<div class="filter-posts">
						<!-- Portfolio Items -->
						<?php

						$portfolio_list_args = array(
							'posts_per_page' => $portfolio_item_count,
							'post_type'      => 'array-portfolio'
						);
						$portfolio_list_posts = new WP_Query( $portfolio_list_args );

						while( $portfolio_list_posts->have_posts() ) : $portfolio_list_posts->the_post() ?>

							<div class="project portfolio-item-wrap block-post" data-id="post-<?php the_ID(); ?>" <?php echo 'data-type="'. strip_tags( get_the_term_list( get_the_ID(), 'categories', '', ' ', '' ) ) .'"'; ?>>
								<div class="portfolio-item">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'portfolio-image' ); ?></a>
									<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
								</div>
							</div>

						<?php endwhile; ?>
					</div><!-- filter posts -->
				</div><!-- content -->

		</div><!-- home portfolio -->

		<?php echo $after_widget;
	}


	/**
	* Update the instance
	*
	* @since 1.0.0
	*/
	function update( $new_instance, $old_instance ) {

		// Update Portfolio settings
		$new_instance['portfolio_section_title'] = strip_tags( $new_instance['portfolio_section_title'] );
		$new_instance['portfolio_section_text']  = $new_instance['portfolio_section_text'];
		$new_instance['portfolio_item_count']    = strip_tags( $new_instance['portfolio_item_count'] );

		// Update Blog settings
		$new_instance['blog_section_title']      = strip_tags( $new_instance['blog_section_title'] );
		$new_instance['blog_item_count']         = strip_tags( $new_instance['blog_item_count'] );
		return $new_instance;
	}


	/**
	* Display the widget settings form
	*
	* @since 1.0.0
	*/
	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, $this->defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'portfolio_section_title' ); ?>"><?php _e( 'Portfolio Section Title:', 'radius' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'portfolio_section_title' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_section_title' ); ?>" type="text" value="<?php echo $instance['portfolio_section_title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'portfolio_item_count' ); ?>"><?php _e( 'Portfolio Item Count:', 'radius' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'portfolio_item_count' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_item_count' ); ?>" type="text" value="<?php echo $instance['portfolio_item_count']; ?>" />
		</p>
		<?php
	}

}


/**
* Registers the widget
*/
function a2_register_portfolio_blog_widget() {
	register_widget( 'a2_home_portfolio' );
}
add_action( 'widgets_init', 'a2_register_portfolio_blog_widget' );
