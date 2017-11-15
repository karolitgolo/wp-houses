<?php

namespace ITGolo\Houses\Modules\Front\Hooks;

use ITGolo\Houses\Interfaces\IHook;

/**
 * Add page domy
 * Description of AddPageDomy
 *
 * @author ITGolo
 */
class AddPageDomy implements IHook {

    /**
     * Hook
     */
    function hook() {
        add_action('init', array($this, 'addPageDomy'), 10);
    }

    /**
     * Add page domy
     */
    function addPageDomy() {
        $page = get_page_by_path('domy');
        if (!$page) {
            $newPageId = wp_insert_post(array(
                'post_title' => 'Domy',
                'post_type' => 'page',
                'post_name' => 'domy',
                'comment_status' => 'closed',
                'ping_status' => 'closed',
                'post_content' => '',
                'post_status' => 'publish',
                'post_author' => get_current_user_id(),
                'menu_order' => 0
            ));

            if ($newPageId && !is_wp_error($newPageId)) {
                update_post_meta($newPageId, '_wp_page_template', 'Modules/Front/views/domy-template.php');
            }
        }
    }

}
