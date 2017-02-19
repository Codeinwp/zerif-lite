( function( api ) {

    // Extends our custom "zerif-theme-info" section.
    api.sectionConstructor['zerif-theme-info'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );