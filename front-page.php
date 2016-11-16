<?php get_header(); 

//Check if version 1.8.5 or less has been previously installed.
$old_zerif_option = get_theme_mod( 'zerif_bigtitle_title' );

//If static page is front-page, get it's template.
if ( get_option( 'show_on_front' ) == 'page' ) {

	include( get_page_template() );

} else {
//For users who had previously installed 1.8.5 or less. Keep the old settings.
	if( ! empty( $old_zerif_option ) ) {

	$zerif_bigtitle_show = get_theme_mod('zerif_bigtitle_show');

	if( isset($zerif_bigtitle_show) && $zerif_bigtitle_show != 1 ):

		get_template_part( 'sections/big_title' );

	endif;

?>

</header> <!-- / END HOME SECTION  -->
<?php zerif_after_header_trigger(); ?>
<div id="content" class="site-content">

<?php

	/* OUR FOCUS SECTION */

	$zerif_ourfocus_show = get_theme_mod('zerif_ourfocus_show');

	if( isset($zerif_ourfocus_show) && $zerif_ourfocus_show != 1 ):
	
	zerif_before_our_focus_trigger();

		get_template_part( 'sections/our_focus' );
		
	zerif_after_our_focus_trigger();

	endif;

	/* RIBBON WITH BOTTOM BUTTON */

	get_template_part( 'sections/ribbon_with_bottom_button' );

	/* ABOUT US */

	$zerif_aboutus_show = get_theme_mod('zerif_aboutus_show');

	if( isset($zerif_aboutus_show) && $zerif_aboutus_show != 1 ):
	
	zerif_before_about_us_trigger();

		get_template_part( 'sections/about_us' );
	
	zerif_after_about_us_trigger();

	endif;

	/* OUR TEAM */

	$zerif_ourteam_show = get_theme_mod('zerif_ourteam_show');

	if( isset($zerif_ourteam_show) && $zerif_ourteam_show != 1 ):
	
	zerif_before_our_team_trigger();

		get_template_part( 'sections/our_team' );
	
	zerif_after_our_team_trigger();

	endif;

	/* TESTIMONIALS */

	$zerif_testimonials_show = get_theme_mod('zerif_testimonials_show');

	if( isset($zerif_testimonials_show) && $zerif_testimonials_show != 1 ):
	
	zerif_before_testimonials_trigger();

		get_template_part( 'sections/testimonials' );
	
	zerif_after_testimonials_trigger();

	endif;

	/* RIBBON WITH RIGHT SIDE BUTTON */

	get_template_part( 'sections/ribbon_with_right_button' );

	/* LATEST NEWS */
	$zerif_latestnews_show = get_theme_mod('zerif_latestnews_show');

	if( isset($zerif_latestnews_show) && $zerif_latestnews_show != 1 ):
	
	zerif_before_latest_news_trigger();

		get_template_part( 'sections/latest_news' );
	
	zerif_after_latest_news_trigger();

	endif;

		/* CONTACT US */
		$zerif_contactus_show = get_theme_mod('zerif_contactus_show');

		if( isset($zerif_contactus_show) && $zerif_contactus_show != 1 ):
			?>
			<section class="contact-us" id="contact">
				<div class="container">
					<!-- SECTION HEADER -->
					<div class="section-header">

						<?php
							if ( current_user_can( 'edit_theme_options' ) ) {
								$zerif_contactus_title = get_theme_mod( 'zerif_contactus_title', sprintf( __( 'Change this title in %s','zerif-lite' ), sprintf( '<a href="'.esc_url( admin_url( 'customize.php?autofocus[control]=zerif_contactus_title' ) ).'">%s</a>', __( 'Contact us section','zerif-lite' ) ) ) );
							} else {
								$zerif_contactus_title = get_theme_mod( 'zerif_contactus_title' );
							}
							if ( !empty($zerif_contactus_title) ):
								echo '<h2 class="white-text">'.wp_kses_post( $zerif_contactus_title ).'</h2>';
							elseif ( is_customize_preview() ):
								echo '<h2 class="white-text zerif_hidden_if_not_customizer"></h2>';
							endif;

							$zerif_contactus_subtitle = get_theme_mod('zerif_contactus_subtitle');
							if(isset($zerif_contactus_subtitle) && $zerif_contactus_subtitle != ""):
								echo '<div class="white-text section-legend">'.wp_kses_post( $zerif_contactus_subtitle ).'</div>';
							elseif ( is_customize_preview() ):
								echo '<h6 class="white-text section-legend zerif_hidden_if_not_customizer">'.$zerif_contactus_subtitle.'</h6>';
							endif;
						?>
					</div>
					<!-- / END SECTION HEADER -->

					<?php
					if ( defined('PIRATE_FORMS_VERSION') && shortcode_exists( 'pirate_forms' ) ):

						echo '<div class="row">';
							echo do_shortcode('[pirate_forms]');
						echo '</div>';

					endif; ?>

				</div> <!-- / END CONTAINER -->

			</section> <!-- / END CONTACT US SECTION-->
			<?php
		endif;

	} else {
	//For new users. Display the correct WordPress content.
			global $wp_query;
			global $paged; ?>
			<div class="clear"></div>

			</header> <!-- / END HOME SECTION  -->
			<?php zerif_after_header_trigger(); ?>
			<div id="content" class="site-content blog-site-content">

				<div class="container">

					<div class="content-left-wrap col-md-9">

						<div id="primary" class="content-area">

							<main id="main" class="site-main" itemscope itemtype="http://schema.org/Blog">
								<?php
								// Define custom query parameters
								$zerif_posts_per_page = ( get_option('posts_per_page') ) ? get_option('posts_per_page') : '6';
								$zerif_custom_query_args = array(
									/* Parameters go here */
									'post_type' => 'post',
									'posts_per_page' => $zerif_posts_per_page );

								// Get current page and append to custom query parameters array
								$zerif_custom_query_args['paged'] = ( get_query_var('paged') ? get_query_var('paged') : ( get_query_var('page') ? get_query_var('page') : 1) );
								$paged = $zerif_custom_query_args['paged'];

								// Instantiate custom query
								$zerif_custom_query = new WP_Query( apply_filters( 'zerif_template_blog_parameters', $zerif_custom_query_args ) );

								// Pagination fix
								$zerif_temp_query = $wp_query;
								$wp_query   = NULL;
								$wp_query   = $zerif_custom_query;

								// Output custom query loop
								if ( $zerif_custom_query->have_posts() ) :
									while ( $zerif_custom_query->have_posts() ) :
										$zerif_custom_query->the_post();
										// Loop output goes here
										get_template_part( 'content', get_post_format() );
									endwhile;
								else :
									get_template_part( 'content', 'none' );
								endif;
								// Reset postdata
								wp_reset_postdata();

								// Custom query loop pagination
								zerif_paging_nav($zerif_custom_query->max_num_pages);

								// Reset main query object
								$wp_query = NULL;
								$wp_query = $zerif_temp_query; ?>
							</main><!-- #main -->

						</div><!-- #primary -->

					</div><!-- .content-left-wrap -->

					<?php zerif_sidebar_trigger(); ?>

				</div><!-- .container -->
			<?php
	}
}

get_footer(); ?>
