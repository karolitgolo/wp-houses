<?php

namespace ITGolo\Houses\Modules\Admin\Hooks;

use ITGolo\Houses\Interfaces\IHook;

/**
 * Creator post type
 * Description of CreatorPostType
 *
 * @author ITGolo
 */
class CreatorPostType implements IHook {

    /**
     * Hook
     */
    public function hook() {
        add_action('init', array($this, 'createPostType'));
    }

    /**
     * Create post type
     */
    function createPostType() {
        register_post_type('domy', array(
            'labels' => array(
                'name' => __('Domy'),
                'singular_name' => __('Dom'),
                'add_new_item' => __('Dodaj nowy dom'),
                'edit_item' => __('Edytuj dom'),
                'new_item' => __('Nowy dom'),
                'view_item' => __('Pokaż dom'),
                'view_items' => __('Pokaż domy'),
                'all_items' => __('Wszystkie domy')
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-admin-multisite',
            'with_front' => true,
            'rewrite' => array('slug'=>'domy'),
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt'))
        );
    }

}
