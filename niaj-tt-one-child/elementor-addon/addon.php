<?php
function register_hello_world_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets.php' );
	

	$widgets_manager->register( new \Niaj_Team_Members() );
	

}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );