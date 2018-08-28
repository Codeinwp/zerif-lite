<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package zerif-lite
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<span class="date updated published"><?php the_time( get_option( 'date_format' ) ); ?></span>
		<span class="vcard author byline"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="fn"><?php the_author(); ?></a></span>

		<?php zerif_page_header_trigger(); ?>

	</header><!-- .entry-header -->

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
