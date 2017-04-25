/* global wp */
/* global tiCustomizerNotifyObject */
/* global console */
(function (api) {

    api.sectionConstructor['ti-customizer-notify-section'] = api.Section.extend({

        // No events for this type of section.
        attachEvents: function () {
        },

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    });

})(wp.customize);

jQuery(document).ready(function () {

    jQuery('.ti-customizer-notify-dismiss-recommended-action').click(function () {

        var id = jQuery(this).attr('id'),
            action = jQuery(this).attr('data-action');
        jQuery.ajax({
            type: 'GET',
            data: {action: 'ti_customizer_notify_dismiss_recommended_action', id: id, todo: action},
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
                if (jQuery('.recomended-actions_container > .epsilon-recommended-actions').length === 0) {

                    actions_count.remove();

                    if (jQuery('.recomended-actions_container > .epsilon-recommended-plugins').length === 0) {
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
            data: {action: 'ti_customizer_notify_dismiss_recommended_plugins', id: id, todo: action},
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

                if (jQuery('.recomended-actions_container > .epsilon-recommended-plugins').length === 0) {
                    jQuery('.control-section-ti-customizer-notify-recomended-section').remove();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
            }
        });
    });

    // Remove activate button and replace with activation in progress button.
    jQuery('.activate-now').live('DOMNodeInserted', function () {
        var activateButton = jQuery('.activate-now');
        if (activateButton.length) {
            var url = jQuery(activateButton).attr('href');
            if (typeof url !== 'undefined') {
                //Request plugin activation.
                jQuery.ajax({
                    beforeSend: function () {
                        jQuery(activateButton).replaceWith('<a class="button updating-message">' + tiCustomizerNotifyObject.activating_string + '...</a>');
                    },
                    async: true,
                    type: 'GET',
                    url: url,
                    success: function (data) {
                        //Reload the page.
                        location.reload();
                    }
                });
            }
        }
    });
});
