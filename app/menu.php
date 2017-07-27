<?php

/**
 * The file that defines all Menus in your App
 *
 * A class definition that includes attributes and functions used across the
 * public-facing side of the site
 *
 * @link       //phasicdesign.com
 * @since      1.0.0
 */

//Ref: https://gist.github.com/OzzyCzech/4148529
class Menu {

	public function __construct() {


	}

	public static function navbar() {

		if (!is_user_logged_in()) {
			if(has_nav_menu('primary_nav')) 
				wp_nav_menu(['theme_location' => 'primary_nav', 'menu_class' => 'nav', 'walker' => new WP_Bootstrap_Navwalker() ]);
		}
		else {
			if(has_nav_menu('member_nav')) 
				wp_nav_menu(['theme_location' => 'member_nav', 'menu_class' => 'nav', 'walker' => new WP_Bootstrap_Navwalker() ]);
		}
	}

}

