<?php 
/*Register sidebar*/
add_action('widgets_init','sidebar_widget');
function sidebar_widget() {
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
    ));
	if (get_option('chameleon_footer_widgets') == 'on' ) {
		register_sidebar(array(
			'name' => 'Footer',
			'id' => 'footer',
			'before_widget' => '<div id="%1$s" class="widget col-md-3 col-sm-6 col-xs-12 %2$s">',
			'after_widget' => '</div> <!-- end .widget -->',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
	}
}
?>