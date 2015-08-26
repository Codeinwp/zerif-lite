<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
?>
<div id="getting_started" class="zerif-lite-tab-pane">

	<h1><?php esc_html_e( 'Getting started using Zerif Lite', 'zerif-lite' ); ?></h1>

	<h4><?php esc_html_e( 'Customize everything in a single place.' ,'zerif-lite' ); ?></h4>
	<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'zerif-lite' ); ?></p>
	<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'zerif-lite' ); ?></a></p>

	<hr />

	<h4><?php esc_html_e( 'View documentation', 'zerif-lite' ); ?></h4>
	<p><?php esc_html_e( 'Please check our full documentation for detailed information on how to use Zerif Lite.', 'zerif-lite' ); ?></p>
	<p><a href="http://themeisle.com/documentation-zerif-lite/" class="button"><?php esc_html_e( 'View documentation', 'zerif-lite' ); ?></a></p>

	<hr />

</div>