/* global jQuery */
/* global wp */
jQuery(document).ready( function($) {
    'use strict';

    $(document).on('change','.custom_media_url',function() {
        var value = $.trim($(this).val());
        var image_input = $(this).parent().find('.custom_media_image');
        var media_id = $(this).parent().parent().find('.custom_media_id');
        if(value.length === 0){
            image_input.attr('src','');
            image_input.attr('alt','');
            media_id.val('');
        }
        var saveBtn = $(this).closest('.form').find('.widget-control-save');
        if (typeof saveBtn !== 'undefined') {
            saveBtn.trigger( "click" );
        }
    });

    function media_upload(button_class) {
        var _custom_media = true;

        $('body').on('click', button_class, function() {

            var button_id ='#'+$(this).attr('id');
            var media_id = jQuery(this).parent().parent().children('.custom_media_id');
            var display_field = jQuery(this).parent().children('input:text');
            var display_image = jQuery(this).parent().children('.custom_media_image');
            var image_in_customizer = jQuery(this).parent().children('.custom_media_display_in_customizer');

            _custom_media = true;

            wp.media.editor.send.attachment = function(props, attachment) {
                if( typeof attachment !== 'undefined' ) {
                    if ( _custom_media ) {
                        if ( typeof display_field !== 'undefined' ) {

                            if( typeof attachment.id !== 'undefined' ) {
                                media_id.val(attachment.id);
                            }

                            if ( typeof attachment.sizes !== 'undefined' ) {
                                if ( typeof attachment.sizes.thumbnail !== 'undefined' ) {
                                    if (typeof(attachment.sizes.thumbnail.url) !== 'undefined') {
                                        display_image.attr('src', attachment.sizes.thumbnail.url).css('display', 'block');
                                        image_in_customizer.val(attachment.sizes.thumbnail.url);
                                    }
                                }
                                else {
                                    if( typeof attachment.url !== 'undefined' ) {
                                        display_image.attr('src', attachment.url).css('display', 'block');
                                        image_in_customizer.val(attachment.url);
                                    }
                                }
                            }
                            else {
                                if ( typeof attachment.url !== 'undefined' ) {
                                    display_image.attr('src', attachment.url).css('display', 'block');
                                    image_in_customizer.val(attachment.url);
                                }
                            }

                            switch (props.size) {
                                case 'full':
                                    display_field.val(attachment.sizes.full.url);
                                    break;
                                case 'medium':
                                    display_field.val(attachment.sizes.medium.url);
                                    break;
                                case 'thumbnail':
                                    display_field.val(attachment.sizes.thumbnail.url);
                                    break;
                                default:
                                    display_field.val(attachment.url);
                                    break;
                            }
                            display_field.trigger('change');
                        }
                    } else {
                        return wp.media.editor.send.attachment(button_id, [props, attachment]);
                    }
                }
            };

            wp.media.editor.open(button_class);
            window.send_to_editor = function (html) {

            };
            return false;
        });
    }

    media_upload('.custom_media_button');
});