<?php
/**
 * Important news
 */
?>
<?php
// get theme customizer url
$customizer_url 	= admin_url() . 'customize.php?url=' . urlencode( site_url() . '?storefront-customizer=true' ) . '&return=' . urlencode( admin_url() . 'themes.php?page=storefront-welcome' ) . '&storefront-customizer=true';
$menus_url 			= admin_url() . 'customize.php?autofocus%5Bsection%5D=nav&?url=' . urlencode( site_url() . '?storefront-customizer=true' ) . '&return=' . urlencode( admin_url() . 'themes.php?page=storefront-welcome' ) . '&storefront-customizer=true';

?>
<div id="news" class="col panel tab-pane">


	<h4><?php esc_html_e( 'Install WooCommerce' ,'storefront' ); ?></h4>
	<p><?php esc_html_e( 'Although Storefront works fine as a standard WordPress theme, it really shines when used for an online store. Install WooCommerce and start selling now.', 'storefront' ); ?></p>

	<?php if ( class_exists( 'WooCommerce' ) ) { ?>
		<p><span class="activated"><?php esc_html_e( 'Activated', 'storefront' ); ?></span></p>
	<?php } else { ?>
		<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=woocommerce' ), 'install-plugin_woocommerce' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install WooCommerce', 'storefront' ); ?></a></p>
	<?php } ?>

	<hr />

</div>