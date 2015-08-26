<?php
/**
 * Child themes template
 */
?>
<div id="child_themes" class="zerif-lite-tab-pane">
	<?php
		$current_theme = wp_get_theme();
	?>

	<h1><?php esc_html_e( 'Get a whole new look for your site', 'zerif-lite' ); ?></h1>

	<p><?php esc_html_e( 'Below you will find a selection of Zerif Lite child themes that will totally transform the look of your site.', 'zerif-lite' ); ?></p>

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

</div>