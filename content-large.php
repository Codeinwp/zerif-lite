<?php

/**

 * @package zerif

 */

?>



<article class="large-container" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! is_search() ) : ?>

		<?php if ( has_post_thumbnail()) : ?>

		<div class="post-img-wrap-large">

			 	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >

					<?php 
						$image_id = get_post_thumbnail_id();
						$image_url_big = wp_get_attachment_image_src($image_id,'post-thumbnail-large', true);
						$image_url_tablet = wp_get_attachment_image_src($image_id,'post-thumbnail-large-table', true);
						$image_url_mobile = wp_get_attachment_image_src($image_id,'post-thumbnail-large-mobile', true);
					?>

			 		<picture>
						<source media="(max-width: 600px)" srcset="<?php echo $image_url_mobile[0]; ?>">
						<source media="(max-width: 768px)" srcset="<?php echo $image_url_tablet[0]; ?>">
						<img src="<?php echo $image_url_big[0]; ?>" alt="<?php the_title_attribute(); ?>">
					</picture>

				</a>

		</div>

		<div class="listpost-content-wrap-large">

		<?php else: ?>

		<div class="listpost-content-wrap-full">

		<?php endif; ?>

	<?php else:  ?>

			<div class="listpost-content-wrap-full">

	<?php endif; ?>

	<div class="list-post-top">

	<header class="entry-header">

		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>



		

	</header><!-- .entry-header -->



	<?php if ( is_search() ) : /* Only display Excerpts for Search */ ?>

	<div class="entry-summary">

		<?php the_excerpt(); ?>

	</div><!-- .entry-summary -->

	<?php else : ?>

	<div class="entry-content">

		<?php 

			the_excerpt();

			wp_link_pages( array(

				'before' => '<div class="page-links">' . __( 'Pages:', 'zerif' ),

				'after'  => '</div>',

			) );

		?>

	</div><!-- .entry-content -->

	<?php endif; ?>

	</div><!-- .list-post-top -->

	<footer class="entry-footer-large">


		<?php if ( 'post' == get_post_type() ) : ?>

		<div class="entry-meta-large">

			<?php zerif_posted_on(); ?>

		</div><!-- .entry-meta -->

		<?php endif; ?>


		<div class="entry-footer-large-left">

			<?php if ( 'post' == get_post_type() ) : /* Hide category and tag text for pages on Search */ ?>

				<?php

					/* translators: used between list items, there is a space after the comma */

					$categories_list = get_the_category_list( __( ', ', 'zerif' ) );

					if ( $categories_list && zerif_categorized_blog() ) :

				?>

				<span class="cat-links">

					<?php printf( __( 'Posted in %1$s', 'zerif' ), $categories_list ); ?>

				</span>

				<?php endif; ?>



				<?php

					/* translators: used between list items, there is a space after the comma */

					$tags_list = get_the_tag_list( '', __( ', ', 'zerif' ) );

					if ( $tags_list ) :

				?>

				<span class="tags-links">

					<?php printf( __( 'Tagged %1$s', 'zerif' ), $tags_list ); ?>

				</span>

				<?php endif; /* End if $tags_list */ ?>

			<?php endif; /* End if 'post' == get_post_type() */ ?>
			
			
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>

			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'zerif' ), __( '1 Comment', 'zerif' ), __( '% Comments', 'zerif' ) ); ?></span>

			<?php endif; ?>
		
			<?php edit_post_link( __( 'Edit', 'zerif' ), '<span class="edit-link">', '</span>' ); ?>

		</div>

	</footer><!-- .entry-footer -->

</div><!-- .listpost-content-wrap -->

</article><!-- #post-## -->