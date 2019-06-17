<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'single' );

				if ( is_singular( 'attachment' ) ) {
					// Parent post navigation.
					the_post_navigation(
						array(
							/* translators: %s: parent post link */
							'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentynineteen' ), '%title' ),
						)
					);
				} elseif ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					
					# Use special labels for post links in 'performances' category
					$af_next_post_label = __( 'Next Post', 'twentynineteen' );
					$af_prev_post_label = __( 'Previous Post', 'twentynineteen' );
					$af_is_performance = FALSE;
					foreach (get_the_category() as $category) {
						$af_is_performance = $category->slug == 'performances';
						if ($af_is_performance) { break; }
					}
					if ($af_is_performance) {
						$af_next_post_label = "Nächster Auftritt";
						$af_prev_post_label = "Vorheriger Auftritt";
					}
					
					the_post_navigation(
						array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . $af_next_post_label . '</span> ' .
								'<span class="screen-reader-text">' . "$af_next_post_label:" . '</span> <br/>' .
								'<span class="post-title">%title</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . $af_prev_post_label . '</span> ' .
								'<span class="screen-reader-text">' . "$af_prev_post_label:" . '</span> <br/>' .
								'<span class="post-title">%title</span>',
							'in_same_term' => TRUE,
						)
					);
				}

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
