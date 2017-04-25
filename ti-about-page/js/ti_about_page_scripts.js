jQuery(document).ready(function () {

    /* If there are required actions, add an icon with the number of required actions in the About ti-about-page page -> Actions required tab */
    var ti_about_page_nr_actions_required = tiAboutPageObject.nr_actions_required;

    if ( (typeof ti_about_page_nr_actions_required !== 'undefined') && (ti_about_page_nr_actions_required != '0') ) {
        jQuery('li.ti-about-page-w-red-tab a').append('<span class="ti-about-page-actions-count">' + ti_about_page_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".ti-about-page-required-action-button").click(function() {

        var id = jQuery(this).attr('id'),
            action = jQuery(this).attr('data-action');

        jQuery.ajax({
            type      : "GET",
            data      : { action: 'ti_about_page_dismiss_required_action', id: id, todo: action },
            dataType  : "html",
            url       : tiAboutPageObject.ajaxurl,
            beforeSend: function (data, settings) {
                jQuery('.ti-about-page-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + tiAboutPageObject.template_directory + '/ti-about-page/images/ajax-loader.gif" /></div>');
            },
            success   : function (data) {
                location.reload();
                jQuery("#temp_load").remove();
                /* Remove loading gif */
            },
            error     : function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });
    // Remove activate button and replace with activation in progress button.
    jQuery('.activate-now').live('DOMNodeInserted', function () {
        var activateButton = jQuery(this);
        if (activateButton.length) {
            var url = jQuery(activateButton).attr('href');
            if (typeof url !== 'undefined') {
                //Request plugin activation.
                jQuery.ajax({
                    beforeSend: function () {
                        jQuery(activateButton).replaceWith('<a class="button updating-message">' + tiAboutPageObject.activating_string + '...</a>');
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