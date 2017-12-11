<?php
/**
 * Template Name: Frontpage
 *
 * @package zerif-lite
 */
get_header();

$zerif_bigtitle_show = get_theme_mod( 'zerif_bigtitle_show' );

if ( ( isset( $zerif_bigtitle_show ) && $zerif_bigtitle_show != 1 ) || is_customize_preview() ) {

	get_template_part( 'sections/big_title' );

}

?>

</header> <!-- / END HOME SECTION  -->
<?php zerif_after_header_trigger(); ?>
<div id="content" class="site-content">

	<?php

	/* OUR FOCUS SECTION */

	$zerif_ourfocus_show = get_theme_mod( 'zerif_ourfocus_show' );

	if ( ( isset( $zerif_ourfocus_show ) && $zerif_ourfocus_show != 1 ) || is_customize_preview() ) {

		get_template_part( 'sections/our_focus' );

	}

	/* RIBBON WITH BOTTOM BUTTON */

	get_template_part( 'sections/ribbon_with_bottom_button' );

	/* ABOUT US */

	$zerif_aboutus_show = get_theme_mod( 'zerif_aboutus_show' );

	if ( ( isset( $zerif_aboutus_show ) && $zerif_aboutus_show != 1 ) || is_customize_preview() ) {

		get_template_part( 'sections/about_us' );

	}

	/* OUR TEAM */

	$zerif_ourteam_show = get_theme_mod( 'zerif_ourteam_show' );

	if ( ( isset( $zerif_ourteam_show ) && $zerif_ourteam_show != 1 ) || is_customize_preview() ) {

		get_template_part( 'sections/our_team' );

	}

	/* TESTIMONIALS */

	$zerif_testimonials_show = get_theme_mod( 'zerif_testimonials_show' );

	if ( ( isset( $zerif_testimonials_show ) && $zerif_testimonials_show != 1 ) || is_customize_preview() ) {

		get_template_part( 'sections/testimonials' );

	}

	/* RIBBON WITH RIGHT SIDE BUTTON */

	get_template_part( 'sections/ribbon_with_right_button' );

	/* LATEST NEWS */
	$zerif_latestnews_show = get_theme_mod( 'zerif_latestnews_show' );

	if ( ( isset( $zerif_latestnews_show ) && $zerif_latestnews_show != 1 ) || is_customize_preview() ) {

		get_template_part( 'sections/latest_news' );

	}

	/* CONTACT US */
	$zerif_contactus_show = get_theme_mod( 'zerif_contactus_show' );

	if ( ( isset( $zerif_contactus_show ) && $zerif_contactus_show != 1 ) || is_customize_preview() ) :
		echo '<section class="contact-us ' . ( ( is_customize_preview() && ( ! isset( $zerif_contactus_show ) || $zerif_contactus_show == 1 ) ) ? ' zerif_hidden_if_not_customizer ' : '' ) . '" id="contact">';
		?>
			<div class="container">
				<!-- SECTION HEADER -->
				<div class="section-header">

					<?php

					if ( current_user_can( 'edit_theme_options' ) ) {
						$zerif_contactus_title = get_theme_mod( 'zerif_contactus_title', sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_contactus_title' ) ), __( 'Get in touch', 'zerif-lite' ) ) );
					} else {
						$zerif_contactus_title = get_theme_mod( 'zerif_contactus_title' );
					}
					if ( ! empty( $zerif_contactus_title ) ) :
						echo '<h2 class="white-text">' . wp_kses_post( $zerif_contactus_title ) . '</h2>';
					elseif ( is_customize_preview() ) :
						echo '<h2 class="white-text zerif_hidden_if_not_customizer"></h2>';
					endif;

					$contactus_subtitle_default = '';
					if ( ! defined( 'PIRATE_FORMS_VERSION' ) ) {
						/* translators: Pirate Forms plugin install link */
						$contactus_subtitle_default = sprintf( __( 'You need to install %s to create a contact form.', 'zerif-lite' ), sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=pirate-forms' ), 'install-plugin_pirate-forms' ) ), 'Pirate Forms' ) );
					}

					if ( current_user_can( 'edit_theme_options' ) ) {
						$zerif_contactus_subtitle = get_theme_mod( 'zerif_contactus_subtitle', $contactus_subtitle_default );
					} else {
						$zerif_contactus_subtitle = get_theme_mod( 'zerif_contactus_subtitle' );
					}

					if ( ! empty( $zerif_contactus_subtitle ) ) {
						echo '<div class="white-text section-legend">' . wp_kses_post( $zerif_contactus_subtitle ) . '</div>';
					} elseif ( is_customize_preview() ) {
						echo '<h6 class="white-text section-legend zerif_hidden_if_not_customizer"></h6>';
					}
					?>
				</div>
				<!-- / END SECTION HEADER -->

				<?php
				if ( defined( 'PIRATE_FORMS_VERSION' ) && shortcode_exists( 'pirate_forms' ) ) :

					echo '<div class="row">';
					echo do_shortcode( '[pirate_forms]' );
					echo '</div>';

				endif;
				?>

			</div> <!-- / END CONTAINER -->

		</section> <!-- / END CONTACT US SECTION-->
		<?php
	endif;

	get_footer(); ?>
