<?php

namespace ITGolo\Houses\Modules\Admin;

use ITGolo\Houses\Interfaces\IModule;
use ITGolo\Houses\Modules\Admin\Hooks\CreatorPostType;
use ITGolo\Houses\Modules\Admin\Hooks\CreatorMetaBox;
use ITGolo\Houses\Modules\Admin\Hooks\SavePostMeta;

/**
 * Module admin
 * Description of ModuleAdmin
 *
 * @author ITGolo
 */
class ModuleAdmin implements IModule {

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
            new CreatorPostType(),
            new CreatorMetaBox(),
            new SavePostMeta()
        );
        foreach ($hooks as $hook){
            $hook->hook();
        }
    }

}
