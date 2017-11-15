<p>
     <input type="hidden" name="housesMetaNoncename" id="housesMetaNoncename" value = "<?php echo wp_create_nonce(HOUSES_PLUGIN_DIR) ?>" />
    <label for="typyDomowMetaBoxHouses">Typ domu: </label>
    <select name='typyDomowMetaBoxHouses' id='typyDomowMetaBoxHouses'>
        <?php foreach ($typyDomow as $value => $text): ?>
            <option value="<?php echo esc_attr($value); ?>" <?php if ($selectTypDomu === $value) : echo 'selected="selected"'; endif; ?>>
                <?php echo esc_html($text); ?>
            </option>
        <?php endforeach; ?>
    </select>
</p>