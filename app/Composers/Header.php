<?php

namespace App\Composers;
use Roots\Acorn\View\Composer;

class Header extends Composer
{
    protected static $views = [
        'partials.header',
    ];

    public function with()
    {
        return [
            'logo' => get_field('logo', 'options'),
            'nav' => $this->nav()
        ];
    }

    public function nav()
    {   
      $menu_name = 'primary_navigation';
      $locations = get_nav_menu_locations();
      $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
      $array_menu = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
      // $array_menu = wp_get_nav_menu_items($menu_name);
        $menu = array();
        foreach ($array_menu as $m) {
            if (empty($m->menu_item_parent)) {
                $menu[$m->ID] = array();
                $menu[$m->ID]['ID']          =   $m->ID;
                $menu[$m->ID]['title']       =   $m->title;
                $menu[$m->ID]['url']         =   $m->url;
                $menu[$m->ID]['children']    =   array();

                //Check if classes has any elements
                if($m->classes[0] !== "") {
                  $classes = $m->classes;
                }
                
                //Check current requested url against url and add class active if true
                if(($active = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") == $m->url) {
                  //$menu[$m->ID]['active'] = $active;
                  if(isset($classes)) {
                    array_push($classes, 'active');
                    $menu[$m->ID]['classes'] = implode(" ", $classes);
                  }
                  else {
                    $menu[$m->ID]['classes'] = 'active';
                  }
                }
            }
        }
        $submenu = array();
        foreach ($array_menu as $m) {
            if ($m->menu_item_parent) {
                $submenu[$m->ID] = array();
                $submenu[$m->ID]['ID']       =   $m->ID;
                $submenu[$m->ID]['title']    =   $m->title;
                $submenu[$m->ID]['url']      =   $m->url;
                if($m->classes[0] !== "") {
                  $classes = $m->classes;
                  //$submenu[$m->ID]['classes'] = implode(" ", $classes);
                }

                if(($active = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") == $m->url) {
                  //$menu[$m->ID]['active'] = $active;
                  if(isset($classes)) {
                    array_push($classes, 'active');
                  }
                  else {
                    $submenu[$m->ID]['classes'] = 'active';
                  }
                }

                $submenu[$m->ID]['classes'] = implode(" ", $classes);

                $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
                $classes = [];

            }
        }
      return $menu;
    }
}