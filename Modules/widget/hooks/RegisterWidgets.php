<?php

namespace ITGolo\Houses\Modules\Widget\Hooks;

use ITGolo\Houses\Interfaces\IHook;

/**
 * Register widgets
 * Description of RegisterWidgets
 *
 * @author ITGolo
 */
class RegisterWidgets implements IHook {

    /**
     * Hook
     */
    function hook() {
        add_action('widgets_init', array($this, 'registerWidgets'));
    }

    function registerWidgets() {
        register_widget('ITGolo\Houses\Modules\Widget\Classes\DomyJednorodzinne');
    }

}
