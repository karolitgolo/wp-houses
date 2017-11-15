<?php

namespace ITGolo\Houses\Modules\Front\Hooks;

use ITGolo\Houses\Interfaces\IHook;

/**
 * Creator template page
 * Description of CreatorTemplatePage
 *
 * @author ITGolo
 */
class CreatorTemplatePage implements IHook {
    
    /* templates */
    private $templates;

    /**
     * Constructor
     */
    function __construct() {
        $this->templates = array();
    }

    /**
     * Hook
     */
    function hook() {
        $this->templates = array(
            'modules/front/views/domy-template.php' => 'Domy',
        );
        if (version_compare(floatval(get_bloginfo('version')), '4.7', '<')) {
            add_filter('page_attributes_dropdown_pages_args', array($this, 'registerTemplates'));
        } else {
            add_filter('theme_page_templates', array($this, 'addTemplate'));
        }
        add_filter('wp_insert_post_data', array($this, 'registerTemplates'));
        add_filter('template_include', array($this, 'viewTemplate'));
    }

    /**
     * View template
     * @global Post $post post
     * @param string $template template
     * @return string template
     */
    function viewTemplate($template) {
        global $post;
        if (!$post) {
            return $template;
        }
        if (!isset($this->templates[get_post_meta($post->ID, '_wp_page_template', true)])) {
            return $template;
        }
        $file = HOUSES_PLUGIN_DIR .'/' . get_post_meta($post->ID, '_wp_page_template', true);
        if (file_exists($file)) {
            return $file;
        } else {
            echo $file;
        }
        return $template;
    }

    /**
     * Add template
     * @param array $postsTemplates posts templates
     * @return array posts templates
     */
    function addTemplate($postsTemplates) {
        $postsTemplates = array_merge($postsTemplates, $this->templates);
        return $postsTemplates;
    }

    /**
     * Tegister templates
     * @param array $atts attributes
     * @return array attributes
     */
    function registerTemplates($atts) {
        $cache_key = 'page_templates-' . md5(get_theme_root() . '/' . get_stylesheet());
        $templates = wp_get_theme()->get_page_templates();
        if (empty($templates)) {
            $templates = array();
        }
        wp_cache_delete($cache_key, 'themes');
        $templates = array_merge($templates, $this->templates);
        wp_cache_add($cache_key, $templates, 'themes', 1800);
        return $atts;
    }

}
