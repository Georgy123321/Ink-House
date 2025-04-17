<?php
/**
 * Plugin Name: Elementor Ink-House
 * Description: Simple hello world widgets for Elementor.
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-addon
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */

function register_InkHouse_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/main-widgets.php' );
	require_once( __DIR__ . '/widgets/reproductions-widgets.php' );
	require_once( __DIR__ . '/widgets/new-widgets.php' );
	require_once( __DIR__ . '/widgets/team-widgets.php' );

	$widgets_manager->register( new \Elementor_Main_Widget() );
	$widgets_manager->register( new \Elementor_Reproductions_Widget() );
	$widgets_manager->register( new \Elementor_New_Widget() );
	$widgets_manager->register( new \Elementor_Team_Widget() );

}
add_action( 'elementor/widgets/register', 'register_InkHouse_widget' );

// Add New Category
add_action( 'elementor/elements/categories_registered', function( $elements_manager ) {
	$elements_manager->add_category(
		'Ink-House',
		[
			'title' => __('Ink-House Widgets', 'elementor-Ink-House'),
			'icon' => 'fa fa-plug',
		]
		);
} );