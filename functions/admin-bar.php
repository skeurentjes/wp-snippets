<?php
// Admin bar
function remove_admin_bar() {
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  } else {
    show_admin_bar(false);
  }
}
add_action('after_setup_theme', 'remove_admin_bar');
 ?>
