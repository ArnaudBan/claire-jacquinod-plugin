<?php
/**
 * Widget to display the last micro projects
 *
 * Date: 30/01/2016
 */


/**
 * Register the widget for use in Appearance -> Widgets
 */
add_action( 'widgets_init', 'cj_last_micro_projects_init' );

function cj_last_micro_projects_init() {
	register_widget( 'CJ_Last_Micro_Projects_Widget' );
}

/**
 * Class CJ_Last_Micro_Projects_Widget
 */
class CJ_Last_Micro_Projects_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'last_micro_projects',
			__( 'Last Micro Projects', 'clairejacquinod' ),
			array(
				'classname' => 'last_micro_projects',
				'description' => __( 'Display the last micro projects', 'clairejacquinod' )
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


		echo $args['before_widget'];

		if ( $instance['title'] ) {
			/** This filter is documented in core/src/wp-includes/default-widgets.php */
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}


		// Show last micro project
		$micro_project_query = new WP_Query( array(
			'post_type' => 'micro-projet',
			'posts_per_page' => 5,
		));

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
			'title'        => esc_html__( 'Last Micro Projects', 'clairejacquinod' )
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'jetpack' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<?php
	}
}
