<?php
if (!isset($content_width)) {
  $content_width = 1240;
}

if (function_exists('add_theme_support')) {
  add_theme_support( 'automatic-feed-links');
}

if (function_exists('register_sidebar')) {
  register_sidebar(array(
    'name' => __( 'Widgets', 'simplest' ),
    'id' => 'widgets',
    'before_widget' => '<div class="m-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="a-title m-widget__title">',
    'after_title' => '</h4>'
  ));
}

add_theme_support( 'post-thumbnails' );
add_theme_support('align-wide');
?>
