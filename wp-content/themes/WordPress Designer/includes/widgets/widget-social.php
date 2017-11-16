<?php class et_social_widget_icons extends WP_Widget {
    function __construct(){
		$widget_ops = array('description' => 'Displays Theme Option Social Media Icons');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::__construct(false,$name='Social Media Icons',$widget_ops,$control_ops);
    }
  	/* Displays the Widget in the front-end */
    function widget($args, $instance) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : esc_html( $instance['title'] ) );
		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title; 
?>

<?php echo do_shortcode('[social-media]'); ?>

<?php echo $after_widget;	}
  /*Saves the settings. */
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		return $instance;
	}
  /*Creates the form for the widget in the back-end. */
    function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title'=>'Social Media', ) );
		$title = esc_attr( $instance['title'] );
		# Desc
		echo '<p><span>To edit social media icons go to <a href="themes.php?page=core_functions.php#social-media">Theme Option</a></span></p>';
		# Title
		echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
	}
}// end et_social_widget_icons class


add_action('widgets_init', 'et_social_widget');
function et_social_widget() {
  register_widget('et_social_widget_icons');
}
