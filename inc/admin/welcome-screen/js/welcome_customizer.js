jQuery(document).ready(function() {
    var zerif_aboutpage = zerifLiteWelcomeScreenCustomizerObject.aboutpage;
    var zerif_nr_actions_required = zerifLiteWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof zerif_aboutpage !== 'undefined') && (typeof zerif_nr_actions_required !== 'undefined') && (zerif_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + zerif_aboutpage + '"><span class="zerif-lite-actions-count">' + zerif_nr_actions_required + '</span></a>');
    }

});