<?php if ( $comments ) : ?>
  <div class="m-comments">
    <h3>Comments</h3>
    <?php wp_list_comments(); ?>
    <div class="m-pagination"><?php paginate_comments_links(); ?></div>
  </div>
<?php endif; ?>
<?php if ( comments_open() || pings_open() ) : ?>
  <?php
  $comments_args = array(
    'label_submit' => __( 'Send', 'sk' ),
    'title_reply' => '<h2 class="a-subtitle">' . __( 'Write a Reply or Comment', 'sk' ) . '</h2>',
    'comment_notes_after' => '',
    'comment_field' => '<p class="o-comments__comment"><label for="comment">' . _x( 'Comment', 'sk' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
    'class_container' => 'o-comments',
    'class_form' => 'o-comments_form m-comments-form',
    'class_submit' => 'a-btn a-btn--primary m-comments-form__submit',
  );
  comment_form( $comments_args );
  ?>
  <?php // comment_form( 'comment_notes_before=&comment_notes_after=' ); ?>
<?php elseif ( $comments ) : ?>
  <div class="o-comments__respond"><p class="o-comments__closed"><?= __('Comments closed', 'sk') ?></p></div>
<?php endif; ?>