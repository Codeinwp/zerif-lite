jQuery(document).ready(function() {
    jQuery(".nav-tabs a").click(function(event) {
        event.preventDefault();
        jQuery(this).parent().addClass("active");
        jQuery(this).parent().siblings().removeClass("active");
        var tab = jQuery(this).attr("href");
        jQuery(".tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
    });
});