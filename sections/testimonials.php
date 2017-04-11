<?php

zerif_before_testimonials_trigger();

echo '<section class="testimonial" id="testimonials">';

	zerif_top_testimonials_trigger();

	echo '<div class="container">';

		echo '<div class="section-header">';

			/* Title */
			zerif_testimonials_header_title_trigger();

			/* Subtitle */
			zerif_testimonials_header_subtitle_trigger();

		echo '</div>';

		echo '<div class="row" data-scrollreveal="enter right after 0s over 1s">';

			echo '<div class="col-md-12">';

				$pinterest_style = '';
				$zerif_testimonials_pinterest_style = get_theme_mod('zerif_testimonials_pinterest_style');
				if( isset($zerif_testimonials_pinterest_style) && $zerif_testimonials_pinterest_style != 0 ) {
					$pinterest_style = 'testimonial-masonry';
				}

				echo '<div id="client-feedbacks" class="owl-carousel owl-theme ' . $pinterest_style . ' ">';

						if( is_active_sidebar( 'sidebar-testimonials' ) ) {

							dynamic_sidebar( 'sidebar-testimonials' );

						} elseif ( current_user_can( 'edit_theme_options' ) ) {

							if ( is_customize_preview() ) {
								printf( __( 'Add widgets in this area by going to the %s','zerif-lite' ), __( 'Testimonials section','zerif-lite' ) );
							} else {
								printf( __( 'Add widgets in this area by going to the %s','zerif-lite' ), sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;section&#93;=sidebar-widgets-sidebar-testimonials' ) ), __( 'Testimonials section','zerif-lite' ) ) );
							}
						}

				echo '</div>';

			echo '</div>';

		echo '</div>';

	echo '</div>';

	zerif_bottom_testimonials_trigger();

echo '</section>';

zerif_after_testimonials_trigger();

?>