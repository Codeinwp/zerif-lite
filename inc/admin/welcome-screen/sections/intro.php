<?php
/**
 * Welcome screen intro template
 */

$zerif_lite = wp_get_theme( 'zerif-lite' );

?>
<div class="col two-col tab-pane active" id="intro">
	
		<h1 style="margin-right: 0;"><?php echo '<strong>Zerif Lite</strong> <sup style="font-weight: bold; font-size: 50%; padding: 5px 10px; color: #666; background: #fff;">' . esc_attr( $zerif_lite['Version'] ) . '</sup>'; ?></h1>

		<p style="font-size: 1.2em;"><?php esc_html_e( 'Zerif LITE is a free one page WordPress theme. It\'s perfect for web agency business,corporate business,personal and parallax business portfolio, photography sites and freelancer.Is built on BootStrap with parallax support, is responsive, clean, modern, flat and minimal. Zerif Lite is ecommerce (WooCommerce) Compatible, WPML, RTL, Retina-Ready, SEO Friendly and with parallax, full screen image is one of the best business themes.', 'storefront' ); ?></p>
		<p><?php esc_html_e( 'Whether you\'re a store owner, WordPress developer, or both - we hope you enjoy Storefront\'s deep integration with WooCommerce core (including several popular WooCommerce extensions), plus the flexible design and extensible codebase that this theme provides.', 'storefront' ); ?>
	
		<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" alt="Zerif Lite" class="image-50" width="440" />
	
</div>