jQuery(document).ready(function() {

	jQuery( "#sortable" ).sortable();
	
	jQuery( "#sortable" ).disableSelection();

	jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section zerif-upsells">');
	
	jQuery('.zerif-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://wordpress.org/support/view/theme-reviews/zerif-lite" class="button" target="_blank">{review}</a>'.replace('{review}',objectL10n.review));
	
	jQuery('.zerif-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://themeisle.com/forums/forum/zerif-lite/" class="button" target="_blank">{support}</a>'.replace('{support}',objectL10n.support));
	
	jQuery('.zerif-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://themeisle.com/documentation-zerif-lite" class="button" target="_blank">{documentation}</a>'.replace('{documentation}',objectL10n.documentation));

	jQuery('.zerif-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/" class="button" target="_blank">{pro}</a>'.replace('{pro}',objectL10n.pro));

	jQuery('#customize-theme-controls > ul').prepend('</li>');
	
	
	jQuery( '.ui-state-default' ).on( 'mousedown', function() {

		jQuery( '#customize-header-actions #save' ).trigger( 'click' );

	});
	
});
