( function( api ) {

    // Extends our custom "customizer-info" section.
    api.sectionConstructor['customizer-info'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

    // Extends our custom "zerif-upsell-pro" section.
    api.sectionConstructor['zerif-upsell-pro'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

    // Extends our custom "zerif-upsell-features-1" section.
    api.sectionConstructor['zerif-upsell-features-1'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );