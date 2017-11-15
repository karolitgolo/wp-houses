<?php

namespace ITGolo\Houses\Modules\Widget;

use ITGolo\Houses\Interfaces\IModule;
use ITGolo\Houses\Modules\Widget\Hooks\RegisterWidgets;

/**
 * Module widget
 * Description of ModuleWidget
 *
 * @author ITGolo
 */
class ModuleWidget implements IModule {
    
     /**
     * Load module
     */
    public function load() {
        $this->hooks();
    }

    /**
     * Hooks
     */
    public function hooks() {
        $hooks = array(
            new RegisterWidgets()
        );
        foreach ($hooks as $hook){
            $hook->hook();
        }
    }
}
