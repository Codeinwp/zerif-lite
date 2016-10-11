( function( api ) {

	// Extends our custom "zerif-upsell" section.
	api.sectionConstructor['zerif-upsell'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
