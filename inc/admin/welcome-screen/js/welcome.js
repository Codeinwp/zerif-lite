jQuery(document).ready(function() {
    jQuery(".zerif-lite-nav-tabs a").click(function(event) {
        event.preventDefault();
        jQuery(this).parent().addClass("active");
        jQuery(this).parent().siblings().removeClass("active");
        var tab = jQuery(this).attr("href");
        jQuery(".zerif-lite-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
    });
	
	/* If there are required actions, add an icon with the number of required actions */
	var zerif_actions_required_boxes = jQuery( '.zerif-action-required-box.active' );
	
	if( zerif_actions_required_boxes.length ) {
		jQuery('li.zerif-lite-w-red-tab a').append('<span class="zerif-lite-actions-count">' + zerif_actions_required_boxes.length + '</span>');
	}	
});