<?php
/*
* Plugin Name: Azad Countdown Timer
* Plugin URI: https://gittechs.com
* Description: Countdown/Countup Timer Widget + Shortcode. Supports multiple instances, easy translation & customizations.
* Version: 1.0.0
* Author: Md. Abul Kalam Azad
* Author URI: https://gittechs.com/
* Text Domain: azad-countdown-timer
*/

// include_once('countdown-util.php'); // Utility functions for backward compatibility
// include_once('countdown-shortcodes.php'); // Shortcode functions

/**
 * Shailan Countdown Widget Class
 */
class shailan_CountdownWidget extends WP_Widget {

    /** constructor */
    function __construct() {

		$widget_ops = array( 
			'classname' => 'act_widget', 
			'description' => __( 'Countdown/countup timer widget' , 'azad-countdown-timer') 
		);
		
		parent::__construct( 
			'azad-countdown-timer-widget', 
			__('CountDown Widget', 'azad-countdown-timer'), 
			$widget_ops 
		);

		$this->alt_option_name = 'widget_shailan_countdown';

		add_action( 'admin_init', array(&$this, 'common_header'), 100, 1 );
		add_action( 'wp_enqueue_scripts', array(&$this, 'common_header'), 100, 1 );
    }
    function common_header() {}
}

// register widget
function act_register_widget(){
	return register_widget("shailan_CountdownWidget");
}
add_action( 'widgets_init', 'act_register_widget' );

// Settings link
function act_add_settings_link($links) {
    $settings_link = '<a href="options-general.php?page=wp-countdown-widget">Settings</a>';
    $donate_link = '<a href="https://gittechs.com/donate">Donate</a>';
    array_push( $links, $settings_link );
    array_push( $links, $donate_link );
    return $links;
}

$plugin = plugin_basename(__FILE__);
add_filter( "plugin_action_links_$plugin", 'act_add_settings_link' );
