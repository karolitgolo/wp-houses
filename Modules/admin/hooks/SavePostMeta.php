<?php

namespace ITGolo\Houses\Modules\Admin\Hooks;

use ITGolo\Houses\Interfaces\IHook;

/**
 * Save post meta
 * Description of SavePostMeta
 *
 * @author ITGolo
 */
class SavePostMeta implements IHook {

    /**
     * Hook
     */
    public function hook() {
        add_action('save_post', array($this, 'saveHousesMeta'), 1, 2);
    }

    /**
     * Save houses meta
     * @param int $post_id post ID
     * @param Post $post post
     * @return int post ID
     */
    function saveHousesMeta($post_id, $post) {
        if (!$this->canSave($post)) {
            return;
        }
        $HousesMeta['_typ-domu'] = wp_filter_nohtml_kses($_POST['typyDomowMetaBoxHouses']);
        foreach ($HousesMeta as $key => $value) {
            if (get_post_meta($post->ID, $key, FALSE)) {
                update_post_meta($post->ID, $key, $value);
            } else {
                add_post_meta($post->ID, $key, $value);
            }
            if (!$value) {
                delete_post_meta($post->ID, $key);
            }
        }
    }

    /**
     * Can save
     * @param Post $post post
     * @return bool true if can or false
     */
    public function canSave($post) {
        if (!isset($_POST['housesMetaNoncename'])) {
            return false;
        }
        if (!wp_verify_nonce($_POST['housesMetaNoncename'], HOUSES_PLUGIN_DIR)) {
            return false;
        }
        if (!current_user_can('edit_post', $post->ID)) {
            return false;
        }
        if ($post->post_type == "revision") {
            return false;
        }
        return true;
    }

}
