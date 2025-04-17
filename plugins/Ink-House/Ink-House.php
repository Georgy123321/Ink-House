<?php
/*
Plugin Name: 	Link-House
Plugin URI:		----
Description: 	plugin for cards
Version: 		1.0
Text Domain: 	Link-House
Domain Path:	/languages
License: 		GPLv2 or later
License URI:	http://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 5.8
Requires PHP: 	7.4
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class link_house {
	function __construct() {	
		// hooks
		add_action('init', array($this, 'register_post_types'));		
		add_action('init', array($this, 'create_taxonomy'));
	}

	// Post Types Start
	function register_post_types() {
		register_post_type('reproductions', [
			'label'  => 'Reproductions',
			'labels' => [
				'name'               => 'Reproductions',
				'singular_name'      => 'Reproduction',
				'add_new'            => 'Add New',
				'add_new_item'       => 'Add New Cards',
				'edit_item'          => 'Edit',
				'new_item'           => 'Add New Cards',
				'view_item'          => 'View Cards',
				'search_items'       => 'Search',
				'not_found'          => 'Not Found',
				'not_found_in_trash' => 'Not Found In Trash',
				'menu_name'          => 'Reproductions',
			],
			'public'             => true,
			'show_in_menu'       => true,
			'show_in_rest' 		 => true,
			'menu_position'      => 6,
			'menu_icon'          => 'dashicons-images-alt2',
			'hierarchical'       => false,
			'supports'           => ['title', 'excerpt', 'thumbnail'],
			'has_archive'        => true,
			'rewrite'            => true,
			'query_var'          => true,
		]);
	}
	// Post Types End

	// Taxonomies Start
	function create_taxonomy() {
		register_taxonomy('reproductions_category', ['reproductions'], [
			'label'         => '',
			'labels'        => [
				'name'              => 'Category',
				'singular_name'     => 'Category',
				'search_items'      => 'Search Category',
				'all_items'         => 'Category',
				'view_item'         => 'View Category',
				'parent_item'       => 'Parent Category',
				'parent_item_colon' => 'Parent Category:',
				'edit_item'         => 'Edit Category',
				'update_item'       => 'Update Category',
				'add_new_item'      => 'Add New Category',
				'new_item_name'     => 'New Category Name',
				'menu_name'         => 'Category',
				'back_to_items'     => '← Back to Category',
			],
			'public'        => true,
			'hierarchical'  => true,
			'rewrite'       => true,
			'show_in_rest'  => true,

		]);
	}
	// Taxonomies End
}

if(class_exists('link_house')){
	new link_house();
}
