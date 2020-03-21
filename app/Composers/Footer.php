<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class Footer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.footer',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'form' => get_field('form', 'options'),
            'form_title' => get_field('form_title', 'options'),
            'copyright' => get_field('copyright', 'options'),
            'nav' => $this->nav()
        ];
    }

    public function nav()
    {   
      $menu_name = 'footer';
      $locations = get_nav_menu_locations();
      $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
      $array_menu = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
      // $array_menu = wp_get_nav_menu_items($menu_name);
        $menu = array();
        foreach ($array_menu as $m) {
        
          $menu[$m->ID] = array();
          $menu[$m->ID]['ID']          =   $m->ID;
          $menu[$m->ID]['title']       =   $m->title;
          $menu[$m->ID]['url']         =   $m->url;
            
        }
      return $menu;
    }
}
