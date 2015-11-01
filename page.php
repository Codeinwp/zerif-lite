<?php/** * The template for displaying all pages.
 */
get_header(); ?>
<div class="clear"></div>
</header> <!-- / END HOME SECTION  -->
<div id="content" class="site-content">
	<div class="container">
	<?php		if( (function_exists('is_cart') && is_cart()) || (function_exists('is_account_page') && is_account_page()) || (function_exists('is_checkout') && is_checkout() ) ) {			echo '<div class="content-left-wrap col-md-12">';		}		else {			echo '<div class="content-left-wrap col-md-9">';		}		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post(); 										get_template_part( 'content', 'page' );
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
					endwhile; 				?>
			</main><!-- #main -->
		</div><!-- #primary -->
	<?php		if( (function_exists('is_cart') && is_cart()) || (function_exists('is_account_page') && is_account_page()) || (function_exists('is_checkout') && is_checkout() ) ) {			echo '</div>';		}		else {			echo '</div>';			echo '<div class="sidebar-wrap col-md-3 content-left-wrap">';				get_sidebar();			echo '</div>';		}		?>	
	</div><!-- .container -->
<?php get_footer(); ?>