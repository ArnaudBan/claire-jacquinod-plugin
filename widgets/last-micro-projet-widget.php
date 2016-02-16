<?php
/**
 * Widget to display the post of the given post type
 *
 * Date: 30/01/2016
 */


/**
 * Register the widget for use in Appearance -> Widgets
 */
add_action( 'widgets_init', 'cj_widget_recent_post_type' );

function cj_widget_recent_post_type() {
	register_widget( 'CJ_Recent_Post_Type' );
}

/**
 * Class CJ_Last_Micro_Projects_Widget
 */
class CJ_Recent_Post_Type extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'cj_recent_post_type',
			__( 'Recent Post Type', 'clairejacquinod' ),
			array(
				'classname' => 'cj_recent_post_type',
				'description' => __( 'Display the lastest post from the selected post type', 'clairejacquinod' )
			)
		);

	}


	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {


		$instance = wp_parse_args($instance, array(
			'title'     => '',
			'post_type' => 'micro-projet'
		));

		echo $args['before_widget'];

		if ( $instance['title'] ) {
			/** This filter is documented in core/src/wp-includes/default-widgets.php */
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}


		// Show last micro project
		$micro_project_query_args = array(
			'post_type' => $instance['post_type'],
			'posts_per_page' => 5,
		);

		if( is_singular() ){

			$micro_project_query_args['post__not_in'] = array( get_the_ID() );
		}
	

		$micro_project_query = new WP_Query( $micro_project_query_args );

		if( $micro_project_query->have_posts() ){

			echo '<ul>';

			while( $micro_project_query->have_posts() ){

				$micro_project_query->the_post();

				echo '<li>';
				echo '<a href="'. get_the_permalink() .'">';
				the_post_thumbnail('large');
				the_title('<h3>', '</h3>');
				echo '</a>';
				echo '</li>';


			}
			echo '</ul>';

			wp_reset_postdata();
		}


		echo $args['after_widget'];
	}


	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance                  = array();
		$instance['title']         = sanitize_text_field( $new_instance['title'] );
		$instance['post_type']     = sanitize_text_field( $new_instance['post_type'] );

		return $instance;
	}


	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$defaults = array(
			'title'        => esc_html__( 'Recent Post', 'clairejacquinod' ),
			'post_type'    => 'micro-projet'
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title'  ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'post_type' ); ?>"><?php esc_html_e( 'Post type' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>">

				<?php
				// Get all public post type
				$post_types = get_post_types( array( 'public' => true ), 'objects' );

				foreach( $post_types as $type ){

					$selected = selected( $instance['post_type'], $type->name, false);

					echo "<option value='{$type->name}' {$selected}>{$type->label}</option>";
				}
				?>
			</select>
		</p>

		<?php
	}
}
