<?php
/**
 * Welcome screen template
 */

$zerif_lite = wp_get_theme( 'zerif-lite' );

?>
<div class="zerif-lite-tab-pane" id="welcome">
	
	<h1>Zerif Lite <?php if( !empty($zerif_lite['Version']) ): ?> <sup id="zerif-lite-theme-version"><?php echo esc_attr( $zerif_lite['Version'] ); ?> </sup><?php endif; ?></h1>

	<p><?php esc_html_e( 'Welcome to our most popular free one page WordPress theme, Zerif Lite!','zerif-lite'); ?></p>
	<p><?php esc_html_e( 'We want to make sure you have the best experience using Zerif Lite and that is why we gathered here all the necessary informations for you. We hope you will enjoy using Zerif Lite, as much as we enjoy creating great products.', 'zerif-lite' ); ?>

	<img id="zerif-lite-w-screenshot" src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" alt="Zerif Lite"/>
	
</div>