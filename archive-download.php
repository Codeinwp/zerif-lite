<?php
/**
 * The template for displaying Archive pages.
 */
get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->
<?php zerif_after_header_trigger(); ?>
<div id="content" class="site-content">

<div class="container">

	<?php zerif_before_archive_content_trigger(); ?>

	<div class="content-left-wrap col-md-12">

		<?php zerif_top_archive_content_trigger(); ?>

		<div id="primary" class="content-area">

			<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">

					<?php
					/* Title */
					zerif_page_header_title_archive_trigger();

					/* Optional term description */
					zerif_page_term_description_archive_trigger();
					?>

				</header><!-- .page-header -->

				<?php while ( have_posts() ) : the_post();

						/* Include the Post-Format-specific template for the content.

						 * If you want to override this in a child theme, then include a file

						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.

						 */

						get_template_part( 'content', 'archive-download' );

					endwhile;

					echo get_the_posts_navigation( array( 'next_text' => sprintf( __( 'Newer posts %s','zerif-lite' ), '<span class="meta-nav">&rarr;</span>' ), 'prev_text' => sprintf( __( '%s Older posts', 'zerif-lite' ) , '<span class="meta-nav">&larr;</span>' ) ) );

				else:

					get_template_part( 'content', 'none' );

				endif; ?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<?php zerif_bottom_archive_content_trigger(); ?>

	</div><!-- .content-left-wrap -->

	<?php zerif_after_archive_content_trigger(); ?>

</div><!-- .container -->

<?php get_footer(); ?>