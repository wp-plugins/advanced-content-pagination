<?php

class frontend_style {

    public $options;

    function __construct($options) {
        $this->options = $options;
    }

    function frontend_styles() {
        if ($this->options->acp_wp_shortcode_pagination_view == 1) {
            ?>
            <style type="text/css" title="d">
                .acp_wrapper { clear: both; border-radius: 0px; } 
                .button_style { margin: 10px 2px 10px 0!important; padding:0px; text-align: center; color: <?php echo $this->options->acp_buttons_text_color_css; ?> !important; cursor: pointer; overflow: hidden; display: inline-block;}
                .button_style:hover { background: #CCCCCC;} 
                .button_style a { color: <?php echo $this->options->acp_buttons_text_color_css; ?> !important; text-decoration: none !important; display: block; width: 100%; height: 100%; overflow: hidden;}  
                .acp_page_number { float: left;  font-size:16px; line-height:30px; padding: 0px 10px; background:#AAAAAA; border:1px solid #AAAAAA !important; color:#FFFFFF; font-weight:bold; font-family:<?php echo $this->options->acp_buttons_font_css ?> }   
                .paging_btns li.nbox { width: auto !important; height: auto !important; padding: 1px; } 
                .paging_btns li.nbox a { height: auto !important; } 
                .paging_btns { list-style: none; margin: 0 auto!important; padding: 0; height: auto; text-align: center; } 
                .loader_container { position: absolute; display: none;  background: rgba(174,174,174,0.7); } 
                .loader { display: block;  width: 100px; height: auto; } 
                .paging_btns li.active .acp_page_number { background:#FFFFFF!important; color:#AAAAAA;cursor: default; border: 1px solid #AAAAAA!important; } 
            </style>
            <?php
        } else {
            if ($this->options->acp_buttons_visual_style == 2):
                ?>
                <style type="text/css" title="2">
                    .acp_wrapper { clear: both; border-radius: 0px; } 
                    .button_style { background: <?php echo $this->options->acp_buttons_background_css; ?>; margin: 10px 2px 10px 0!important; padding:0px; text-align: center; color: <?php echo $this->options->acp_buttons_text_color_css; ?> !important; cursor: pointer; overflow: hidden; display: inline-block;} 
                    .button_style:hover { background: <?php echo $this->options->acp_buttons_background_hover_css; ?>;} 
                    .button_style a { color: <?php echo $this->options->acp_buttons_text_color_css; ?> !important; text-decoration: none !important; display: block; width: 100%; height: 100%; overflow: hidden;} 
                    .paging_btns li.active { background: <?php echo $this->options->acp_active_button_background_css; ?> !important; color: <?php echo $this->options->acp_active_button_text_color_css; ?> !important;cursor: default;} 
                    .paging_btns li.active a { color: <?php echo $this->options->acp_active_button_text_color_css; ?> !important; cursor: default; } 
                    .acp_page_number { float: left;  font-size:16px; line-height:47px; padding: 0px 10px; background-color:#777777; color:#FFFFFF; font-weight:bold; font-family:<?php echo $this->options->acp_buttons_font_css ?> } 
                    .acp_title { font-size: <?php echo $this->options->acp_buttons_title_size_css; ?>; overflow: hidden; box-sizing: initial; height:47px; line-height:45px;  font-family:<?php echo $this->options->acp_buttons_font_css ?>; border: <?php echo $this->options->acp_buttons_border_css; ?>!important; } 
                    .paging_btns li.active .acp_title{ border: <?php echo $this->options->acp_active_button_border_css; ?> !important; } 
                    .paging_btns li.nbox { width: auto !important; height: auto !important; padding: 3px; } 
                    .paging_btns li.nbox a { height: auto !important; } 
                    .acp_content { text-align: justify; clear: both; } 
                    .paging_btns { list-style: none; margin: 0 auto!important; padding: 0; height: auto; text-align: center; } 
                    .loader_container { position: absolute; display: none; background: rgba(174,174,174,0.7); } 
                    .loader { display: block;  width: 100px; height: auto; } 
                    .acp_title_left { float: left; } 
                    .acp_desc { font-size: <?php echo $this->options->acp_buttons_desc_size_css; ?>; overflow: hidden; padding-left: 4px; } 
                    .acp_desc_left { float: left; } 
                    .acp_img_container { width: 50px; height: 50px; float: left;  } 
                    .acp_img_container_small { width: 30px; float: left; overflow-y: hidden; margin: 10px 0; } 
                    .acp_img { }
                </style>
            <?php elseif ($this->options->acp_buttons_visual_style == 1): ?>
                <style type="text/css" title="1">
                    .acp_wrapper { clear: both; border-radius: 0px; } 
                    .button_style { background: <?php echo $this->options->acp_buttons_background_css; ?>; margin: 10px 2px 10px 0!important; padding:0px; text-align: center; color: <?php echo $this->options->acp_buttons_text_color_css; ?> !important; cursor: pointer; overflow: hidden; display: inline-block;} 
                    .button_style:hover { background: <?php echo $this->options->acp_buttons_background_hover_css; ?>;} 
                    .button_style a { color: <?php echo $this->options->acp_buttons_text_color_css; ?> !important; text-decoration: none !important; display: block; width: 100%; height: 100%; overflow: hidden;} 
                    .paging_btns li.active { background: <?php echo $this->options->acp_active_button_background_css; ?> !important; color: <?php echo $this->options->acp_active_button_text_color_css; ?> !important;cursor: default;} 
                    .paging_btns li.active a { color: <?php echo $this->options->acp_active_button_text_color_css; ?> !important; cursor: default; } .acp_page_number { float: left;  font-size:16px; line-height: 47px; padding: 0px 10px; background-color:#777777; color:#FFFFFF; font-weight:bold; font-family:<?php echo $this->options->acp_buttons_font_css ?> } 
                    .acp_title { font-size: <?php echo $this->options->acp_buttons_title_size_css; ?>; overflow: hidden; box-sizing: initial; height:38px; padding-top:7px; line-height:17px;  font-family:<?php echo $this->options->acp_buttons_font_css ?>; border: <?php echo $this->options->acp_buttons_border_css; ?>!important; } 
                    .paging_btns li.active .acp_title{ border: <?php echo $this->options->acp_active_button_border_css; ?> !important; } 
                    .paging_btns li.nbox { width: auto !important; height: auto !important; padding: 3px; } 
                    .paging_btns li.nbox a { height: auto !important; } 
                    .acp_content { text-align: justify; clear: both; } 
                    .paging_btns { list-style: none; margin: 0 auto!important; padding: 0;  height: auto; text-align: center; } 
                    .loader_container { position: absolute; display: none; background: rgba(174,174,174,0.7); } 
                    .loader { display: block;  width: 100px; height: auto; } 
                    .acp_title_left { float: left; } 
                    .acp_desc { font-size: <?php echo $this->options->acp_buttons_desc_size_css; ?>; overflow: hidden; padding-left: 4px; } 
                    .acp_desc_left { float: left; } 
                    .acp_img_container { width: 50px; height: 50px; float: left;  } 
                    .acp_img_container_small { width: 30px; float: left; overflow-y: hidden; margin: 10px 0; } 
                    .acp_img { }
                </style>
                <?php
            endif;
        }
    }

}
?>