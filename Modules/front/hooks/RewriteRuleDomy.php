<?php

namespace ITGolo\Houses\Modules\Front\Hooks;

use ITGolo\Houses\Interfaces\IHook;

/**
 * Rewrite rule domy
 * Description of RewriteRuleDomy
 *
 * @author ITGolo
 */
class RewriteRuleDomy implements IHook {

    /**
     * Hook
     */
    function hook() {
        add_action('init', array($this, 'addRewriteTypyDomow'));
        add_filter('query_vars', array($this, 'addQueryVars'));
    }

    /**
     * Add query vars
     * @param array $query_vars query vars
     * @return array query vars
     */
    function addQueryVars($query_vars) {
        $query_vars[] = 'typy-domow';
        return $query_vars;
    }

    /**
     * Add typy domów
     */
    function addRewriteTypyDomow() {
        add_rewrite_rule('^domy/typy-domow/([^/]*)/?$', 'index.php?post_type=domy&typy-domow=$matches[1]', 'top');
        flush_rewrite_rules();
    }

}
