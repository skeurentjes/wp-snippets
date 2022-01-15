<?php
function create_snippet_posttype() {

    $labels = array(
        'name'                => _x( 'Snippet', 'Post Type General Name', 'sk' ),
        'singular_name'       => _x( 'Snippet', 'Post Type Singular Name', 'sk' ),
        'menu_name'           => __( 'Snippets', 'sk' ),
        'parent_item_colon'   => __( 'Parent Snippet', 'sk' ),
        'all_items'           => __( 'All Snippets', 'sk' ),
        'view_item'           => __( 'View Snippet', 'sk' ),
        'add_new_item'        => __( 'Add New Snippet', 'sk' ),
        'add_new'             => __( 'Add Snippet', 'sk' ),
        'edit_item'           => __( 'Edit Snippet', 'sk' ),
        'update_item'         => __( 'Update Snippet', 'sk' ),
        'search_items'        => __( 'Search Snippet', 'sk' ),
        'not_found'           => __( 'Not Found', 'sk' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'sk' ),
    );

    $args = array(
        'label'               => __( 'snippet', 'sk' ),
        'description'         => __( 'snippet', 'sk' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'snippet category', 'post_tag' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-media-code'
 
    );
 
    register_post_type( 'snippet', $args );
    register_taxonomy_for_object_type( 'snippet', 'post' );
}

add_action( 'init', 'create_snippet_posttype' );


function create_snippet_category() {
    $labels = array(
        'name' => _x( 'Snippet Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Snippet Categories', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Snippet Categories' ),
        'all_items' => __( 'All Snippet Categories' ),
        'parent_item' => __( 'Parent Snippet Category' ),
        'parent_item_colon' => __( 'Parent Snippet Category:' ),
        'edit_item' => __( 'Edit Snippet Category' ), 
        'update_item' => __( 'Update Snippet Category' ),
        'add_new_item' => __( 'Add New Snippet Category' ),
        'new_item_name' => __( 'New Snippet Category Name' ),
        'menu_name' => __( 'Snippet Categories' ),
    );    

    // Now register the taxonomy
    register_taxonomy('snippet_categories',array('snippet'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'snippet_categories' ),
    ));

}
add_action( 'init', 'create_snippet_category', 0 );