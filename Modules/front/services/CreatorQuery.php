<?php

namespace ITGolo\Houses\Modules\Front\Services;

use ITGolo\Houses\Interfaces\IHook;
use Wp_Query;

/**
 * Creator query
 * Description of CreatorQuery
 *
 * @author ITGolo
 */
class CreatorQuery {

    /**
     * Get query
     * @return WP_Query qp query
     */
    static function query() {
        $args = array('post_type' => 'domy');
        if (get_query_var('typy-domow') !== 'wszystkie' && !empty(get_query_var('typy-domow'))) {
            $argsMeta = array(
                'meta_key' => '_typ-domu',
                'meta_value' => get_query_var('typy-domow')
            );
            $args = array_merge($args, $argsMeta);
        }
        $query = new WP_Query($args);
        return $query;
    }

    /**
     * Get typy domów
     * @return array typy domów
     */
    static function getTypyDomow() {
        return array(
            'wszystkie' => 'Wszystkie',
            'jednorodzinny' => 'Jednorodzinny',
            'blizniak' => 'Bliźniak',
            'szeregowka' => 'Szeregówka'
        );
    }

    /**
     * Is selected typ domu
     * @param string $optionValue option value
     * @return boolean true if selected
     */
    static function isSelectedTypDomu($optionValue) {
        if (empty(get_query_var('typy-domow'))) {
            return false;
        }
        return $optionValue === get_query_var('typy-domow');
    }

}
