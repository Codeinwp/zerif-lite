<?php

zerif_before_our_team_trigger();

echo '<section class="our-team" id="team">';

	zerif_top_our_team_trigger();

	echo '<div class="container">';

		echo '<div class="section-header">';

			/* Title */
			zerif_our_team_header_title_trigger();

			/* Subtitle */
			zerif_our_team_header_subtitle_trigger();

		echo '</div>';

		if( is_active_sidebar( 'sidebar-ourteam' ) ) {
			echo '<div class="row" data-scrollreveal="enter left after 0s over 0.1s">';
				dynamic_sidebar( 'sidebar-ourteam' );
			echo '</div> ';
		} elseif ( current_user_can( 'edit_theme_options' ) ) {

			if ( is_customize_preview() ) {
				printf( __( 'Add widgets in this area by going to the %s','zerif-lite' ), __( 'Our team section','zerif-lite' ) );
			} else {
				printf( __( 'Add widgets in this area by going to the %s','zerif-lite' ), sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;section&#93;=sidebar-widgets-sidebar-ourteam' ) ), __( 'Our team section','zerif-lite' ) ) );
			}

		}

	echo '</div>';

	zerif_bottom_our_team_trigger();

echo '</section>';

zerif_after_our_team_trigger();
?>