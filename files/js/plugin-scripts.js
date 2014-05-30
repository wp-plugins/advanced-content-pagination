jQuery(document).ready(function(){      
    
    var pickerImg1 = jQuery('.colorpicker_img1');
    var modalBox1 = jQuery('div#box1');
    var position1 = pickerImg1.position();
    /*modalBox1.css('margin-left', position1.left + 200);*/
    jQuery('#colorpickerHolder1').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            jQuery('#acp_buttons_background_css').val('#' + hex);
        }
    });
    
    var pickerImg2 = jQuery('.colorpicker_img2');
    var modalBox2 = jQuery('div#box2');
    var position2 = pickerImg2.position();
    /*modalBox2.css('margin-left', position2.left + 200);*/
    jQuery('#colorpickerHolder2').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            jQuery('#acp_buttons_background_hover_css').val('#' + hex);
        }
    });
    
    var pickerImg3 = jQuery('.colorpicker_img3');
    var modalBox3 = jQuery('div#box3');
    var position3 = pickerImg3.position();
    /*modalBox3.css('margin-left', position3.left + 200);*/
    jQuery('#colorpickerHolder3').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            jQuery('#acp_buttons_text_color_css').val('#' + hex);
        }
    });
    
    var pickerImg4 = jQuery('.colorpicker_img4');
    var modalBox4 = jQuery('div#box4');
    var position4 = pickerImg4.position();
    //    modalBox3.css('margin-left', position3.left + 200);
    jQuery('#colorpickerHolder4').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            jQuery('#acp_active_button_background_css').val('#' + hex);
        }
    });

    var pickerImg5 = jQuery('.colorpicker_img5');
    var modalBox5 = jQuery('div#box5');
    var position5 = pickerImg5.position();
    /*modalBox3.css('margin-left', position3.left + 200);*/
    jQuery('#colorpickerHolder5').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            jQuery('#acp_active_button_text_color_css').val('#' + hex);
        }
    });
    
    if (jQuery('#acp_paging_on_off').val() == 1) {
        jQuery(this).attr('checked', true);
    }
    
    jQuery('#acp_paging_on_off').change(function(){
        if (jQuery(this).is(':checked')) {
            jQuery(this).val('1');
        } else {
            jQuery(this).val('0');
        }
    });
    
    jQuery('#acp_default_paging_on_off').change(function(){
        if (jQuery(this).is(':checked')) {
            jQuery(this).val('1');
        } else {
            jQuery(this).val('0');
        }
    }); 
    
    
    if (jQuery('#shortcode_default').is(':checked')) {
        jQuery('.paging_btn_layout').hide();
    } else {
        jQuery('.paging_btn_layout').show();
    }
    
    jQuery('input[name=acp_wp_shortcode_pagination_view]').change(function(){               
        if (jQuery('#shortcode_default').is(':checked')) {
            jQuery('.paging_btn_layout').hide();
        } else {
            jQuery('.paging_btn_layout').show();
        }
    });
});