<?php get_header(); ?>
	<main class="a-container a-container--small a-container--gutter" role="main">
		<section>
			<?php if (have_posts()): ?>
				<?php while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php if ( has_post_thumbnail()) : ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
						<?php endif; ?>
				
						<h1 class="a-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h1>

						<div class="m-meta">
							<span class="m-meta__item m-meta__item--date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
							<span class="m-meta__item m-meta__item--author"><?php _e( 'Published by', 'sk' ); ?> <?php the_author_posts_link(); ?></span>
							<span class="m-meta__item m-meta__item--comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'sk' ), __( '1 Comment', 'sk' ), __( '% Comments', 'sk' )); ?></span>
						</div>
						<?php the_content(); // Dynamic Content ?>
						<?php the_tags( __( 'Tags: ', 'sk' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
						<p><?php _e( 'Categorised in: ', 'sk' ); the_category(', '); // Separated by commas ?></p>
						<p><?php _e( 'This post was written by ', 'sk' ); the_author(); ?></p>
						<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
						<?php comments_template(); ?>
					</article>
				<?php endwhile; ?>
			<?php else: ?>
				<article>
					<h1 class="a-title"><?php _e( 'Sorry, nothing to display.', 'sk' ); ?></h1>
				</article>
			<?php endif; ?>
		</section>
	</main>

<?php get_footer(); ?>
