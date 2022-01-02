<?php
function add_custom_sizes() {
    add_image_size( '1920x1080', 1920, 1080, true);
    add_image_size( '1600x1200', 1600, 1200, true);
    add_image_size( '360x640', 360, 640, true);
}
add_action('after_setup_theme','add_custom_sizes');
?> 
