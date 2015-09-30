jQuery(document).ready(function() {

	jQuery( "#sortable" ).sortable();
	jQuery( "#sortable" ).disableSelection();

	var zerif_aboutpage = objectL10n.aboutpage;
	var zerif_nr_actions_required = objectL10n.nr_actions_required;

	/* Number of required actions */
	if ( (typeof zerif_aboutpage !== 'undefined') && (typeof zerif_nr_actions_required !== 'undefined') ) {

		jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + zerif_aboutpage + '"><span class="zerif-lite-actions-count">' + zerif_nr_actions_required + '</span></a>');

	}

	jQuery( '#customize-theme-controls > ul' ).prepend('<li class="accordion-section zerif-upsells">');

	jQuery( '.zerif-upsells' ).append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://themeisle.com/documentation-zerif-lite" class="button" target="_blank">{documentation}</a>'.replace('{documentation}',objectL10n.documentation));

	if (typeof zerif_aboutpage !== 'undefined') {

		jQuery('.zerif-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="' + zerif_aboutpage + '" class="button" target="_blank">{themeinfo}</a>'.replace('{themeinfo}', objectL10n.themeinfo));

	}

	jQuery( '.zerif-upsells' ).append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://github.com/Codeinwp/zerif-lite" class="button" target="_blank">{github}</a>'.replace('{github}',objectL10n.github));

	jQuery('.preview-notice').append('<a class="zerif-upgrade-to-pro-button" href="http://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/" class="button" target="_blank">{pro}</a>'.replace('{pro}',objectL10n.pro));

	jQuery( '#customize-theme-controls > ul' ).prepend('</li>');
	
	
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
