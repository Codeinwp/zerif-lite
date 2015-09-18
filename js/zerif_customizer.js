jQuery(document).ready(function() {

	var zerif_href = zerifCustomizerScript.themepageUrl;
	var zerif_customizer_href = zerifCustomizerScript.customizerUrl;
	var zerif_actionsRequired_nr = zerifCustomizerScript.actionsRequired;
	var zerif_has_actionsRequired = zerifCustomizerScript.hasActionsRequired;

	jQuery( "#sortable" ).sortable();
	
	jQuery( "#sortable" ).disableSelection();

	if ( (typeof zerif_customizer_href !== 'undefined') && (typeof zerif_actionsRequired_nr !== 'undefined') && (typeof zerif_has_actionsRequired !== 'undefined') && (zerif_has_actionsRequired == 'yes') ) {

		jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + zerif_href + '"><span class="zerif-lite-actions-count">' + zerif_actionsRequired_nr + '</span></a>');

	}

	jQuery( '#customize-theme-controls > ul' ).prepend('<li class="accordion-section zerif-upsells">');

	jQuery( '.zerif-upsells' ).append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/" class="button" target="_blank">{pro}</a>'.replace('{pro}',objectL10n.pro));

	jQuery( '.zerif-upsells' ).append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://themeisle.com/documentation-zerif-lite" class="button" target="_blank">{documentation}</a>'.replace('{documentation}',objectL10n.documentation));

	if (typeof zerif_href !== 'undefined') {

		jQuery('.zerif-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="' + zerif_href + '" class="button" target="_blank">{themeinfo}</a>'.replace('{themeinfo}', objectL10n.themeinfo));

	}

	jQuery( '#customize-theme-controls > ul' ).prepend('</li>');
	
	
	jQuery( '.ui-state-default' ).on( 'mousedown', function() {

		jQuery( '#customize-header-actions #save' ).trigger( 'click' );

	});
	
});
