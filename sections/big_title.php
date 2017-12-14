<?php
/**
 * Big title section
 *
 * @package zerif-lite
 */

$zerif_slider_shortcode = get_theme_mod( 'zerif_bigtitle_slider_shortcode' );

$zerif_bigtitle_show = get_theme_mod( 'zerif_bigtitle_show' );

echo '<div class="' . ( ! empty( $zerif_slider_shortcode ) ? 'home-slider-plugin' : '' ) . ' home-header-wrap">';

	$zerif_parallax_img1 = get_theme_mod( 'zerif_parallax_img1', get_template_directory_uri() . '/images/background1.jpg' );
	$zerif_parallax_img2 = get_theme_mod( 'zerif_parallax_img2', get_template_directory_uri() . '/images/background2.png' );
	$zerif_parallax_use  = get_theme_mod( 'zerif_parallax_show' );

if ( ! empty( $zerif_slider_shortcode ) ) {
	echo do_shortcode( $zerif_slider_shortcode );
} else {

	if ( $zerif_parallax_use == 1 && ( ! empty( $zerif_parallax_img1 ) || ! empty( $zerif_parallax_img2 ) ) ) {
		echo '<ul id="parallax_move">';
		if ( ! empty( $zerif_parallax_img1 ) ) {
			echo '<li class="layer layer1" data-depth="0.10" style="background-image: url(' . esc_url( $zerif_parallax_img1 ) . ');"></li>';
		}
		if ( ! empty( $zerif_parallax_img2 ) ) {
			echo '<li class="layer layer2" data-depth="0.20" style="background-image: url(' . esc_url( $zerif_parallax_img2 ) . ');"></li>';
		}

		echo '</ul>';
	}

	echo '<div class="header-content-wrap ' . ( ( is_customize_preview() && ( ! isset( $zerif_bigtitle_show ) || $zerif_bigtitle_show == 1 ) ) ? ' zerif_hidden_if_not_customizer ' : '' ) . '">';

	echo '<div class="container">';

	zerif_big_title_text_trigger();

	$zerif_bigtitle_redbutton_label_default = get_theme_mod( 'zerif_bigtitle_redbutton_label' );

	if ( ! empty( $zerif_bigtitle_redbutton_label_default ) ) {

		$zerif_bigtitle_redbutton_label = get_theme_mod( 'zerif_bigtitle_redbutton_label_2', $zerif_bigtitle_redbutton_label_default );

	} elseif ( current_user_can( 'edit_theme_options' ) ) {

		$zerif_bigtitle_redbutton_label = get_theme_mod( 'zerif_bigtitle_redbutton_label_2', __( 'Customize this button', 'zerif-lite' ) );

	} else {

		$zerif_bigtitle_redbutton_label = get_theme_mod( 'zerif_bigtitle_redbutton_label_2' );

	}

	if ( current_user_can( 'edit_theme_options' ) ) {

		$zerif_bigtitle_redbutton_url = get_theme_mod( 'zerif_bigtitle_redbutton_url', admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_bigtitle_redbutton_url' ) );

		$zerif_bigtitle_greenbutton_label = get_theme_mod( 'zerif_bigtitle_greenbutton_label', __( 'Customize this button', 'zerif-lite' ) );

		$zerif_bigtitle_greenbutton_url = get_theme_mod( 'zerif_bigtitle_greenbutton_url', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_bigtitle_greenbutton_url' ) ) );

	} else {

		$zerif_bigtitle_redbutton_url = get_theme_mod( 'zerif_bigtitle_redbutton_url' );

		$zerif_bigtitle_greenbutton_label = get_theme_mod( 'zerif_bigtitle_greenbutton_label' );

		$zerif_bigtitle_greenbutton_url = get_theme_mod( 'zerif_bigtitle_greenbutton_url' );

	}


	if ( ( ! empty( $zerif_bigtitle_redbutton_label ) && ! empty( $zerif_bigtitle_redbutton_url ) ) || ( ! empty( $zerif_bigtitle_greenbutton_label ) && ! empty( $zerif_bigtitle_greenbutton_url ) ) ) :

		echo '<div class="buttons">';

		zerif_big_title_buttons_top_trigger();

		if ( ! empty( $zerif_bigtitle_redbutton_label ) && ! empty( $zerif_bigtitle_redbutton_url ) ) :

			echo '<a href="' . esc_url( $zerif_bigtitle_redbutton_url ) . '" class="btn btn-primary custom-button red-btn">' . wp_kses_post( $zerif_bigtitle_redbutton_label ) . '</a>';

			elseif ( is_customize_preview() ) :

				echo '<a href="" class="btn btn-primary custom-button red-btn zerif_hidden_if_not_customizer"></a>';

			endif;

			if ( ! empty( $zerif_bigtitle_greenbutton_label ) && ! empty( $zerif_bigtitle_greenbutton_url ) ) :

				echo '<a href="' . esc_url( $zerif_bigtitle_greenbutton_url ) . '" class="btn btn-primary custom-button green-btn">' . wp_kses_post( $zerif_bigtitle_greenbutton_label ) . '</a>';

			elseif ( is_customize_preview() ) :

				echo '<a href="" class="btn btn-primary custom-button green-btn zerif_hidden_if_not_customizer"></a>';

			endif;

			zerif_big_title_buttons_bottom_trigger();

			echo '</div>';

		endif;

	echo '</div>';

	echo '</div><!-- .header-content-wrap -->';
	echo '<div class="clear"></div>';
}
?>

</div>
