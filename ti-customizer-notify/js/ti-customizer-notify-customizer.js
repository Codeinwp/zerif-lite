/* global wp */
/* global tiCustomizerNotifyObject */
/* global console */
( function( api ) {

	api.sectionConstructor['ti-customizer-notify-section'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );

jQuery(document).ready(function(){

	jQuery('.ti-customizer-notify-dismiss-recommended-action').click(function () {

        var id = jQuery(this).attr('id'),
            action = jQuery(this).attr('data-action');
        jQuery.ajax({
            type: 'GET',
            data: { action: 'ti_customizer_notify_dismiss_recommended_action', id: id, todo: action },
            dataType: 'html',
            url: tiCustomizerNotifyObject.ajaxurl,
            beforeSend: function (data, settings) {
                jQuery('#' + id).parent().append('<div id="temp_load" style="text-align:center"><img src="' + tiCustomizerNotifyObject.base_path + '/images/spinner-2x.gif" /></div>');
            },
            success: function (data) {
                var container = jQuery('#' + data).parent().parent();
                var index = container.next().data('index');
                var recommended_sction = jQuery('#accordion-section-ti_customizer_notify_recomended_actions');
                var actions_count = recommended_sction.find('.ti-customizer-notify-actions-count');
                var section_title = recommended_sction.find('.section-title');
                jQuery('.ti-customizer-notify-actions-count .current-index').text(index);
                container.slideToggle().remove();
                if ( jQuery('.recomended-actions_container > .epsilon-recommended-actions').length === 0 ) {

                    actions_count.remove();

                    if ( jQuery('.recomended-actions_container > .epsilon-recommended-plugins').length === 0 ) {
                        jQuery('.control-section-ti-customizer-notify-recomended-actions').remove();
                    } else {
                        section_title.text(section_title.data('plugin_text'));
                    }
                	
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
            }
        });
    });

    jQuery('.ti-customizer-notify-dismiss-button-recommended-plugin').click(function () {

        var id = jQuery(this).attr('id'),
            action = jQuery(this).attr('data-action');
        jQuery.ajax({
            type: 'GET',
            data: { action: 'ti_customizer_notify_dismiss_recommended_plugins', id: id, todo: action },
            dataType: 'html',
            url: tiCustomizerNotifyObject.ajaxurl,
            beforeSend: function (data, settings) {
                jQuery('#' + id).parent().append('<div id="temp_load" style="text-align:center"><img src="' + tiCustomizerNotifyObject.base_path + '/images/spinner-2x.gif" /></div>');
            },
            success: function (data) {
                var container = jQuery('#' + data).parent().parent();
                var index = container.next().data('index');
                jQuery('.ti-customizer-notify-actions-count .current-index').text(index);
                container.slideToggle().remove();

                if ( jQuery('.recomended-actions_container > .epsilon-recommended-plugins').length === 0 ) {
                    jQuery('.control-section-ti-customizer-notify-recomended-section').remove();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
            }
        });
    });

    /* Open the link in a new tab, for Activate buttons */
    jQuery( '#customize-theme-controls' ).on( 'click', '#accordion-section-ti-customizer-notify-section a.activate-now', function ( e ) {

        e.preventDefault();

        if ( typeof jQuery(this).attr('href') !== 'undefined' ) {
            var url = jQuery(this).attr('href');

            if ( typeof url !== 'undefined' ) {

                /* open the activate page in a new tab */
                window.popup = window.open(url, '_blank');

                /* refresh the customizer page to actualize the activate button */
                window.popup.onload = function() {
                    location.reload();
                }
            }
        }

    } );

});