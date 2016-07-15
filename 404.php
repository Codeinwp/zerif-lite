<?php
/**
 * The template for displaying 404 pages (Not Found).
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

					<article>

						<header class="entry-header">

							<?php zerif_404_title_trigger(); ?>

						</header><!-- .entry-header -->

						<div class="entry-content">

							<?php zerif_404_content_trigger(); ?>

						</div><!-- .entry-content -->

					</article><!-- #post-## -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div>

		<div class="sidebar-wrap col-md-3 content-left-wrap">

			<?php get_sidebar(); ?>

		</div><!-- .sidebar-wrap -->

	</div><!-- .container -->

<?php get_footer(); ?>