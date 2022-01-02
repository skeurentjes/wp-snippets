<?php
function snippets_endpoint( $request_data ) {
    $args = array(
        'post_type' => 'snippet',
        'posts_per_page' => -1,
        'numberofposts' => -1
    );

    $posts = get_posts( $args );
    // Todo: set advanced custom fields
    // foreach ($posts as $key => $post) {
    //     $post[$key]->acf = get_fields($post->ID);
    // }

    return $posts;
}

add_action( 'rest_api_init', function() {
    register_rest_route( 'snippets/v1',  'snippet', array(
        'methods' => 'GET',
        'callback' => 'snippets_endpoint'
    ) );
});