<?php

namespace TrueHttpNetworks;

class CustomPostTypes{
    
    function registerNetworksCpt() {

        $labels = array(
            'name'                  => _x( 'Networks', 'Post Type General Name', 'true-http-networks' ),
            'singular_name'         => _x( 'Network', 'Post Type Singular Name', 'true-http-networks' ),
            'menu_name'             => __( 'Networks', 'true-http-networks' ),
            'name_admin_bar'        => __( 'Network', 'true-http-networks' ),
            'archives'              => __( 'Network Archives', 'true-http-networks' ),
            'attributes'            => __( 'Network Attributes', 'true-http-networks' ),
            'parent_item_colon'     => __( 'Parent Network:', 'true-http-networks' ),
            'all_items'             => __( 'All Networks', 'true-http-networks' ),
            'add_new_item'          => __( 'Add New Network', 'true-http-networks' ),
            'add_new'               => __( 'Add New', 'true-http-networks' ),
            'new_item'              => __( 'New Network', 'true-http-networks' ),
            'edit_item'             => __( 'Edit Network', 'true-http-networks' ),
            'update_item'           => __( 'Update Network', 'true-http-networks' ),
            'view_item'             => __( 'View Network', 'true-http-networks' ),
            'view_items'            => __( 'View Networks', 'true-http-networks' ),
            'search_items'          => __( 'Search Network', 'true-http-networks' ),
            'not_found'             => __( 'Not found', 'true-http-networks' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'true-http-networks' ),
            'featured_image'        => __( 'Featured Image', 'true-http-networks' ),
            'set_featured_image'    => __( 'Set featured image', 'true-http-networks' ),
            'remove_featured_image' => __( 'Remove featured image', 'true-http-networks' ),
            'use_featured_image'    => __( 'Use as featured image', 'true-http-networks' ),
            'insert_into_item'      => __( 'Insert into item', 'true-http-networks' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'true-http-networks' ),
            'items_list'            => __( 'Items list', 'true-http-networks' ),
            'items_list_navigation' => __( 'Items list navigation', 'true-http-networks' ),
            'filter_items_list'     => __( 'Filter items list', 'true-http-networks' ),
        );
        $args = array(
            'label'                 => __( 'Network', 'true-http-networks' ),
            'description'           => __( 'A true HTTP network', 'true-http-networks' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => true,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'network', $args );
        
    }
    
    // Register Custom Post Type
    public function registerMessagesCpt() {
    
    $labels = array(
        'name'                  => _x( 'Messages', 'Post Type General Name', 'true-http-networks' ),
        'singular_name'         => _x( 'Message', 'Post Type Singular Name', 'true-http-networks' ),
        'menu_name'             => __( 'Messages', 'true-http-networks' ),
        'name_admin_bar'        => __( 'Message', 'true-http-networks' ),
        'archives'              => __( 'Message Archives', 'true-http-networks' ),
        'attributes'            => __( 'Message Attributes', 'true-http-networks' ),
        'parent_item_colon'     => __( 'Parent Message:', 'true-http-networks' ),
        'all_items'             => __( 'All Messages', 'true-http-networks' ),
        'add_new_item'          => __( 'Add New Message', 'true-http-networks' ),
        'add_new'               => __( 'Add New', 'true-http-networks' ),
        'new_item'              => __( 'New Message', 'true-http-networks' ),
        'edit_item'             => __( 'Edit Message', 'true-http-networks' ),
        'update_item'           => __( 'Update Message', 'true-http-networks' ),
        'view_item'             => __( 'View Message', 'true-http-networks' ),
        'view_items'            => __( 'View Messages', 'true-http-networks' ),
        'search_items'          => __( 'Search Message', 'true-http-networks' ),
        'not_found'             => __( 'Not found', 'true-http-networks' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'true-http-networks' ),
        'featured_image'        => __( 'Featured Image', 'true-http-networks' ),
        'set_featured_image'    => __( 'Set featured image', 'true-http-networks' ),
        'remove_featured_image' => __( 'Remove featured image', 'true-http-networks' ),
        'use_featured_image'    => __( 'Use as featured image', 'true-http-networks' ),
        'insert_into_item'      => __( 'Insert into item', 'true-http-networks' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'true-http-networks' ),
        'items_list'            => __( 'Items list', 'true-http-networks' ),
        'items_list_navigation' => __( 'Items list navigation', 'true-http-networks' ),
        'filter_items_list'     => __( 'Filter items list', 'true-http-networks' ),
    );
    $args = array(
        'label'                 => __( 'Message', 'true-http-networks' ),
        'description'           => __( 'A message', 'true-http-networks' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'message', $args );
    
    }
}
