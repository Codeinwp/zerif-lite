<?php
/**
 * About us section
 *
 * @package zerif-lite
 */

zerif_before_about_us_trigger();

$zerif_aboutus_show = get_theme_mod( 'zerif_aboutus_show' );

echo '<section class="about-us ' . ( ( is_customize_preview() && ( ! isset( $zerif_aboutus_show ) || $zerif_aboutus_show == 1 ) ) ? ' zerif_hidden_if_not_customizer ' : '' ) . '" id="aboutus">';

?>

	<?php zerif_top_about_us_trigger(); ?>

	<div class="container">

		<!-- SECTION HEADER -->

		<div class="section-header">

			<?php

			/* Title */
			zerif_about_us_header_title_trigger();

			/* Subtitle */
			zerif_about_us_header_subtitle_trigger();

			?>

		</div><!-- / END SECTION HEADER -->

		<!-- 3 COLUMNS OF ABOUT US-->

		<div class="row">

			<!-- COLUMN 1 - BIG MESSAGE ABOUT THE COMPANY-->

		<?php
			$zerif_aboutus_biglefttitle_default = '';
		if ( defined( 'THEMEISLE_COMPANION_VERSION' ) ) {
			$zerif_aboutus_biglefttitle_default = 'Everything you see here is responsive and mobile-friendly.';
		}
		if ( current_user_can( 'edit_theme_options' ) ) {
			$zerif_aboutus_biglefttitle = get_theme_mod( 'zerif_aboutus_biglefttitle', $zerif_aboutus_biglefttitle_default );
		} else {
			$zerif_aboutus_biglefttitle = get_theme_mod( 'zerif_aboutus_biglefttitle' );
		}
			/* translators: About use section in customizer */
			$zerif_aboutus_text_default = sprintf( __( 'Change this text in %s', 'zerif-lite' ), __( 'About us section', 'zerif-lite' ) );
		if ( defined( 'THEMEISLE_COMPANION_VERSION' ) ) {
			$zerif_aboutus_text_default = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.';
		}
		if ( current_user_can( 'edit_theme_options' ) ) {
			$zerif_aboutus_text = get_theme_mod( 'zerif_aboutus_text', $zerif_aboutus_text_default );
		} else {
			$zerif_aboutus_text = get_theme_mod( 'zerif_aboutus_text' );
		}

		if ( current_user_can( 'edit_theme_options' ) ) {
			$zerif_aboutus_feature1_title = get_theme_mod( 'zerif_aboutus_feature1_title', sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_aboutus_feature1_title' ) ), __( 'Edit skill', 'zerif-lite' ) ) );
		} else {
			$zerif_aboutus_feature1_title = get_theme_mod( 'zerif_aboutus_feature1_title' );
		}
			$zerif_aboutus_feature1_text = get_theme_mod( 'zerif_aboutus_feature1_text' );

		if ( current_user_can( 'edit_theme_options' ) ) {
			$zerif_aboutus_feature2_title = get_theme_mod( 'zerif_aboutus_feature2_title', sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_aboutus_feature2_title' ) ), __( 'Edit skill', 'zerif-lite' ) ) );
		} else {
			$zerif_aboutus_feature2_title = get_theme_mod( 'zerif_aboutus_feature2_title' );
		}
			$zerif_aboutus_feature2_text = get_theme_mod( 'zerif_aboutus_feature2_text' );

		if ( current_user_can( 'edit_theme_options' ) ) {
			$zerif_aboutus_feature3_title = get_theme_mod( 'zerif_aboutus_feature3_title', sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_aboutus_feature3_title' ) ), __( 'Edit skill', 'zerif-lite' ) ) );
		} else {
			$zerif_aboutus_feature3_title = get_theme_mod( 'zerif_aboutus_feature3_title' );
		}
			$zerif_aboutus_feature3_text = get_theme_mod( 'zerif_aboutus_feature3_text' );

		if ( current_user_can( 'edit_theme_options' ) ) {
			$zerif_aboutus_feature4_title = get_theme_mod( 'zerif_aboutus_feature4_title', sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_aboutus_feature4_title' ) ), __( 'Edit skill', 'zerif-lite' ) ) );
		} else {
			$zerif_aboutus_feature4_title = get_theme_mod( 'zerif_aboutus_feature4_title' );
		}
			$zerif_aboutus_feature4_text = get_theme_mod( 'zerif_aboutus_feature4_text' );

			$text_and_skills = '';
		switch (
				( empty( $zerif_aboutus_biglefttitle ) ? 0 : 1 )
				+ ( empty( $zerif_aboutus_text ) ? 0 : 1 )
				+
					( empty( $zerif_aboutus_feature1_title ) && empty( $zerif_aboutus_feature1_text ) ?
					( empty( $zerif_aboutus_feature2_title ) && empty( $zerif_aboutus_feature2_text ) ?
					( empty( $zerif_aboutus_feature3_title ) && empty( $zerif_aboutus_feature3_text ) ?
					( empty( $zerif_aboutus_feature4_title ) && empty( $zerif_aboutus_feature4_text ) ?
					0 && $text_and_skills = ''
					: 1 && $text_and_skills = 'text_and_skills' )
					: 1 && $text_and_skills = 'text_and_skills' )
					: 1 && $text_and_skills = 'text_and_skills' )
					: 1 && $text_and_skills = 'text_and_skills' )
				) {
			case 3:
				$colCount = 4;
				break;
			case 2:
				$colCount = 6;
				break;
			default:
				$colCount = 12;
		}

		if ( ! empty( $zerif_aboutus_biglefttitle ) ) :

			echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . ' column zerif-rtl-big-title">';

			echo '<div class="big-intro" data-scrollreveal="enter left after 0s over 1s">';

			echo wp_kses_post( $zerif_aboutus_biglefttitle );

			echo '</div>';

			echo '</div>';

				endif;

		if ( ! empty( $zerif_aboutus_text ) ) :

			echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . ' column zerif_about_us_center ' . $text_and_skills . '" data-scrollreveal="enter bottom after 0s over 1s">';

			echo '<p>';

				echo wp_kses_post( $zerif_aboutus_text );

			echo '</p>';

			echo '</div>';

			endif;

			$there_is_skills = '';
			(
				! empty( $zerif_aboutus_feature1_title ) || ! empty( $zerif_aboutus_feature1_text ) ? $there_is_skills = 'yes' :
				! empty( $zerif_aboutus_feature2_title ) || ! empty( $zerif_aboutus_feature2_text ) ? $there_is_skills = 'yes' :
				! empty( $zerif_aboutus_feature3_title ) || ! empty( $zerif_aboutus_feature3_text ) ? $there_is_skills = 'yes' :
				! empty( $zerif_aboutus_feature4_title ) || ! empty( $zerif_aboutus_feature4_text ) ? $there_is_skills = 'yes' :
				$there_is_skills = '' );

			$zerif_aboutus_feature1_nr = get_theme_mod( 'zerif_aboutus_feature1_nr', '80' );
			$zerif_aboutus_feature2_nr = get_theme_mod( 'zerif_aboutus_feature2_nr', '91' );
			$zerif_aboutus_feature3_nr = get_theme_mod( 'zerif_aboutus_feature3_nr', '88' );
			$zerif_aboutus_feature4_nr = get_theme_mod( 'zerif_aboutus_feature4_nr', '95' );

			/* COLUMN 1 - SKILS */

if ( $there_is_skills != '' ) :

	?>
<div class="col-lg-<?php echo $colCount; ?> col-md-<?php echo $colCount; ?> column zerif-rtl-skills ">

<ul class="skills" data-scrollreveal="enter right after 0s over 1s">

<!-- SKILL ONE -->
	<?php
	if ( ! empty( $zerif_aboutus_feature1_nr ) || ! empty( $zerif_aboutus_feature1_title ) || ! empty( $zerif_aboutus_feature1_text ) ) {

		echo '<li class="skill skill_1">';

		if ( ! empty( $zerif_aboutus_feature1_nr ) ) {

			echo '<div class="skill-count">';

			echo '<input role="presentation" type="text" id="' . ( ! empty( $zerif_aboutus_feature1_title ) ? sanitize_title( $zerif_aboutus_feature1_title ) : '' ) . '" value="' . esc_attr( $zerif_aboutus_feature1_nr ) . '" data-thickness=".2" class="skill1" tabindex="-1">';

			echo '</div>';

		}

		if ( ! empty( $zerif_aboutus_feature1_title ) ) {
			echo '<div class="section-legend"><label for="' . sanitize_title( $zerif_aboutus_feature1_title ) . '">' . wp_kses_post( $zerif_aboutus_feature1_title ) . '</label></div>';
		} elseif ( is_customize_preview() ) {
			echo '<div class="section-legend zerif_hidden_if_not_customizer"></div>';
		}

		if ( ! empty( $zerif_aboutus_feature1_text ) ) {
			echo '<p>' . wp_kses_post( $zerif_aboutus_feature1_text ) . '</p>';
		} elseif ( is_customize_preview() ) {
			echo '<p class="zerif_hidden_if_not_customizer"></p>';
		}

		echo '</li>';

	}
	?>

<!-- SKILL TWO -->

	<?php
	if ( ! empty( $zerif_aboutus_feature2_nr ) || ! empty( $zerif_aboutus_feature2_title ) || ! empty( $zerif_aboutus_feature2_text ) ) {

		echo '<li class="skill skill_2">';

		if ( ! empty( $zerif_aboutus_feature2_nr ) ) {

			echo '<div class="skill-count">';

			echo '<input role="presentation" type="text" id="' . ( ! empty( $zerif_aboutus_feature2_title ) ? sanitize_title( $zerif_aboutus_feature2_title ) : '' ) . '" value="' . esc_attr( $zerif_aboutus_feature2_nr ) . '" data-thickness=".2" class="skill2" tabindex="-1">';

			echo '</div>';

		}

		if ( ! empty( $zerif_aboutus_feature2_title ) ) {
			echo '<div class="section-legend"><label for="' . sanitize_title( $zerif_aboutus_feature2_title ) . '">' . wp_kses_post( $zerif_aboutus_feature2_title ) . '</label></div>';
		} elseif ( is_customize_preview() ) {
			echo '<div class="section-legend zerif_hidden_if_not_customizer"></div>';
		}

		if ( ! empty( $zerif_aboutus_feature2_text ) ) {
			echo '<p>' . wp_kses_post( $zerif_aboutus_feature2_text ) . '</p>';
		} elseif ( is_customize_preview() ) {
			echo '<p class="zerif_hidden_if_not_customizer"></p>';
		}

		echo '</li>';

	}
	?>

<!-- SKILL THREE -->

	<?php
	if ( ! empty( $zerif_aboutus_feature3_nr ) || ! empty( $zerif_aboutus_feature3_title ) || ! empty( $zerif_aboutus_feature3_text ) ) {
		echo '<li class="skill skill_3">';

		if ( ! empty( $zerif_aboutus_feature3_nr ) ) {

			echo '<div class="skill-count">';

			echo '<input role="presentation" type="text" id="' . ( ! empty( $zerif_aboutus_feature3_title ) ? sanitize_title( $zerif_aboutus_feature3_title ) : '' ) . '" value="' . esc_attr( $zerif_aboutus_feature3_nr ) . '" data-thickness=".2" class="skill3" tabindex="-1">';

			echo '</div>';

		}

		if ( ! empty( $zerif_aboutus_feature3_title ) ) {
			echo '<div class="section-legend"><label for="' . sanitize_title( $zerif_aboutus_feature3_title ) . '">' . wp_kses_post( $zerif_aboutus_feature3_title ) . '</label></div>';
		} elseif ( is_customize_preview() ) {
			echo '<div class="section-legend zerif_hidden_if_not_customizer"></div>';
		}

		if ( ! empty( $zerif_aboutus_feature3_text ) ) {
			echo '<p>' . wp_kses_post( $zerif_aboutus_feature3_text ) . '</p>';
		} elseif ( is_customize_preview() ) {
			echo '<p class="zerif_hidden_if_not_customizer"></p>';
		}

		echo '</li>';

	}

	?>

<!-- SKILL FOUR -->

	<?php
	if ( ! empty( $zerif_aboutus_feature4_nr ) || ! empty( $zerif_aboutus_feature4_title ) || ! empty( $zerif_aboutus_feature4_text ) ) {
		echo '<li class="skill skill_4">';

		if ( ! empty( $zerif_aboutus_feature4_nr ) ) {

			echo '<div class="skill-count">';

			echo '<input role="presentation" type="text" id="' . ( ! empty( $zerif_aboutus_feature4_title ) ? sanitize_title( $zerif_aboutus_feature4_title ) : '' ) . '" value="' . esc_attr( $zerif_aboutus_feature4_nr ) . '" data-thickness=".2" class="skill4" tabindex="-1">';

			echo '</div>';

		}

		if ( ! empty( $zerif_aboutus_feature4_title ) ) {
			echo '<div class="section-legend"><label for="' . sanitize_title( $zerif_aboutus_feature4_title ) . '">' . wp_kses_post( $zerif_aboutus_feature4_title ) . '</label></div>';
		} elseif ( is_customize_preview() ) {
			echo '<div class="section-legend zerif_hidden_if_not_customizer"></div>';
		}

		if ( ! empty( $zerif_aboutus_feature4_text ) ) {
			echo '<p>' . wp_kses_post( $zerif_aboutus_feature4_text ) . '</p>';
		} elseif ( is_customize_preview() ) {
			echo '<p class="zerif_hidden_if_not_customizer"></p>';
		}

		echo '</li>';

	}

	?>

			</ul>

		</div> <!-- / END SKILLS COLUMN-->

		<?php endif; ?>

	</div> <!-- / END 3 COLUMNS OF ABOUT US-->

	<!-- CLIENTS -->
	<?php
	if ( is_active_sidebar( 'sidebar-aboutus' ) ) :

		$zerif_aboutus_clients_title_text = get_theme_mod( 'zerif_aboutus_clients_title_text' );

		echo '<div class="our-clients">';

		if ( ! empty( $zerif_aboutus_clients_title_text ) ) {

			echo '<h5><span class="section-footer-title">' . wp_kses_post( $zerif_aboutus_clients_title_text ) . '</span></h5>';

		} elseif ( is_customize_preview() ) {

			echo '<h5><span class="section-footer-title"></span></h5>';

		}

			echo '</div>';

			echo '<div class="client-list">';
			echo '<div data-scrollreveal="enter right move 60px after 0.00s over 2.5s">';
			dynamic_sidebar( 'sidebar-aboutus' );
			echo '</div>';
			echo '</div>';
			endif;
	?>

	</div> <!-- / END CONTAINER -->

	<?php zerif_bottom_about_us_trigger(); ?>

</section> <!-- END ABOUT US SECTION -->

<?php zerif_after_about_us_trigger(); ?>
