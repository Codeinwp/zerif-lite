jQuery(document).ready(function() {
	
	jQuery( '.ui-state-default' ).on( 'mousedown', function() {
		jQuery( '#customize-header-actions #save' ).trigger( 'click' );

	});
	
	/* Move about us widgets in the about us panel */
	wp.customize.section( 'sidebar-widgets-sidebar-aboutus' ).panel( 'panel_about' );
	wp.customize.section( 'sidebar-widgets-sidebar-aboutus' ).priority( '7' );
	
	/* Tooltips for General Options */
	jQuery('#customize-control-zerif_use_safe_font label').append('<span class="dashicons dashicons-info zerif-moreinfo-icon"></span><div class="zerif-moreinfo-content">' + zerifLiteCustomizerObject.tooltip_safefont + '</div>');
	
	jQuery('#customize-control-zerif_accessibility label').append('<div class="dashicons dashicons-info zerif-moreinfo-icon"></div><div class="zerif-moreinfo-content">' + zerifLiteCustomizerObject.tooltip_accessibility + '</div>');
	
	jQuery('#customize-control-zerif_disable_smooth_scroll label').append('<span class="dashicons dashicons-info zerif-moreinfo-icon"></span><div class="zerif-moreinfo-content">' + zerifLiteCustomizerObject.tooltip_smoothscroll + '</div>');
	
	jQuery('#customize-control-zerif_disable_preloader label').append('<span class="dashicons dashicons-info zerif-moreinfo-icon"></span><div class="zerif-moreinfo-content">' + zerifLiteCustomizerObject.tooltip_preloader + '</div>');

});