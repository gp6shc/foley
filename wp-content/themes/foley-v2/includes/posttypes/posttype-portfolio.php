<?php

function create_post_type_portfolio(){
  $labels = array(
    'name' => __( 'Gallery', 'stag'),
    'singular_name' => __( 'Gallery' , 'stag'),
    'add_new' => _x('Add New Item', 'stag', 'stag'),
    'add_new_item' => __('Add New Media Gallery Item', 'stag'),
    'edit_item' => __('Edit Gallery', 'stag'),
    'new_item' => __('New Gallery', 'stag'),
    'view_item' => __('View Gallery', 'stag'),
    'search_items' => __('Search Gallery', 'stag'),
    'not_found' =>  __('No galleries found', 'stag'),
    'not_found_in_trash' => __('No galleries found in Trash', 'stag'),
    'parent_item_colon' => ''
    );

    $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'publicly_queryable' => true,
    'rewrite' => array('slug' => __( 'gallery', 'stag' )),
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','thumbnail'),
    );

    register_post_type(__( 'portfolio', 'stag' ),$args);
}

function portfolio_build_taxonomies(){
  register_taxonomy(__( "skill", 'stag' ), array(__( "portfolio", 'stag' )), array("hierarchical" => true, "label" => __( "Categories", 'stag' ), "singular_label" => __( "Categories", 'stag' ), "rewrite" => array('slug' => 'category', 'hierarchical' => true)));
}

function portfolio_edit_columns($columns){

        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => __( 'Portfolio Title', 'stag' ),
            "type" => __( 'Skills', 'stag' ),
            "date" => __('Date', 'stag')
        );

        return $columns;
}


function portfolio_custom_columns($column){
    global $post;
    switch ($column){
        case __( 'type', 'stag' ):
        echo get_the_term_list($post->ID, __( 'skill', 'stag' ), '', ', ','');
        break;
    }
}

add_action('init', 'create_post_type_portfolio');
add_action('init', 'portfolio_build_taxonomies', 0);
add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");
add_action("manage_posts_custom_column",  "portfolio_custom_columns");