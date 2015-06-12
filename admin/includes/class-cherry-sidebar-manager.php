<?php
/**
 *
 * @package   Cherry_Custom_Sidebars_Methods
 * @author    Cherry Team
 * @license   GPL-2.0+
 * @link      http://www.cherryframework.com/
 * @copyright 2015 Cherry Team
 *
 **/

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}

if ( !class_exists( 'Cherry_Custom_Sidebars_Methods' ) ) {

	class Cherry_Custom_Sidebars_Methods {

		public $current_theme;
		public $get_theme_option;

		function __construct() {
			$this->current_theme = wp_get_theme();
			$this->get_theme_option = get_option($this->current_theme, array());
		}

		public function get_custom_sidebar_array() {
			if(!is_array($this->get_theme_option) || !array_key_exists('custom_sidebar', $this->get_theme_option)){
				$custom_sidebar_array = array();
			}else{
				$custom_sidebar_array = $this->get_theme_option['custom_sidebar'];
			}
			return $custom_sidebar_array;
		}

		public function set_custom_sidebar_array($new_custom_sidebar_array) {

			$this->get_theme_option['custom_sidebar'] = $new_custom_sidebar_array;
			update_option($this->current_theme, $this->get_theme_option);
		}
	}
}
?>