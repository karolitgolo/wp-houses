<?php

namespace ITGolo\Houses;

use ITGolo\Houses\Modules\Admin\ModuleAdmin;
use ITGolo\Houses\Modules\Front\ModuleFront;
use ITGolo\Houses\Modules\Widget\ModuleWidget;

/**
 * Plugin Name: Houses
 * Plugin URI: https://houses.itgolo.pl
 * Description: Plugin Wordpress
 * Version: 1.0.0.0
 * Author: Karol Golec
 * Author URI: https://facebook.com/itgolo
 * GitHub Plugin URI: https://github.com/karolitgolo/wp-houses
 */
new Houses();

class Houses {

    /**
     * Constructor
     */
    function __construct() {
        $this->firewall();
        $this->defineConstants();
        $this->loadVendor();
        $this->loadModules();
    }

    /**
     * Firewall
     */
    function firewall() {
        if (!defined('ABSPATH')) {
            exit;
        }
    }

    /**
     * Load vendor of composer
     */
    public function loadVendor() {
        require_once( 'vendor/autoload.php' );
    }

    /**
     * Load Modules
     */
    public function loadModules() {
        $modules = array(
            new ModuleAdmin(),
            new ModuleFront(),
            new ModuleWidget()
        );
        foreach ($modules as $module){
            $module->load();
        }
    }

    /**
     * Define constants
     */
    public function defineConstants() {
        define('HOUSES_PLUGIN_DIR', plugin_dir_path(__FILE__));
        define('HOUSES_PLUGIN_URL', plugins_url('/', __FILE__));
    }

}