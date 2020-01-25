   
<?php
/*
Plugin Name:  WP NutriFacts
Plugin URI:
Description:  A plugin created for show nutrition facts info.
Version:      1.0
Author:       Alex Cuadra
Author URI:	  http://alexcuadra.server2.demoswp.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  nutrifacts
*/

/*
 * Register post types
 */
require_once plugin_dir_path(__FILE__) . 'includes/posttypes.php';

register_activation_hook(__FILE__, 'nf_rewrite_flush');


/*
 * print the Shortcode
 */
require_once plugin_dir_path(__FILE__) . 'includes/nf_shortcode.php';

