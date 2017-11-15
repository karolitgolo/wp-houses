<?php

namespace ITGolo\Houses\Modules\Front;

use ITGolo\Houses\Interfaces\IModule;
use ITGolo\Houses\Modules\Front\Hooks\CreatorTemplatePage;
use ITGolo\Houses\Modules\Front\Hooks\AddPageDomy;
use ITGolo\Houses\Modules\Front\Hooks\RewriteRuleDomy;

/**
 * Module front
 * Description of ModuleFront
 *
 * @author ITGolo
 */
class ModuleFront implements IModule {
   
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
            new CreatorTemplatePage(),
            new AddPageDomy(),
            new RewriteRuleDomy()
        );
        foreach ($hooks as $hook){
            $hook->hook();
        }
    }
}

