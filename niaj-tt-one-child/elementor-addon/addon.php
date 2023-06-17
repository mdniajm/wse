<?php
function register_hello_world_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/hello-world-widget-1.php' );
	

	$widgets_manager->register( new \Elementor_Hello_World_Widget_1() );
	

}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );