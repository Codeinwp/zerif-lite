<?php

/**

 * @package zerif

 */

?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! is_search() ) : ?>

		<?php if ( has_post_thumbnail()) : ?>

		<div class="post-img-wrap">

			 	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >

				<?php the_post_thumbnail("post-thumbnail"); ?>

				</a>

		</div>

		<div class="listpost-content-wrap">

		<?php else: ?>

		<div class="listpost-content-wrap-full">

		<?php endif; ?>

	<?php else:  ?>

			<div class="listpost-content-wrap-full">

	<?php endif; ?>

	<div class="list-post-top">

	<header class="entry-header">

		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>



		<?php if ( 'post' == get_post_type() ) : ?>

		<div class="entry-meta">

			<?php zerif_posted_on(); ?>

		</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->



	<?php if ( is_search() ) : // Only display Excerpts for Search ?>

	<div class="entry-summary">

		<?php the_excerpt(); ?>

	</div><!-- .entry-summary -->

	<?php else : ?>

	<div class="entry-content">

		<?php 

			the_excerpt()

			//the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'zerif' ) ); 

		?>

		<?php

			wp_link_pages( array(

				'before' => '<div class="page-links">' . __( 'Pages:', 'zerif' ),

				'after'  => '</div>',

			) );

		?>

	</div><!-- .entry-content -->

	<?php endif; ?>

	</div><!-- .list-post-top -->

	<footer class="entry-footer">

		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>

			<?php

				/* translators: used between list items, there is a space after the comma */

				$categories_list = get_the_category_list( __( ', ', 'zerif' ) );

				if ( $categories_list && zerif_categorized_blog() ) :

			?>

			<span class="cat-links">

				<?php printf( __( 'Posted in %1$s', 'zerif' ), $categories_list ); ?>

			</span>

			<?php endif; // End if categories ?>



			<?php

				/* translators: used between list items, there is a space after the comma */

				$tags_list = get_the_tag_list( '', __( ', ', 'zerif' ) );

				if ( $tags_list ) :

			?>

			<span class="tags-links">

				<?php printf( __( 'Tagged %1$s', 'zerif' ), $tags_list ); ?>

			</span>

			<?php endif; // End if $tags_list ?>

		<?php endif; // End if 'post' == get_post_type() ?>



		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>

		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'zerif' ), __( '1 Comment', 'zerif' ), __( '% Comments', 'zerif' ) ); ?></span>

		<?php endif; ?>



		<?php edit_post_link( __( 'Edit', 'zerif' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</div><!-- .listpost-content-wrap -->

</article><!-- #post-## -->







