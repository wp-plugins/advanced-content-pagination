<?php

class Options {

    private $acp_option_slug = 'acp_options';
    // GENERAL SETTINGS
    public $acp_paging_on_off; // ACP content pagination, if 0 paging off else paging on
    public $acp_wp_shortcode_pagination_view; // if 1 default pagination else tabbed pagination 
    public $acp_plugin_pagination_type; // if 1 reload page else ajax
    public $acp_paging_buttons_location; //  if 1 top else if 2 bottom else both
    // PAGINATION BUTTONS STYLES
    public $acp_buttons_border_css; // pagination buttons border css
    public $acp_buttons_background_css; // pagination buttons background css
    public $acp_buttons_background_hover_css; // pagination buttons hover background css
    public $acp_buttons_font_css; // pagination buttons font css
    public $acp_buttons_text_color_css; // pagination buttons text color css
    public $acp_buttons_title_size_css; // pagination buttons text size css from 10px to 20px
    public $acp_buttons_visual_style; // pagination buttons visual style
    // PAGINATION ACTIVE BUTTON STYLES
    public $acp_active_button_border_css; // pagination active button border css
    public $acp_active_button_background_css; // pagination active button background css        
    public $acp_active_button_text_color_css; // pagination active button text color css

    function __construct() {
        $this->addOptions();
        $this->initOptions(get_option($this->acp_option_slug));
    }

    public function initOptions($serialize_options) {
        $options = unserialize($serialize_options);
        $this->acp_paging_on_off = $options['acp_paging_on_off'];
        $this->acp_wp_shortcode_for_acp_btns = $options['acp_wp_shortcode_for_acp_btns'];
        $this->acp_wp_shortcode_pagination_view = $options['acp_wp_shortcode_pagination_view'];
        $this->acp_plugin_pagination_type = $options['acp_plugin_pagination_type'];
        $this->acp_paging_buttons_location = $options['acp_paging_buttons_location'];
        $this->acp_buttons_border_css = $options['acp_buttons_border_css'];
        $this->acp_buttons_background_css = $options['acp_buttons_background_css'];
        $this->acp_buttons_background_hover_css = $options['acp_buttons_background_hover_css'];
        $this->acp_buttons_font_css = $options['acp_buttons_font_css'];
        $this->acp_buttons_text_color_css = $options['acp_buttons_text_color_css'];
        $this->acp_buttons_title_size_css = $options['acp_buttons_title_size_css'];
        $this->acp_buttons_desc_size_css = $options['acp_buttons_desc_size_css'];
        $this->acp_buttons_description_maxlength_css = $options['acp_buttons_description_maxlength_css'];
        $this->acp_buttons_visual_style = $options['acp_buttons_visual_style'];
        $this->acp_active_button_border_css = $options['acp_active_button_border_css'];
        $this->acp_active_button_background_css = $options['acp_active_button_background_css'];
        $this->acp_active_button_text_color_css = $options['acp_active_button_text_color_css'];
    }

    public function toArray() {
        $options = array(
            'acp_paging_on_off' => $this->acp_paging_on_off,
            'acp_wp_shortcode_for_acp_btns' => $this->acp_wp_shortcode_for_acp_btns,
            'acp_wp_shortcode_pagination_view' => $this->acp_wp_shortcode_pagination_view,
            'acp_plugin_pagination_type' => $this->acp_plugin_pagination_type,
            'acp_paging_buttons_location' => $this->acp_paging_buttons_location,
            'acp_buttons_border_css' => $this->acp_buttons_border_css,
            'acp_buttons_background_css' => $this->acp_buttons_background_css,
            'acp_buttons_background_hover_css' => $this->acp_buttons_background_hover_css,
            'acp_buttons_font_css' => $this->acp_buttons_font_css,
            'acp_buttons_text_color_css' => $this->acp_buttons_text_color_css,
            'acp_buttons_title_size_css' => $this->acp_buttons_title_size_css,
            'acp_buttons_desc_size_css' => $this->acp_buttons_desc_size_css,
            'acp_buttons_description_maxlength_css' => $this->acp_buttons_description_maxlength_css,
            'acp_buttons_visual_style' => $this->acp_buttons_visual_style,
            'acp_active_button_border_css' => $this->acp_active_button_border_css,
            'acp_active_button_background_css' => $this->acp_active_button_background_css,
            'acp_active_button_text_color_css' => $this->acp_active_button_text_color_css
        );

        return $options;
    }

    public function updateOptions() {
        update_option($this->acp_option_slug, serialize($this->toArray()));
    }

    private function addOptions() {
        $options = array(
            'acp_paging_on_off' => '1', // ACP content pagination, if 0 paging off else paging on
            'acp_wp_shortcode_pagination_view' => '2', // if 1 default pagination else tabbed pagination 
            'acp_plugin_pagination_type' => '1', // if 1 reload page else ajax
            'acp_paging_buttons_location' => '3', //  if 1 top else if 2 bottom else both
            'acp_buttons_border_css' => '1px solid #cccccc', // pagination buttons border css
            'acp_buttons_background_css' => '#dbdbdb', // pagination buttons background css
            'acp_buttons_background_hover_css' => '#e3e3e3', // pagination buttons hover background css
            'acp_buttons_font_css' => 'arial', // pagination buttons font css
            'acp_buttons_text_color_css' => '#333333', // pagination buttons text color css
            'acp_buttons_title_size_css' => '13px', // pagination buttons text size css from 10px to 20px 
            'acp_buttons_visual_style' => '1', // pagination buttons visual style
            // PAGINATION ACTIVE BUTTON STYLES
            'acp_active_button_border_css' => '1px solid #cccccc', // pagination active button border css
            'acp_active_button_background_css' => '#ffffff', // pagination active button background css        
            'acp_active_button_text_color_css' => '#333333'
        );
        add_option($this->acp_option_slug, serialize($options));
    }

}

?>