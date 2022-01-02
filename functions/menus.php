<?php // Add menus's
if (function_exists('register_nav_menu')) {
  register_nav_menu( 'menu', 'Menu' );
}

function wpb_custom_new_menu() {
  register_nav_menu('footer-menu',__( 'Footer' ));
}
add_action( 'init', 'wpb_custom_new_menu' );
?>
