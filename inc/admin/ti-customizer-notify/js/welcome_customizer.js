/* global wp */
/* global tiCustomizerNotifyWelcomeScreenObject */
/* global console */
( function( api ) {

	// Extends our custom "affluent-pro-section" section.
	api.sectionConstructor['affluent-recommended-section'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );

jQuery(document).ready(function(){

	jQuery('.affluent-dismiss-required-action').click(function () {

        var id = jQuery(this).attr('id'),
            action = jQuery(this).attr('data-action');
        jQuery.ajax({
            type: 'GET',
            data: { action: 'ti_customizer_notify_dismiss_required_action', id: id, todo: action },
            dataType: 'html',
            url: tiCustomizerNotifyWelcomeScreenObject.ajaxurl,
            beforeSend: function (data, settings) {
                jQuery('#' + id).parent().append('<div id="temp_load" style="text-align:center"><img src="' + tiCustomizerNotifyWelcomeScreenObject.base_path + '/images/spinner-2x.gif" /></div>');
            },
            success: function (data) {
                var container = jQuery('#' + data).parent().parent();
                var index = container.next().data('index');
                var recommended_sction = jQuery('#accordion-section-affluent_recomended-section');
                var actions_count = recommended_sction.find('.affluent-actions-count');
                var section_title = recommended_sction.find('.section-title');
                jQuery('.affluent-actions-count .current-index').text(index);
                container.slideToggle().remove();
                if ( jQuery('.recomended-actions_container > .epsilon-required-actions').length === 0 ) {

                    actions_count.remove();

                    if ( jQuery('.recomended-actions_container > .epsilon-recommended-plugins').length === 0 ) {
                        jQuery('.control-section-affluent-recomended-section').remove();
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

    jQuery('.affluent-recommended-plugin-button').click(function () {

        var id = jQuery(this).attr('id'),
            action = jQuery(this).attr('data-action');
        jQuery.ajax({
            type: 'GET',
            data: { action: 'affluent_dismiss_recommended_plugins', id: id, todo: action },
            dataType: 'html',
            url: tiCustomizerNotifyWelcomeScreenObject.ajaxurl,
            beforeSend: function (data, settings) {
                jQuery('#' + id).parent().append('<div id="temp_load" style="text-align:center"><img src="' + tiCustomizerNotifyWelcomeScreenObject.base_path + '/images/spinner-2x.gif" /></div>');
            },
            success: function (data) {
                var container = jQuery('#' + data).parent().parent();
                var index = container.next().data('index');
                jQuery('.affluent-actions-count .current-index').text(index);
                container.slideToggle().remove();

                if ( jQuery('.recomended-actions_container > .epsilon-recommended-plugins').length === 0 ) {
                    jQuery('.control-section-affluent-recomended-section').remove();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
            }
        });
    });

});