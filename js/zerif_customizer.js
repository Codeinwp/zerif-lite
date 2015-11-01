jQuery(document).ready(function() {

	/* Upsells in customizer (Documentation link and Upgrade to PRO link */
	if( !jQuery( ".zerif-upsells" ).length ) {
		jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section zerif-upsells">');
	}

	if( jQuery( ".zerif-upsells" ).length ) {

		jQuery('.zerif-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://themeisle.com/documentation-zerif-lite" class="button" target="_blank">{documentation}</a>'.replace('{documentation}', zerifLiteCustomizerObject.documentation));

	}
	jQuery('.preview-notice').append('<a class="zerif-upgrade-to-pro-button" href="http://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/" class="button" target="_blank">{pro}</a>'.replace('{pro}',zerifLiteCustomizerObject.pro));

	if ( !jQuery( ".zerif-upsells" ).length ) {
		jQuery('#customize-theme-controls > ul').prepend('</li>');
	}

	jQuery( '.ui-state-default' ).on( 'mousedown', function() {
		jQuery( '#customize-header-actions #save' ).trigger( 'click' );

	});

	/* Move our focus widgets in the our focus panel */
	wp.customize.section( 'sidebar-widgets-sidebar-ourfocus' ).panel( 'panel_ourfocus' );
	wp.customize.section( 'sidebar-widgets-sidebar-ourfocus' ).priority( '2' );

	/* Move our team widgets in the our team panel */
	wp.customize.section( 'sidebar-widgets-sidebar-ourteam' ).panel( 'panel_ourteam' );
	wp.customize.section( 'sidebar-widgets-sidebar-ourteam' ).priority( '2' );
	
	/* Move testimonial widgets in the testimonials panel */
	wp.customize.section( 'sidebar-widgets-sidebar-testimonials' ).panel( 'panel_testimonials' );
	wp.customize.section( 'sidebar-widgets-sidebar-testimonials' ).priority( '2' );
	
	/* Move about us widgets in the about us panel */
	wp.customize.section( 'sidebar-widgets-sidebar-aboutus' ).panel( 'panel_about' );
	wp.customize.section( 'sidebar-widgets-sidebar-aboutus' ).priority( '7' );
});