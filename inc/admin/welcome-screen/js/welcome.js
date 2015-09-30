jQuery(document).ready(function() {
    jQuery(".zerif-lite-nav-tabs a").click(function(event) {
        event.preventDefault();
        jQuery(this).parent().addClass("active");
        jQuery(this).parent().siblings().removeClass("active");
        var tab = jQuery(this).attr("href");
        jQuery(".zerif-lite-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
    });
	
	/* If there are required actions, add an icon with the number of required actions in the About Zerif page -> Actions required tab */
    var zerif_nr_actions_required = objectL10n2.nr_actions_required;

    if ( typeof zerif_nr_actions_required !== 'undefined' ) {
        jQuery('li.zerif-lite-w-red-tab a').append('<span class="zerif-lite-actions-count">' + objectL10n2.nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".zerif-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        console.log(id);
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'zerif_lite_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : objectL10n2.ajaxurl,
            beforeSend : function(data,settings){
               // $content.append('<div id="temp_load" style="text-align:center">\
                         //   <img src="' + $('#test').val() + '/images/ajax-loader.gif" />\
                           // </div>');
               // $(".loadMoreDiv").remove();
                console.log(data);
            },
            success    : function(data){
               // $("#temp_load").remove();
               // $data = $(data);
                //$content.append($data);
                console.log(data);
                console.log('id-' + data);
                jQuery('#'+ data).parent().remove();
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                //$("#temp_load").remove();
                alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

});