<?php
function wpb_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

function my_mce_before_init_insert_formats( $settings ) {
	$style_formats = array(
		array(
			'title'    => 'HTML',
			'selector' => 'pre',
			'classes'  => 'm-pre m-pre--html',
		),
		array(
			'title'    => 'CSS',
			'selector' => 'pre',
			'classes'  => 'm-pre m-pre--css',
		),
		array(
			'title'    => 'JavaScript',
			'selector' => 'pre',
			'classes'  => 'm-pre m-pre--js',
		),
	);
	$settings['style_formats'] = json_encode( $style_formats );
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );
