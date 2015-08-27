<?php
/**
 * Child themes template
 */
?>
<div id="child_themes" class="zerif-lite-tab-pane">

	<?php
		$current_theme = wp_get_theme();
	?>

	<div class="zerif-tab-pane-center">

		<h1><?php esc_html_e( 'Get a whole new look for your site', 'zerif-lite' ); ?></h1>

		<p><?php esc_html_e( 'Below you will find a selection of Zerif Lite child themes that will totally transform the look of your site.', 'zerif-lite' ); ?></p>

	</div>


	<div class="zerif-tab-pane-half zerif-tab-pane-first-half">

		<!-- ZBlackBeard -->
		<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/zblackbeard.jpg'; ?>" alt="<?php esc_html_e( 'ZBlackBeard Child Theme', 'zerif-lite' ); ?>" />

		<h2><?php esc_html_e( 'ZBlackBeard', 'zerif-lite' ); ?></h2>
		<p><?php esc_html_e( 'ZBlackbeard is a modern responsive WordPress Theme. It\'s perfect for web agencies, digital studios, corporate, product showcase, personal and business portfolio.', 'zerif-lite' ); ?></p>
		<p>
			<?php if ( 'ZBlackBeard' != $current_theme['Name'] ) { ?>
				<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=zblackbeard' ), 'install-theme_zblackbeard' ) ); ?>" class="button button-primary"><?php printf( __( 'Install %s now', 'zerif-lite' ), '<span class="screen-reader-text">ZblackBeard</span>' ); ?></a>
			<?php } ?>
		</p>
		<hr />

		<!-- OnePirate -->
		<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/onepirate.jpg'; ?>" alt="<?php esc_html_e( 'OnePirate Child Theme', 'zerif-lite' ); ?>" />

		<h2><?php esc_html_e( 'OnePirate', 'zerif-lite' ); ?></h2>
		<p><?php esc_html_e( 'One Pirate is a beautiful one-page WordPress theme, with a colorful and playful design, nice animations, full-screen layout, and elegant parallax effect. The theme comes with a full-width header and with catchy icons. Overall, One Pirate has a modern and interactive look, and a smooth transition from a section to another.', 'zerif-lite' ); ?></p>
		<p>
			<?php if ( 'OnePirate' != $current_theme['Name'] ) { ?>
				<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=onepirate' ), 'install-theme_onepirate' ) ); ?>" class="button button-primary"><?php printf( __( 'Install %s now', 'zerif-lite' ), '<span class="screen-reader-text">ZblackBeard</span>' ); ?></a>
			<?php } ?>
		</p>

	</div>

	<div class="zerif-tab-pane-half">

		<!-- Zerius -->
		<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/zerius.jpg'; ?>" alt="<?php esc_html_e( 'Zerius Child Theme', 'zerif-lite' ); ?>" />

		<h2><?php esc_html_e( 'Zerius', 'zerif-lite' ); ?></h2>
		<p><?php esc_html_e( 'Zerius is a clean, modern, and animated free one-page parallax WordPress theme.', 'zerif-lite' ); ?></p>
		<p>
			<?php if ( 'Zerius' != $current_theme['Name'] ) { ?>
				<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=zerius' ), 'install-theme_zerius' ) ); ?>" class="button button-primary"><?php printf( __( 'Install %s now', 'zerif-lite' ), '<span class="screen-reader-text">Zerius</span>' ); ?></a>
			<?php } ?>
		</p>
		<hr />

		<!-- Zifer Child -->
		<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/zifer-child.jpg'; ?>" alt="<?php esc_html_e( 'Zifer Child Theme', 'zerif-lite' ); ?>" />

		<h2><?php esc_html_e( 'Zifer', 'zerif-lite' ); ?></h2>
		<p><?php esc_html_e( 'Zifer Child is a user optimized Photography WordPress Theme built with latest technologies, easy to customize. Use it to create an awesome photography portfolio.', 'zerif-lite' ); ?></p>
		<p>
			<?php if ( 'Zifer Child' != $current_theme['Name'] ) { ?>
				<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=zifer-child' ), 'install-theme_zifer-child' ) ); ?>" class="button button-primary"><?php printf( __( 'Install %s now', 'zerif-lite' ), '<span class="screen-reader-text">Zerius</span>' ); ?></a>
			<?php } ?>
		</p>

	</div>

</div>