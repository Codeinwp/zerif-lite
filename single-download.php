<?php
/**
 * The Template for displaying all single posts.
 *
 * @package zerif-lite
 */

get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->
<?php zerif_after_header_trigger(); ?>
<div id="content" class="site-content">
	<div class="container">
		<?php zerif_before_single_post_trigger(); ?>
		<div class="content-left-wrap col-md-12">
			<?php zerif_top_single_post_trigger(); ?>
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'content', 'single-download' );
					endwhile; // end of the loop.
					?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php zerif_bottom_single_post_trigger(); ?>
		</div><!-- .content-left-wrap -->
		<?php zerif_after_single_post_trigger(); ?>
	</div><!-- .container -->
<?php get_footer(); ?>
