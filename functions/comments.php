<?php
add_filter( 'comment_form_fields', 'custom_comment_field' );
function custom_comment_field( $fields ) {
    // What fields you want to control.
    $comment_field = $fields['author'];
    $comment_field = $fields['email'];
    $comment_field = $fields['comment'];
    $comment_field = $fields['cookies'];
 
    // The fields you want to unset (remove).
    unset($fields['author']);
    unset($fields['email']);
    unset($fields['url']);
    unset($fields['comment']);
    unset($fields['cookies']);
 
    // Display the fields to your own taste.
    // The order in which you place them will determine in what order they are displayed.
    $fields['author'] = '<p class="m-comment-form__author"><label for="author">Name <span class="required">*</span></label><input type="text" id="author" name="author" require="required" placeholder="Name"></p>';
    $fields['email'] = '<p class="m-comment-form__email"><label for="email">Email <span class="required">*</span></label><input type="text" id="email" name="email" require="required" placeholder="Email"></p>';
    $fields['comment'] = '<p class="m-comment-form__comment"><label for="comment">Comment <span class="required">*</span></label><textarea id="comment" name="comment" required="required" placeholder="Comment"></textarea></p>';
    // $fields['cookies'] = '<p class="m-comment-form__consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"><label for="wp-comment-cookies-consent">Save details for future comments?</label></p>';
    return $fields;
}
