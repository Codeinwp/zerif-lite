<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package zerif-lite
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<?php
			the_content(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'zerif-lite' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'zerif-lite' ),
					'after'  => '</div>',
				)
			);

		?>

	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'zerif-lite' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>

</article><!-- #post-## -->
