<tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0">
    <th colspan="4" scope="col"><h2>Pagination Button Layout</h2></th>
</tr>

<tr>
    <th scope="row">Display Only prev / next Buttons:</th>
    <td colspan="3">
        <label title="Only Prev/Next Buttons">
            <?php $acp_buttons_prev_next = isset($this->acp_options_serialized->acp_buttons_prev_next) ? $this->acp_options_serialized->acp_buttons_prev_next : 0; ?>
            <input type="checkbox" <?php checked($acp_buttons_prev_next == 1); ?> value="<?php echo $acp_buttons_prev_next; ?>" name="acp_buttons_prev_next" id="acp_buttons_prev_next"/> 
        </label><br>
    </td>
</tr>

<tr class="paging_btn_layout type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
    <th scope="row">Pagination Button Style:</th>
    <td colspan="3">
        <fieldset>
            <?php
            $acp_btns_visual_style = $this->acp_options_serialized->acp_buttons_visual_style;
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

