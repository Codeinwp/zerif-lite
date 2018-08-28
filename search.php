<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package zerif-lite
 */
get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->
<?php zerif_after_header_trigger(); ?>
<div id="content" class="site-content">

	<div class="container">

		<div class="content-left-wrap col-md-9">

			<div id="primary" class="content-area">

				<main id="main" class="site-main">
					<?php zerif_before_search_trigger(); ?>
					<?php if ( have_posts() ) { ?>

						<header class="page-header">

							<h1 class="page-title">
							<?php
							/* translators: Search query */
								printf( __( 'Search Results for: %s', 'zerif-lite' ), '<span>' . get_search_query() . '</span>' );
							?>
								</h1>

						</header><!-- .page-header -->

						<?php
						while ( have_posts() ) {
							the_post();

							get_template_part( 'content', get_post_format() );

						}

						echo get_the_posts_navigation(
							array(
								/* translators: Newer posts navigation arrow */
								'next_text' => sprintf( __( 'Newer posts %s', 'zerif-lite' ), '<span class="meta-nav">&rarr;</span>' ),
								/* translators: Older posts navigation arrow */
								'prev_text' => sprintf( __( '%s Older posts', 'zerif-lite' ), '<span class="meta-nav">&larr;</span>' ),
							)
						);

} else {
	get_template_part( 'content', 'none' );
}

					zerif_after_search_trigger();
?>
				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .content-left-wrap -->

		<?php zerif_sidebar_trigger(); ?>

	</div><!-- .container -->

<?php get_footer(); ?>
