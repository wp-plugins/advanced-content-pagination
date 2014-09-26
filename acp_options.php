<?php
include_once 'acp-plugin-options.php';

class acp_options {

    private $options;

    public function __construct() {
        $this->options = new Options();
    }

    public function get_default_options() {
        return $this->options;
    }

    /**
     * Builds options page
     */
    public function options_form() {

        if (isset($_POST['submit'])) {

            if (function_exists('current_user_can') && !current_user_can('manage_options')) {
                die(_e('Hacker?', 'ac_paging'));
            }

            if (function_exists('check_admin_referer')) {
                check_admin_referer('acp_options_form');
            }

            $this->options->acp_paging_on_off = $_POST['acp_paging_on_off'];
            $this->options->acp_wp_shortcode_pagination_view = $_POST['acp_wp_shortcode_pagination_view'];
            $this->options->acp_plugin_pagination_type = $_POST['acp_plugin_pagination_type'];
            $this->options->acp_paging_buttons_location = $_POST['acp_paging_buttons_location'];            
            $this->options->acp_do_shortcodes_excerpts = isset($_POST['acp_do_shortcodes_excerpts']) ?  $_POST['acp_do_shortcodes_excerpts'] : 1;
            $this->options->acp_excerpts_count = isset($_POST['acp_excerpts_count']) ? $_POST['acp_excerpts_count'] : 55;
            $this->options->acp_buttons_border_css = $_POST['acp_buttons_border_css'];
            $this->options->acp_buttons_background_css = $_POST['acp_buttons_background_css'];
            $this->options->acp_buttons_background_hover_css = $_POST['acp_buttons_background_hover_css'];
            $this->options->acp_buttons_font_css = $_POST['acp_buttons_font_css'];
            $this->options->acp_buttons_text_color_css = $_POST['acp_buttons_text_color_css'];
            $this->options->acp_buttons_title_size_css = $_POST['acp_buttons_title_size_css'];
            $this->options->acp_buttons_visual_style = $_POST['acp_buttons_visual_style'];
            $this->options->acp_active_button_border_css = $_POST['acp_active_button_border_css'];
            $this->options->acp_active_button_background_css = $_POST['acp_active_button_background_css'];
            $this->options->acp_active_button_text_color_css = $_POST['acp_active_button_text_color_css'];
            
            

            $this->options->updateOptions();
        }
        ?>
        <div class="wrap">

            <div style="float:left; width:34px; height:34px; margin:10px 10px 20px 0px;"><img src="<?php echo plugins_url('advanced-content-pagination/files/img/acp.gif'); ?>" style="width:34px;"/></div><h2><?php _e('Advanced Content Pagination Settings', 'ac_paging'); ?></h2>
            <br style="clear:both" />
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=acp_options&updated=true" method="post" name="acp_options">
                <?php
                if (function_exists('wp_nonce_field')) {
                    wp_nonce_field('acp_options_form');
                }
                ?>

                <?php
                include 'options_layouts/promo.php';
                ?>

                <table cellspacing="0" class="wp-list-table widefat plugins">
                    <thead>
                        <tr>
                            <th colspan="4" scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="4">&nbsp;</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        include 'options_layouts/settings-general.php';
                        include 'options_layouts/settings-button-style.php';
                        include 'options_layouts/settings-button-active-style.php';
                        include 'options_layouts/settings-button-layouts.php';
                        ?>

                        <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
                            <td colspan="4">
                                <p class="submit">
                                    <input type="submit" class="button button-primary" name="submit" value="<?php _e('Save Changes') ?>" />
                                </p>
                            </td>
                        </tr>

                    <input type="hidden" name="action" value="update" />
                    </tbody>
                </table>

            </form>
        </div>
        <?php
    }

}
?>