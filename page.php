<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package zerif
 */

get_header(); ?>
<div class="clear"></div>
</header> <!-- / END HOME SECTION  -->

	<div id="content" class="site-content">
<div class="container">

<?php 	if( (function_exists('is_cart') && is_cart()) || (function_exists('is_account_page') && is_account_page()) || (function_exists('is_checkout') && is_checkout() ) ) {				echo '<div class="content-left-wrap col-md-12">';			}	else {			echo '<div class="content-left-wrap col-md-9">';			}	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php 	if( (function_exists('is_cart') && is_cart()) || (function_exists('is_account_page') && is_account_page()) || (function_exists('is_checkout') && is_checkout() ) ) {		echo '</div>';	}	else {		echo '</div>';		echo '<div class="sidebar-wrap col-md-3 content-left-wrap">';			get_sidebar();		echo '</div>';	}	?>	

</div><!-- .container -->
<?php get_footer(); ?>