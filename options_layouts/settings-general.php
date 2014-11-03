<tr>
    <th colspan="4" scope="col"><h2>General Settings</h2></th>
</tr>
<tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
    <th scope="row">
        Turn on/off Content Pagination
    </th>
    <td colspan="3">                                
        <label for="acp_paging_on_off">
            <input type="checkbox" <?php checked($this->acp_options_serialized->acp_paging_on_off == 1) ?> value="<?php echo $this->acp_options_serialized->acp_paging_on_off; ?>" name="acp_paging_on_off" id="acp_paging_on_off" />
        </label>
    </td>
</tr>

<tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
    <th scope="row">Pagnation Buttons Layout</th>
    <td colspan="3">
        <fieldset>
            <?php
            $acp_def_shortcode = $this->acp_options_serialized->acp_wp_shortcode_pagination_view;
            ?>
            <a href="../acp_options.php"></a>
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
    <th scope="row">Pagnation Loading Type</th>
    <td colspan="3">
        <fieldset>
            <?php
            $acp_plug_shortcode = $this->acp_options_serialized->acp_plugin_pagination_type;
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
            $acp_pag_buttons_loc = $this->acp_options_serialized->acp_paging_buttons_location;
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

<tr>
    <th scope="row"><?php _e('Do Shortcodes In Excerpts') ?>:</th>
    <td colspan="3">
        <fieldset>
            <?php
            $acp_do_shortcodes_excerpts = $this->acp_options_serialized->acp_do_shortcodes_excerpts;
            ?>
            <label title="top">
                <input type="checkbox" value="<?php echo $acp_do_shortcodes_excerpts; ?>" <?php checked('2' == $acp_do_shortcodes_excerpts); ?>  name="acp_do_shortcodes_excerpts" id="acp_do_shortcodes_excerpts" />
            </label><br>
        </fieldset>
    </td>
</tr>

<tr>
    <th scope="row"><?php _e('Excerpt Words Count') ?>:</th>
    <td colspan="3">
        <fieldset>
            <?php
            $acp_excerpts_count = $this->acp_options_serialized->acp_excerpts_count;
            ?>
            <label title="top">
                <input type="text" value="<?php echo $acp_excerpts_count; ?>" name="acp_excerpts_count" id="acp_excerpts_count"/>                 
            </label><br>
        </fieldset>
    </td>
</tr>