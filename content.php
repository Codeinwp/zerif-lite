<?php
/**
 * The default template used for displaying page content
 *
 * @package zerif-lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemtype="http://schema.org/BlogPosting" itemtype="http://schema.org/BlogPosting">
	<?php
	if ( ! is_search() ) {

		$post_thumbnail_url = get_the_post_thumbnail( get_the_ID(), 'zerif-post-thumbnail' );

		if ( ! empty( $post_thumbnail_url ) ) {

			echo '<div class="post-img-wrap">';

				echo '<a href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute( 'echo=0' ) . '" >';

					echo $post_thumbnail_url;

				echo '</a>';

			echo '</div>';

			echo '<div class="listpost-content-wrap">';
		} else {

			echo '<div class="listpost-content-wrap-full">';
		}
	} else {
		echo '<div class="listpost-content-wrap-full">';
	}
	?>

	<div class="list-post-top">

	<header class="entry-header">

		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>

		<div class="entry-meta">

			<?php zerif_posted_on(); ?>

		</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php
	if ( is_search() ) {

		echo '<div class="entry-summary">';

		the_excerpt();
	} else {

		echo '<div class="entry-content">';

		$ismore = ! empty( $post->post_content ) ? strpos( $post->post_content, '<!--more-->' ) : '';

		if ( ! empty( $ismore ) ) {
			the_content( sprintf( esc_html__( '[&hellip;]', 'zerif-lite' ), '<span class="screen-reader-text">' . esc_html__( 'about ', 'zerif-lite' ) . get_the_title() . '</span>' ) );
		} else {
			the_excerpt();
		}

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'zerif-lite' ),
				'after'  => '</div>',
			)
		);
	}
	?>

	<footer class="entry-footer">

		<?php
		if ( 'post' == get_post_type() ) { // Hide category and tag text for pages on Search

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'zerif-lite' ) );

			if ( $categories_list && zerif_categorized_blog() ) {

				echo '<span class="cat-links">';

				/* Translators: Categories list */
				printf( __( 'Posted in %1$s', 'zerif-lite' ), $categories_list );

				echo '</span>';

			} // End if categories

			/* translators: used between list items, there is a space after the comma */

			$tags_list = get_the_tag_list( '', __( ', ', 'zerif-lite' ) );

			if ( $tags_list ) {

				echo '<span class="tags-links">';

				/* translators: Tags list */
				printf( __( 'Tagged %1$s', 'zerif-lite' ), $tags_list );

				echo '</span>';

			}
		}

		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {

			echo '<span class="comments-link">';
				comments_popup_link( __( 'Leave a comment', 'zerif-lite' ), __( '1 Comment', 'zerif-lite' ), __( '% Comments', 'zerif-lite' ) );
			echo '</span>';

		}

		edit_post_link( __( 'Edit', 'zerif-lite' ), '<span class="edit-link">', '</span>' );
		?>

	</footer><!-- .entry-footer -->

	</div><!-- .entry-content --><!-- .entry-summary -->

	</div><!-- .list-post-top -->

</div><!-- .listpost-content-wrap -->

</article><!-- #post-## -->
