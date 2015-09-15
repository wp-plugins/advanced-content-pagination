<th><h2>Carousel Settings</h2></th>
<tr>
    <th scope="row"><?php _e('Carousel wrapping options', ACP_Core::$TEXT_DOMAIN); ?>:</th>
    <td colspan="3">
        <fieldset>            
            <select name="acp_jcarousel_wrapping" id="acp_jcarousel_wrapping" class="acp_jcarousel_wrapping">
                <?php $acp_jcarousel_wrapping = isset($this->acp_options_serialized->acp_jcarousel_wrapping) ? $this->acp_options_serialized->acp_jcarousel_wrapping : 'circular'; ?>
                <option value="circular" <?php selected($acp_jcarousel_wrapping, 'circular'); ?>>Circular</option>
                <option value="first" <?php selected($acp_jcarousel_wrapping, 'first'); ?>>First</option>
                <option value="last" <?php selected($acp_jcarousel_wrapping, 'last'); ?>>Last</option>
            </select>
        </fieldset>
    </td>
</tr>