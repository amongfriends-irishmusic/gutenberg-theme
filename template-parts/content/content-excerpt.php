<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_sticky() && is_home() && ! is_paged() ) {
			printf( '<span class="sticky-post">%s</span>', _x( 'Featured', 'post', 'twentynineteen' ) );
		}
		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		?>
	</header><!-- .entry-header -->

	<?php twentynineteen_post_thumbnail(); ?>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		# Show an explicit link to the post content unless the excerpt
		# and the content are identical. In particular, they are treated
		# as identical if they are both empty or if there is just a single
		# paragraph in the Block editor, without any hyperlinks or other
		# child elements.
		$af_post_content = get_post()->post_content;
		$af_post_content = preg_replace('{^\s*<!--\s+wp:paragraph\s+-->\s*<p>\s*}i', '', $af_post_content);
		$af_post_content = preg_replace('{\s*</p>\s*<!--\s+/wp:paragraph\s+-->\s*$}i', '', $af_post_content);
		$af_excerpt_more = $af_post_content != trim(get_the_excerpt());
		if ($af_excerpt_more) {
			?><a href="<?php echo esc_url( get_permalink() ); ?>">➡️ mehr Informationen …</a><?php
		}
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
