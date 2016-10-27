<?php get_header(); 

if ( get_option( 'show_on_front' ) == 'page' ) {
	
    include( get_page_template() );
	
}else {

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

							$zerif_contactus_title = get_theme_mod('zerif_contactus_title',__('Get in touch','zerif-lite'));
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

					else:
					?>
						<!-- CONTACT FORM-->
						<div class="row">

							<?php

							if(isset($emailSent) && $emailSent == true) :

								echo '<div class="notification success"><p>'.__('Thanks, your email was sent successfully!','zerif-lite').'</p></div>';

							elseif(isset($_POST['submitted'])):

								echo '<div class="notification error"><p>'.__('Sorry, an error occured.','zerif-lite').'</p></div>';

							endif;

							if(isset($nameError) && $nameError != '') :

								echo '<div class="notification error"><p>'.esc_html($nameError).'</p></div>';

							endif;

							if(isset($emailError) && $emailError != '') :

								echo '<div class="notification error"><p>'.esc_html($emailError).'</p></div>';

							endif;

							if(isset($subjectError) && $subjectError != '') :

								echo '<div class="notification error"><p>'.esc_html($subjectError).'</p></div>';

							endif;

							if(isset($messageError) && $messageError != '') :

								echo '<div class="notification error"><p>'.esc_html($messageError).'</p></div>';

							endif;

							?>

							<form role="form" method="POST" action="" onSubmit="this.scrollPosition.value=(document.body.scrollTop || document.documentElement.scrollTop)" class="contact-form">

								<input type="hidden" name="scrollPosition">

								<input type="hidden" name="submitted" id="submitted" value="true" />

								<div class="col-lg-4 col-sm-4 zerif-rtl-contact-name" data-scrollreveal="enter left after 0s over 1s">
									<label for="myname" class="screen-reader-text"><?php _e( 'Your Name', 'zerif-lite' ); ?></label>
									<input required="required" type="text" name="myname" id="myname" placeholder="<?php _e('Your Name','zerif-lite'); ?>" class="form-control input-box" value="<?php if(isset($_POST['myname'])) echo esc_attr($_POST['myname']);?>">
								</div>

								<div class="col-lg-4 col-sm-4 zerif-rtl-contact-email" data-scrollreveal="enter left after 0s over 1s">
									<label for="myemail" class="screen-reader-text"><?php _e( 'Your Email', 'zerif-lite' ); ?></label>
									<input required="required" type="email" name="myemail" id="myemail" placeholder="<?php _e('Your Email','zerif-lite'); ?>" class="form-control input-box" value="<?php if(isset($_POST['myemail'])) echo is_email($_POST['myemail']) ? $_POST['myemail'] : ""; ?>">
								</div>

								<div class="col-lg-4 col-sm-4 zerif-rtl-contact-subject" data-scrollreveal="enter left after 0s over 1s">
									<label for="mysubject" class="screen-reader-text"><?php _e( 'Subject', 'zerif-lite' ); ?></label>
									<input required="required" type="text" name="mysubject" id="mysubject" placeholder="<?php _e('Subject','zerif-lite'); ?>" class="form-control input-box" value="<?php if(isset($_POST['mysubject'])) echo esc_attr($_POST['mysubject']);?>">
								</div>

								<div class="col-lg-12 col-sm-12" data-scrollreveal="enter right after 0s over 1s">
									<label for="mymessage" class="screen-reader-text"><?php _e( 'Your Message', 'zerif-lite' ); ?></label>
									<textarea name="mymessage" id="mymessage" class="form-control textarea-box" placeholder="<?php _e('Your Message','zerif-lite'); ?>"><?php if(isset($_POST['mymessage'])) { echo esc_html($_POST['mymessage']); } ?></textarea>
								</div>

								<?php
								$zerif_contactus_button_label = get_theme_mod('zerif_contactus_button_label',__('Send Message','zerif-lite'));
								if( !empty($zerif_contactus_button_label) ):
									echo '<button class="btn btn-primary custom-button red-btn" type="submit" data-scrollreveal="enter left after 0s over 1s">'.$zerif_contactus_button_label.'</button>';
								elseif ( is_customize_preview() ):
									echo '<button class="btn btn-primary custom-button red-btn zerif_hidden_if_not_customizer" type="submit" data-scrollreveal="enter left after 0s over 1s"></button>';
								endif;
								?>

								<?php

								$zerif_contactus_sitekey = get_theme_mod('zerif_contactus_sitekey');
								$zerif_contactus_secretkey = get_theme_mod('zerif_contactus_secretkey');
								$zerif_contactus_recaptcha_show = get_theme_mod('zerif_contactus_recaptcha_show');

								if( isset($zerif_contactus_recaptcha_show) && $zerif_contactus_recaptcha_show != 1 && !empty($zerif_contactus_sitekey) && !empty($zerif_contactus_secretkey) ) :

									echo '<div class="g-recaptcha zerif-g-recaptcha" data-sitekey="' . esc_attr( $zerif_contactus_sitekey ) . '"></div>';

								endif;

								?>

							</form>

						</div>

						<!-- / END CONTACT FORM-->
					<?php
					endif;
					?>

				</div> <!-- / END CONTAINER -->

			</section> <!-- / END CONTACT US SECTION-->
			<?php
		endif;

}
get_footer(); ?>
