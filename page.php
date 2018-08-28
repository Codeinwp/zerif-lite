<?php
/**
 * The template for displaying all pages.
 *
 * @package zerif-lite
 */
get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<?php
	zerif_after_header_trigger();
	$zerif_change_to_full_width = get_theme_mod( 'zerif_change_to_full_width' );
?>

<div id="content" class="site-content">

	<div class="container">

		<?php zerif_before_page_content_trigger(); ?>
		<?php
		if ( ( function_exists( 'is_cart' ) && is_cart() ) || ( function_exists( 'is_account_page' ) && is_account_page() ) || ( function_exists( 'is_checkout' ) && is_checkout() ) || ! empty( $zerif_change_to_full_width ) ) {
			echo '<div class="content-left-wrap col-md-12">';
		} else {
			echo '<div class="content-left-wrap col-md-9">';
		}
		?>
		<?php zerif_top_page_content_trigger(); ?>
		<div id="primary" class="content-area">

			<main itemscope itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage" id="main" class="site-main">

				<?php
				while ( have_posts() ) :
					the_post();

						get_template_part( 'content', 'page' );

					if ( comments_open() || '0' != get_comments_number() ) :

						comments_template();

						endif;

					endwhile;
				?>

			</main><!-- #main -->

		</div><!-- #primary -->

	<?php
	if ( ( function_exists( 'is_cart' ) && is_cart() ) || ( function_exists( 'is_account_page' ) && is_account_page() ) || ( function_exists( 'is_checkout' ) && is_checkout() ) || ! empty( $zerif_change_to_full_width ) ) {
		zerif_bottom_page_content_trigger();
		echo '</div>';
		zerif_after_page_content_trigger();
	} else {
		zerif_bottom_page_content_trigger();
		echo '</div>';
		zerif_after_page_content_trigger();
		zerif_sidebar_trigger();
	}
	?>
	</div><!-- .container -->

<?php get_footer(); ?>
