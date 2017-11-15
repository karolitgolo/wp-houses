<?php

namespace ITGolo\Houses\Modules\Widget\Classes;

use WP_Widget;
use WP_Query;

/**
 * Domy jednorodzinne widget
 * Description of DomyJednorodzinne
 *
 * @author ITGolo
 */
class DomyJednorodzinne extends WP_Widget {

    /**
     * Constructor
     */
    function __construct() {
        $widgetOptions = array(
            'description' => __('Ten widget wyświetla 5 ostatnich domów jednorodzinnych.'),
        );
        parent::__construct('domy-jednorodzinne', __('Domy jednorodzinne'), $widgetOptions);
    }

    /**
     * Widget form creation
     * @param WP_Widget $instance instance
     */
    function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Tytuł:</label>
            <input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" />
        </p><?php
    }

    /**
     * Widget update
     * @param WP_Widget $new_instance new instance
     * @param WP_Widget $old_instance old instance
     */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    /**
     * Widget display
     * @param array $args arguments
     * @param WP_Widget $instance instance
     */
    function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        $argsQuery = array(
            'post_type' => 'houses',
            'meta_key' => '_typ-domu',
            'meta_value' => 'jednorodzinny',
            'nopaging' => false,
            'posts_per_page' => '5',
            'order' => 'DESC',
            'orderby' => 'ID'
        );
        $query = new WP_Query($argsQuery);
        $houses = $query->posts;
        require_once HOUSES_PLUGIN_DIR . 'Modules/Widget/views/domy-jednorodzinne.php';
    }

}
