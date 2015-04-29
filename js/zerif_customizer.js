jQuery(document).ready(function() {

	jQuery( "#sortable" ).sortable();
	
	jQuery( "#sortable" ).disableSelection();
	
	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="margin-top: 5px;margin-bottom: 5px; margin-left: 93px;"href="http://themeisle.com/documentation-zerif-lite" class="button" target="_blank">{documentation}</a>'.replace('{documentation}',objectL10n.documentation));
	
	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="margin-top: 5px;margin-bottom: 5px; margin-left: 87px;"href="http://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/" class="button" target="_blank">{pro}</a>'.replace('{pro}',objectL10n.pro));
	
	jQuery( '.ui-state-default' ).on( 'mousedown', function() {

		jQuery( '#customize-header-actions #save' ).trigger( 'click' );

	});
	
});
