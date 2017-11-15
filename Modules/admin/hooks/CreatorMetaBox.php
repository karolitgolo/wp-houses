<?php

namespace ITGolo\Houses\Modules\Admin\Hooks;

use ITGolo\Houses\Interfaces\IHook;

/**
 * Creator meta box
 * Description of CreatorMetaBox
 *
 * @author ITGolo
 */
class CreatorMetaBox implements IHook {

    /**
     * Hook
     */
    public function hook() {
        add_action('add_meta_boxes_domy', array($this, 'createMetaBoxes'));
    }

    /**
     * Create meta boxes
     */
    function createMetaBoxes() {
        add_meta_box('typy-domow', 'Typy domów', array($this, 'viewMetaBoxTypyDomow'), 'domy', 'normal', 'default');
    }

    /**
     * View meta box typy domów
     */
    function viewMetaBoxTypyDomow() {
        global $post;
        $typyDomow = array(
            'jednorodzinny' => 'Jednorodzinny',
            'blizniak' => 'Bliźniak',
            'szeregowka' => 'Szeregówka'
        );
        $selectTypDomu = get_post_meta($post->ID, '_typ-domu', true); 
        require_once HOUSES_PLUGIN_DIR . '/Modules/Admin/views/metabox/typy-domow.php';
    }

}
