<?php get_header();

//If static page is front-page, get it's template.
if ( get_option( 'show_on_front' ) == 'page' ) {

	include( get_page_template() );

} else {

	//For users who had previously installed 1.8.5 or less. Keep the old settings.
	if( zerif_check_if_old_version_of_theme() ) {

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
								$zerif_contactus_title = get_theme_mod( 'zerif_contactus_title', sprintf( __( 'Change this title in %s','zerif-lite' ), sprintf( '<a href="%1$s">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_contactus_title' ) ), __( 'Contact us section','zerif-lite' ) ) ) );
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
		?>
			<div class="clear"></div>

			</header> <!-- / END HOME SECTION  -->
			<?php zerif_after_header_trigger(); ?>
			<div id="content" class="site-content blog-site-content">

				<div class="container">

					<div class="content-left-wrap col-md-9">

						<div id="primary" class="content-area">

							<main id="main" class="site-main" itemscope itemtype="http://schema.org/Blog">
								<?php
								if ( have_posts() ) :

									while ( have_posts() ) : the_post();

										/* Include the Post-Format-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
										 */

										get_template_part( 'content', get_post_format() );

									endwhile;

									echo get_the_posts_navigation( array( 'next_text' => sprintf( __( 'Newer posts %s','zerif-lite' ), '<span class="meta-nav">&rarr;</span>' ), 'prev_text' => sprintf( __( '%s Older posts', 'zerif-lite' ) , '<span class="meta-nav">&larr;</span>' ) ) );

								else :

									get_template_part( 'content', 'none' );

								endif;
								?>
							</main><!-- #main -->

						</div><!-- #primary -->

					</div><!-- .content-left-wrap -->

					<?php zerif_sidebar_trigger(); ?>

				</div><!-- .container -->
			<?php
	}
}

get_footer(); ?>
