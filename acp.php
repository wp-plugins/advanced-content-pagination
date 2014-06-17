<?php
/*
  Plugin Name: Advanced Content Pagination
  Description: Creates fully customizable pagination buttons for post and page content with five different layouts
  Version: 1.0.0
  Author: gVectors Team (Artyom Chakhoyan, Gagik Zakaryan, Hakob Martirosyan)
  Author URI: http://www.gvectors.com/
  Plugin URI: http://www.gvectors.com/advanced-content-pagination/
 */

/*
  Copyright 2013 gConverter, LLC (email:support@gconverter.com)
  This program is not a free software; you can not re-sell and distribute it.
 */


if (!defined('WP_CONTENT_URL'))
    define('WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if (!defined('WP_CONTENT_DIR'))
    define('WP_CONTENT_DIR', ABSPATH . 'wp-content');
if (!defined('WP_PLUGIN_URL'))
    define('WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins');
if (!defined('WP_PLUGIN_DIR'))
    define('WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins');

define('PPACP_FOLDER', dirname(__FILE__) . '/');
define('PPACP_PATH', WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/');




include_once 'acp_css.php';
include_once 'acp_options.php';

class advanced_content_pagination {

    private $acp_options;
    private $options;
    private $acp_css;
    private $shortcode_content;
    private $pattern = '|\[nextpage[^\[\]]*\](.+?)\[/nextpage\]|is';
    private $page;
    private $query_page;
    private $curr_page = 0;
    private $loading_type;
    private $html_text;

    public function __construct() {
        $this->acp_options = new acp_options();
        $this->options = $this->acp_options->get_default_options();
        $this->acp_css = new frontend_style($this->options);

        $this->loading_type = intval($this->options->acp_plugin_pagination_type);

        add_action('init', array(&$this, 'add_buttons_and_ext_plugin'));
        add_action('admin_footer', array(&$this, 'add_dialog'));

        add_action('admin_menu', array(&$this, 'add_plugin_options_page'));
        add_action('admin_enqueue_scripts', array(&$this, 'admin_page_styles_scripts'));
        add_action('wp_enqueue_scripts', array(&$this->acp_css, 'frontend_styles'));
        add_action('wp_enqueue_scripts', array(&$this, 'front_end_styles_scripts'));

        if ($this->loading_type === 2) {
            add_action('wp_ajax_pp_with_ajax', array(&$this, 'pagination_with_ajax'));
            add_action('wp_ajax_nopriv_pp_with_ajax', array(&$this, 'pagination_with_ajax'));
        }

        if (intval($this->options->acp_paging_on_off) === 1) {
            if (function_exists('add_shortcode')) {
                add_shortcode('nextpage', array(&$this, 'nextpage_shortcode'));
            }
        }
    }

    /**
     * Scripts and styles registration on administration pages
     */
    public function admin_page_styles_scripts() {
        wp_register_style('plugin-css', plugins_url('advanced-content-pagination/files/css/plugin-style.css'));
        wp_enqueue_style('plugin-css');
        wp_register_style('modal-css', plugins_url('advanced-content-pagination/files/css/modal-box.css'));
        wp_enqueue_style('modal-css');
        wp_register_style('colorpicker-css', plugins_url('advanced-content-pagination/files/css/colorpicker.css'));
        wp_enqueue_style('colorpicker-css');
        wp_enqueue_script('colorpicker-js', plugins_url('advanced-content-pagination/files/js/colorpicker.js'), array('jquery'), '1.0.0', false);
        wp_enqueue_script('plugin-scripts', plugins_url('advanced-content-pagination/files/js/plugin-scripts.js'), array('jquery'), '1.0.0', false);


        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/MSIE/i', $u_agent)) {
            wp_register_style('modal-css-ie', plugins_url('advanced-content-pagination/files/css/modal-box-ie.css'));
            wp_enqueue_style('modal-css-ie');
        }

        wp_enqueue_media();
        wp_register_script('upload-window', WP_PLUGIN_URL . '/advanced-content-pagination/files/js/open_media_window.js', array('jquery', 'media-upload', 'thickbox'));
        wp_enqueue_script('upload-window');
    }

    /**
     * Styles and scripts registration to use on front page
     */
    public function front_end_styles_scripts() {
        wp_enqueue_script('front-end-scripts-js', plugins_url('advanced-content-pagination/files/js/front-end-scripts.js'), array('jquery'), '1.0.0', false);
        if ($this->loading_type === 2) {
            wp_enqueue_script('acp-ajax-js', plugins_url('advanced-content-pagination/files/js/acp-ajax.js'), array('jquery'), '1.0.0', false);
            wp_localize_script('jquery', 'acp_ajax_obj', array('url' => admin_url('admin-ajax.php')));
        }
        wp_register_style('jcarousel-style', plugins_url('advanced-content-pagination/files/css/jcarousel_style.css'));
        wp_enqueue_style('jcarousel-style');
        wp_register_style('jcarousel', plugins_url('advanced-content-pagination/files/css/jcarousel.css'));
        wp_enqueue_style('jcarousel');
        wp_enqueue_script('jcarousel-min-js', plugins_url('advanced-content-pagination/files/js/jquery.jcarousel.min.js'), array('jquery'), '0.3.0', false);
        wp_enqueue_script('jcarousel-js', plugins_url('advanced-content-pagination/files/js/jcarousel.responsive.js'), array('jquery'), '0.3.0', false);
    }

    /**
     * register options page for plugin
     */
    public function add_plugin_options_page() {
        if (function_exists('add_options_page')) {
            add_menu_page('AC Pagination', 'AC Pagination', 'manage_options', 'acp_options', array(&$this->acp_options, 'options_form'), plugins_url('advanced-content-pagination/files/img/web_site.png'), 100);
        }
    }

    /**
     * the function which will be called every time on finding shortcode in post content
     * @global type $post the current post with pagination
     * @param type $atts the shortcode attributes
     * @param type $content the shortcode content
     * @return type generated html content
     */
    public function nextpage_shortcode($atts, $content) {

        if (is_singular()) {
            global $post;
            $pages_count;
            $this->query_page = get_query_var('page') ? get_query_var('page') : 1;
            $this->page++;
            extract(shortcode_atts(array(
                        'title' => 'Title'
                            ), $atts), EXTR_OVERWRITE);

            $link;
            $anchor = '';

            if ($this->page == 1) {
                $link = get_permalink();
            } else {
                $link = get_permalink() . '&page=' . $this->page;
            }

            $link = _wp_link_page($this->page);
            $pattern = get_shortcode_regex();

            $link = substr_replace($link, $anchor . '">', -2);

            if (preg_match_all('/' . $pattern . '/s', $post->post_content, $matches) && array_key_exists(2, $matches) && in_array('nextpage', $matches[2])) {
                $pages_count = count($matches[2]);
            }
            $html;
            $active_item = '';

            if ($this->curr_page === $this->query_page - 1) {
                $this->shortcode_content = $content;
                $active_item = ' active';
                $link = '';
            }

            if ($pages_count == 1) {
                $html = $this->build_pagination_html($this->curr_page, $pages_count, $active_item, $this->page, $link, trim($title), do_shortcode($content));
            } else {
                $html = $this->build_pagination_html($this->curr_page, $pages_count, $active_item, $this->page, $link, trim($title), do_shortcode($this->shortcode_content));
            }

            $this->curr_page++;
            return $html;
        } else {
            return do_shortcode($content);
        }
    }

    /**
     * @param type $curr_page the i-th shortcode in post content
     * @param type $pages_count the shortcodes count in post content
     * @param type $active_item the active page 
     * @param type $page the i-th page
     * @param type $link the pages link
     * @param type $title the shortcode title attribute
     * @param type $shortcode_content the shortcode content
     * @return type HTML the generated html
     */
    private function build_pagination_html($curr_page, $pages_count, $active_item, $page, $link, $title, $shortcode_content) {
        $html = '';

        $btn_visual_style = intval($this->options->acp_buttons_visual_style);
        $acp_wp_shortcode_pagination_view = intval($this->options->acp_wp_shortcode_pagination_view);

        $acp_paging_buttons_location = intval($this->options->acp_paging_buttons_location);


        if ($acp_wp_shortcode_pagination_view === 1) {
            $btn_visual_style = -1;
        }

        // check pagination loading type if 1 reload page else type = AJAX loading
        if ($this->loading_type === 1) {
            // ==================================================================================================             
            if ($btn_visual_style === 1) { // Buttons with only title
                include 'buttons_layouts/page_reload/button_layout_1.php';
            }
            // ================================================================================================== 
            else if ($btn_visual_style === 2) { // Buttons with page number and title
                include 'buttons_layouts/page_reload/button_layout_2.php';
            }
            // ================================================================================================== 
            else {
                include 'buttons_layouts/page_reload/button_layout_3.php';
            }
        }
        // =============================== Pagination HTML for AJAX ==================================== 
        else {
            // ==================================================================================================             
            if ($btn_visual_style === 1) { // Buttons with only title
                include 'buttons_layouts/ajax_load/button_layout_1_js.php';
            }
            // ================================================================================================== 
            else if ($btn_visual_style === 2) { // Buttons with page number and title
                include 'buttons_layouts/ajax_load/button_layout_2_js.php';
            }
            // ================================================================================================== 
            else { // Buttons with page number only
                include 'buttons_layouts/ajax_load/button_layout_3_js.php';
            }
        }
        return $html;
    }

    /**
     * load shortcode content via ajax
     */
    public function pagination_with_ajax() {
        $acp_pid = $_POST['acp_pid'];
        $acp_currpage = $_POST['acp_currpage'];
        $acp_shortcode = $_POST['acp_shortcode'];
        $response;
        if ($acp_shortcode == 'acp_shortcode') {
            // advanced pagination shortcode
            $response = $this->acp_pagination_ajax($acp_pid, $acp_currpage);
        } else {
            $response = 'No Content';
        }
        echo do_shortcode($response);
        exit;
    }

    function ck13_fbgm_terms($atts) {
        global $post;
        extract(shortcode_atts(array(
                    'ck_term' => '',
                    'ck_sep' => ', ',
                    'ck_before' => '',
                    'ck_after' => ''
                        ), $atts));

        $show_the_terms = "";
        $show_the_terms .= get_the_term_list($post->ID, "$ck_term", "$ck_before", "$ck_sep", "$ck_after");
        return $show_the_terms;
    }

    /**
     * @param type $id the post id
     * @param type $curr_page the i-th page
     * @return type HTML 
     */
    public function acp_pagination_ajax($id, $curr_page) {
        $post = get_post($id);
        $content = $post->post_content;
        preg_match_all($this->pattern, $content, $matches, PREG_SET_ORDER);
        for ($i = 0; $i < count($matches); $i++) {
            $shortcode_content_array[] = $matches[$i][1];
        }
        $shortcode_content = $shortcode_content_array[$curr_page - 1];
        $shortcode_content = do_shortcode($shortcode_content);
        $shortcode_content = str_replace(']]>', ']]&gt;', $shortcode_content);
        return $shortcode_content;
    }

    /**
     * register editor plugin javascript if current user can edit posts      
     */
    function add_buttons_and_ext_plugin() {
        if ($this->options->acp_paging_on_off && $this->options->acp_wp_shortcode_pagination_view == 2) {
            if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
                return;
            }

            if (get_user_option('rich_editing') == 'true') {
                add_filter('mce_buttons', array(&$this, 'add_mce_buttons'), -1);
                add_filter('mce_external_plugins', array(&$this, 'add_mce_external_plugins'), -1);
            }
        }
    }

    /**
     * add button on wordpress post editor panel
     */
    function add_mce_buttons($buttons) {
        global $tinymce_version;
        if (version_compare($tinymce_version, '4018') >= 0) {
            array_push($buttons, 'dialog');
        } else {
            array_push($buttons, '|', 'dialog_button');
        }
        return $buttons;
    }

    /**
     * register editor plugin
     * @return registered plugins array
     */
    function add_mce_external_plugins() {
        global $tinymce_version;
        if (function_exists("plugins_url")) {
            // if wordpress version > 2.4
            if (version_compare($tinymce_version, '4018') >= 0) {
                $plugin_array['ACPPlugin'] = plugins_url('/advanced-content-pagination/files/js/editor_plugin_3.9.js');
            } else {
                $plugin_array['ACPPlugin'] = plugins_url('/advanced-content-pagination/files/js/editor_plugin_3.8.3.js');
            }
        } else {
            // if wordpress version < 2.4
            $plugin_array['ACPPlugin'] = site_url() . '/wp-content/plugins/advanced-content-pagination/files/js/editor_plugin_3.8.3.js';
        }
        return $plugin_array;
    }

    /**
     * 
     * @param type string button title
     * @return formatted title
     */
    public function acp_button_text($title, $length = 55) {
        if (function_exists('mb_strlen')) {
            if (mb_strlen($title, mb_internal_encoding()) > $length) {
                $title = mb_substr($title, 0, $length, mb_internal_encoding()) . '...';
            }
        } else {
            if (strlen($title) > $length) {
                $title = substr($title, 0, $length) . '...';
            }
        }
        return $title;
    }

    /**
     * the dialog html to add shortcodes
     */
    function add_dialog() {
        // the layout with title and paging number
        $button_style_2 = $this->options->acp_buttons_visual_style == 2;
        ?>
        <style>#TB_window{ background:#F0F0F0}</style>

        <div id="acp_dialog" style="display:none;">
            <div class="shortcode_dialog" style="padding:0px 20px 20px 20px;">    
                <h2 style="font-weight:normal; padding-bottom:10px;"><?php _e('Pagination Button Components'); ?> </h2>

                <div class="acp_title_wrap">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td style="width:160px; vertical-align:top; padding-top:5px;"><label class="shortcode_title" for="shortcode_title" style="font-size:13px; font-weight:bold;color:#333333"><?php _e('Button Title:'); ?></label></td>
                            <td>
                                <input id="shortcode_title" class="shortcode_title" type="text"  style="border:#cccccc 1px solid; padding:3px 3px; width:350px; font-size:16px;" maxlength="100" />
                                <br />
                                <span style="font-size:12px; font-style:italic; color:#555555; cursor:help;"><?php _e('maximum characters'); ?> 
                                    <span title="Pagination Button Layout #1 with image title and description">L1:15</span> , 
                                    <span title="Pagination Button Layout #2 with title and description">L2:24</span> , 
                                    <span title="Pagination Button Layouts #3, #4 and #5">L3,L4,L5:43</span>
                                </span>
                                <div class="error_msg"><span class="required_field"><?php _e('The title is required field!'); ?></span></div></td>
                        </tr>
                    </table>
                </div>

                <div class="submit_container" style="text-align:right; padding-right:50px; display:block; padding-top:15px;">
                    <button id="insert_shorcode" class="insert_shortcode button button-primary button-large"><?php _e('Insert Page'); ?></button>
                </div>

                <div class="button_layout_wrapper">
                    <div style="margin:10px auto; font-size: 15px; font-weight: bold; text-align: center">
                        Current button layout on website
                    </div>

                    <div class="acp_button_layout">                    
                        <style type="text/css">

                            .acp_button_layout {
                                border: <?php echo $this->options->acp_buttons_border_css; ?>;
                                background: <?php echo $this->options->acp_buttons_background_css; ?>;
                                color: <?php echo $this->options->acp_buttons_text_color_css; ?> !important;
                                margin: 25px auto;
                                width: 200px;
                                text-align: center;
                                overflow: hidden;
                                height: 50px;
                            }

                            .acp_button_number {
                                width: 50px;
                                height: 50px;
                                float: left;
                                margin-right: 3px;
                                background-color: #777;
                                font-family: arial;
                                font-weight: bold;
                                line-height: 50px;
                                color: #fff;
                                font-size: 16px;
                            }

                            .acp_button_title {
                                font-size: <?php echo $this->options->acp_buttons_title_size_css; ?>;
                                overflow: hidden;
                            }

                            .align_left {
                                width: 50px;
                                height: 50px;
                            }
                        </style>

                        <?php if ($button_style_2) { ?>
                            <div class="acp_button_number">
                                <span class="align_left">1</span>
                            </div>
                        <?php } ?>
                        <div class="acp_button_title"></div>                        
                    </div>

                </div>

            </div>
        </div>
        <?php
    }

}

$wp_acp = new advanced_content_pagination();
?>