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
                
                

	<table width="100%" border="0">
          <tr>
            <td style="padding:10px; padding-left:0px; vertical-align:top; width:500px;">
            
            	<table width="100%" border="0" cellspacing="1" class="widefat">
                
                <tr>
                <td style="width:500px; padding-top:10px;">
                  
                    <div id="home_left_box2" style="margin:0px auto;">
                        <div id="innerblock">
                            <div id="gconverter">
                                <div style="text-align:center;">
                                	<a href="http://www.gvectors.com/advanced-content-pagination/"><img src="<?php echo PPACP_PATH ?>promo/img/1.png" /></a>
                                    <p style="padding-top:0px; white-space:nowrap; text-align:left;"><br />
                                    <a href="http://www.gvectors.com/advanced-content-pagination/">
                                    <span style="font-size:16px; font-weight:bold; font-family:Georgia, 'Times New Roman', Times, serif;">Advanced Content Pagination PRO</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.gvectors.com/advanced-content-pagination/" target="_blank" class="button button-primary">Update to Pro Now!</a>&nbsp;<a href="http://www.gvectors.net/acp/advanced-content-pagination/" target="_blank" class="button button-primary">Demo</a>
                                    </a>
                                    <br />
                                    <span style="font-size:13px; line-height:25px; white-space:nowrap">ACP Pro allows you to add subPage Title, Image and Description on pagination buttons.</span>
                                    </p>
                                </div>
                            </div>
                        	<span id="ribbon-left"></span>
                        </div>
                        <div id="frame">
                         </div>
                    </div>
                </td>
                </tr>
                </table>
            </td>
            <td valign="top" style="padding:10px; padding-right:0px;">
            	
                <table width="100%" border="0" cellspacing="1" class="widefat">
                    <thead><tr><th>&nbsp;Like Advanced Content Pagination plugin?</th></tr></thead>
                        <tr valign="top">
                            <td style="background:#FFF; text-align:left; font-size:12px;">
                            <ul>
                            <li>If you like ACP and want to encourage us to develop and maintain it,why not do any or all of the following:</li>
                            <li>- Link to it so other folks can find out about it.</li>
                            <li>- Give it a good rating on <a href="http://wordpress.org/extend/plugins/advanced-content-pagination/" target="_blank">WordPress.org.</a></li>
                            <li>- We spend as much of my spare time as possible working on Advanced Content Pagination and any donation is appreciated. Donations play a crucial role in supporting Free and Open Source Software projects. <div style="width:200px; float:right;">
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick"><input type="hidden" name="hosted_button_id" value="UAM3E699GTZ64"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"><img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1"></form>
                            </div>
                            <h4>You have my sincere thanks and appreciation for using <em>ACP</em>.</h4>
                            <div style="clear:both;"></div>
                            </li>
                            </ul>
                            </td>
                        </tr>
                </table>
                <br />
                <table width="100%" border="0" cellspacing="1" class="widefat">
                    <thead><tr><th>&nbsp;Need Help?</th></tr></thead>
                    <tr valign="top"><td style="background:#FFF;text-align:left; font-size:13px; line-height:16px;"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td> If you need help with this plugin or if you want to make a suggestion, then please visit to our support Q&amp;A forum.</td><td><a href="http://www.gvectors.com/questions/" class="button button-primary" target="_blank">ACP Support Forum</a></td></tr></table></td></tr></table></td></tr>
        		</table>
                
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
                        <tr>
                            <th colspan="4" scope="col"><h2>General Settings</h2></th>
                    </tr>
                    <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
                        <th scope="row">
                            Turn on/off Content Pagination
                        </th>
                        <td colspan="3">                                
                            <label for="acp_paging_on_off">
                                <input type="checkbox" <?php checked($this->options->acp_paging_on_off == 1) ?> value="<?php echo $this->options->acp_paging_on_off; ?>" name="acp_paging_on_off" id="acp_paging_on_off" />
                            </label>
                        </td>
                    </tr>

                    <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
                        <th scope="row">Pagnation Buttons Layout</th>
                        <td colspan="3">
                            <fieldset>
                                <?php
                                $acp_def_shortcode = $this->options->acp_wp_shortcode_pagination_view;
                                ?>
                                <label title="default">
                                    <input type="radio" value="1" <?php checked('1' == $acp_def_shortcode); ?> name="acp_wp_shortcode_pagination_view" id="shortcode_default" /> 
                                    <span>Default</span>
                                </label><br>
                                <label title="tabbed">
                                    <input type="radio" value="2" <?php checked('2' == $acp_def_shortcode); ?> name="acp_wp_shortcode_pagination_view" id="shortcode_tabbed" /> 
                                    <span>Tabbed</span>
                                </label><br>                                    
                            </fieldset>
                        </td>
                    </tr>


                    <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
                        <th scope="row">Pagnation loading type</th>
                        <td colspan="3">
                            <fieldset>
                                <?php
                                $acp_plug_shortcode = $this->options->acp_plugin_pagination_type;
                                ?>
                                <label title="reload page">
                                    <input type="radio" value="1" <?php checked('1' == $acp_plug_shortcode); ?> name="acp_plugin_pagination_type" /> 
                                    <span>Reload Page</span>
                                </label><br>
                                <label title="ajax">
                                    <input type="radio" value="2" <?php checked('2' == $acp_plug_shortcode); ?> name="acp_plugin_pagination_type" /> 
                                    <span>Ajax</span>
                                </label><br>                                    
                            </fieldset>
                        </td>
                    </tr>

                    <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
                        <th scope="row">Pagination Button Location:</th>
                        <td colspan="3">
                            <fieldset>
                                <?php
                                $acp_pag_buttons_loc = $this->options->acp_paging_buttons_location;
                                ?>
                                <label title="top">
                                    <input type="radio" value="1" <?php checked('1' == $acp_pag_buttons_loc); ?>  name="acp_paging_buttons_location" /> 
                                    <span>Top</span>
                                </label><br>
                                <label title="bottom">
                                    <input type="radio" value="2" <?php checked('2' == $acp_pag_buttons_loc); ?> name="acp_paging_buttons_location" /> 
                                    <span>Bottom</span>
                                </label><br>
                                <label title="both">
                                    <input type="radio" value="3" <?php checked('3' == $acp_pag_buttons_loc); ?> name="acp_paging_buttons_location" /> 
                                    <span>Both</span>
                                </label><br>
                            </fieldset>
                        </td>
                    </tr>

                    <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0">
                        <th colspan="4" scope="col"><h2>Pagination Button Style</h2></th>
                    </tr>

                    <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
                        <th scope="row">
                            <label for="acp_buttons_border_css">Button Border CSS:</label>
                        </th>
                        <td colspan="3">
                            <input type="text" class="regular-text" value="<?php echo $this->options->acp_buttons_border_css; ?>" id="acp_buttons_border_css" name="acp_buttons_border_css" placeholder="<?php _e('Example: 1px solid #ff0000', 'ac_paging'); ?>"/>
                        </td>
                    </tr>

                    <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
                        <th scope="row">
                            <label for="acp_buttons_background_css">Button Background Color: </label>
                        </th>
                        <td class="picker_input_cell">
                            <input type="text" class="regular-text" value="<?php echo $this->options->acp_buttons_background_css; ?>" id="acp_buttons_background_css" name="acp_buttons_background_css" placeholder="<?php _e('Example: #0000ff', 'ac_paging'); ?>"/>
                        </td>

                        <td class="picker_img_cell">
                            <a href="#openModal1">
                                <img class="colorpicker_img1" src="<?php echo plugins_url('advanced-content-pagination/files/img/colorpicker_icon_22.png'); ?>" />
                            </a>
                        </td>
                        <td class="color_picker">
                            <div id="openModal1" class="modalDialog">
                                <div id="box1" style="border-top-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px;">
                                    <a href="#close" title="Close" class="close">X</a>
                                    <h2>Color Picker</h2>
                                    <p id="colorpickerHolder1"></p>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
                        <th scope="row">
                            <label for="acp_buttons_background_hover_css">Button Hover Background Color: </label>
                        </th>
                        <td>
                            <input type="text" class="regular-text" value="<?php echo $this->options->acp_buttons_background_hover_css; ?>" id="acp_buttons_background_hover_css" name="acp_buttons_background_hover_css" placeholder="<?php _e('Example: #00ff00', 'ac_paging'); ?>"/>
                        </td>

                        <td class="picker_img_cell">
                            <a href="#openModal2">
                                <img class="colorpicker_img2" src="<?php echo plugins_url('advanced-content-pagination/files/img/colorpicker_icon_22.png'); ?>" />
                            </a>
                        </td>
                        <td class="color_picker">
                            <div id="openModal2" class="modalDialog">
                                <div id="box2">
                                    <a href="#close" title="Close" class="close">X</a>
                                    <h2>Color Picker</h2>
                                    <p id="colorpickerHolder2"></p>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
                        <th scope="row">
                            <label for="acp_buttons_font_css">Button Text Font:  </label>
                        </th>
                        <td colspan="3">
                            <input type="text" class="regular-text" value="<?php echo $this->options->acp_buttons_font_css; ?>" id="acp_buttons_font_css" name="acp_buttons_font_css" placeholder="<?php _e('Example: Times New Roman, Times, serif', 'ac_paging'); ?>"/>
                        </td>
                    </tr>

                    <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
                        <th scope="row">
                            <label for="acp_buttons_text_color_css">Button Text Color: </label>
                        </th>
                        <td>
                            <input type="text" class="regular-text" value="<?php echo $this->options->acp_buttons_text_color_css; ?>" id="acp_buttons_text_color_css" name="acp_buttons_text_color_css" placeholder="<?php _e('Example: #f0000f', 'ac_paging'); ?>"/>
                        </td>

                        <td class="picker_img_cell">
                            <a href="#openModal3">
                                <img class="colorpicker_img3" src="<?php echo plugins_url('advanced-content-pagination/files/img/colorpicker_icon_22.png'); ?>" />
                            </a>
                        </td>
                        <td class="color_picker">
                            <div id="openModal3" class="modalDialog">
                                <div id="box3">
                                    <a href="#close" title="Close" class="close">X</a>
                                    <h2>Color Picker</h2>
                                    <p id="colorpickerHolder3"></p>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0">
                        <th scope="row">
                            <label for="acp_buttons_title_size_css">Button Title Size: </label>
                        </th>
                        <td colspan="3">
                            <select id="acp_buttons_title_size_css" name="acp_buttons_title_size_css">
                                <?php $acp_btns_text_size = $this->options->acp_buttons_title_size_css; ?>
                                <option value="10px" <?php selected($acp_btns_text_size, '10px'); ?>>10px</option>
                                <option value="11px" <?php selected($acp_btns_text_size, '11px'); ?>>11px</option>
                                <option value="12px" <?php selected($acp_btns_text_size, '12px'); ?>>12px</option>
                                <option value="13px" <?php selected($acp_btns_text_size, '13px'); ?>>13px</option>
                                <option value="14px" <?php selected($acp_btns_text_size, '14px'); ?>>14px</option>
                                <option value="15px" <?php selected($acp_btns_text_size, '15px'); ?>>15px</option>
                                <option value="16px" <?php selected($acp_btns_text_size, '16px'); ?>>16px</option>
                                <option value="17px" <?php selected($acp_btns_text_size, '17px'); ?>>17px</option>
                                <option value="18px" <?php selected($acp_btns_text_size, '18px'); ?>>18px</option>
                                <option value="19px" <?php selected($acp_btns_text_size, '19px'); ?>>19px</option>
                                <option value="20px" <?php selected($acp_btns_text_size, '20px'); ?>>20px</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="4" scope="col"><h2>Pagination Active Button Style</h2></th>
                    </tr>

                    <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
                        <th scope="row">
                            <label for="acp_active_button_border_css">Active Button Border CSS:</label>
                        </th>
                        <td colspan="3">
                            <input type="text" class="regular-text" value="<?php echo $this->options->acp_active_button_border_css; ?>" id="acp_active_button_border_css" name="acp_active_button_border_css" placeholder="<?php _e('Example: 1px solid #ff0000', 'ac_paging'); ?>"/>
                        </td>
                    </tr>

                    <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
                        <th scope="row">
                            <label for="acp_active_button_background_css">Active Button Background Color: </label>
                        </th>
                        <td class="picker_input_cell">
                            <input type="text" class="regular-text" value="<?php echo $this->options->acp_active_button_background_css; ?>" id="acp_active_button_background_css" name="acp_active_button_background_css" placeholder="<?php _e('Example: #0000ff', 'ac_paging'); ?>"/>
                        </td>

                        <td class="picker_img_cell">
                            <a href="#openModal4">
                                <img class="colorpicker_img4" src="<?php echo plugins_url('advanced-content-pagination/files/img/colorpicker_icon_22.png'); ?>" />
                            </a>
                        </td>
                        <td class="color_picker">
                            <div id="openModal4" class="modalDialog">
                                <div id="box4" style="border-top-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px;">
                                    <a href="#close" title="Close" class="close">X</a>
                                    <h2>Color Picker</h2>
                                    <p id="colorpickerHolder4"></p>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
                        <th scope="row">
                            <label for="acp_active_button_text_color_css">Active Button Text Color: </label>
                        </th>
                        <td class="picker_input_cell">
                            <input type="text" class="regular-text" value="<?php echo $this->options->acp_active_button_text_color_css; ?>" id="acp_active_button_text_color_css" name="acp_active_button_text_color_css" placeholder="<?php _e('Example: #0000ff', 'ac_paging'); ?>"/>
                        </td>

                        <td class="picker_img_cell">
                            <a href="#openModal5">
                                <img class="colorpicker_img5" src="<?php echo plugins_url('advanced-content-pagination/files/img/colorpicker_icon_22.png'); ?>" />
                            </a>
                        </td>
                        <td class="color_picker">
                            <div id="openModal5" class="modalDialog">
                                <div id="box5" style="border-top-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px;">
                                    <a href="#close" title="Close" class="close">X</a>
                                    <h2>Color Picker</h2>
                                    <p id="colorpickerHolder5"></p>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0">
                        <th colspan="4" scope="col"><h2>Pagination Button Layout</h2></th>
                    </tr>

                    <tr class="paging_btn_layout type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
                        <th scope="row">Pagination Button Style:</th>
                        <td colspan="3">
                            <fieldset>
                                <?php
                                $acp_btns_visual_style = $this->options->acp_buttons_visual_style;
                                ?>
                                <label title="Title">
                                    <input type="radio" <?php checked($acp_btns_visual_style == 1); ?> value="1" name="acp_buttons_visual_style" id="t_button" /> 
                                    <span>
                                        <img src="<?php echo plugins_url('advanced-content-pagination/files/img/t_button.png'); ?>" />
                                    </span>
                                </label><br>
                                <label title="Title and Number">
                                    <input type="radio" <?php checked($acp_btns_visual_style == 2); ?> value="2" name="acp_buttons_visual_style" id="nt_button" /> 
                                    <span>
                                        <img src="<?php echo plugins_url('advanced-content-pagination/files/img/nt_button.png'); ?>" />
                                    </span>
                                </label><br>
                            </fieldset>
                        </td>
                    </tr>

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