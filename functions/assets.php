<?php
// Theme styles and scriptss
function add_theme_scripts() {
  wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/dist/css/style.min.css', false, '1.1', 'all');
  wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/dist/main.js', array ( 'jquery' ), 1.1, true);
  // wp_enqueue_script( 'theme-vue', get_template_directory_uri() . '/dist/vue.js', array ( 'jquery' ), 1.1, true);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

function add_admin_scripts() {
  wp_enqueue_media();  
  wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/dist/css/admin.min.css', false, '1.1', 'all');
  wp_enqueue_script( 'admin-script', get_template_directory_uri() . '/dist/admin.js', array ( 'jquery' ), 1.1, true);
}

if (is_admin()) :
  add_action('admin_head', 'add_admin_scripts');
endif;
?>
