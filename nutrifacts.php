   
<?php

/**
* @package nutrifacts
*/

/*
Plugin Name: WP NutriFacts
Plugin URI:
Description: A plugin created for show nutrition facts info.
Version:      1.0
Author:       Alex Cuadra
Author URI:	 http://alexcuadra.server2.demoswp.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: nutrifacts
*/

if ( ! defined( 'ABSPATH' ) ) exit;

/*
 * Register post types
 */
require_once plugin_dir_path(__FILE__) . 'includes/posttypes.php';

register_activation_hook(__FILE__, 'nf_rewrite_flush'); 


/*
 * print the Shortcode
 */
require_once plugin_dir_path(__FILE__) . 'includes/nf_shortcode.php';

add_action('activated_plugin','my_save_error');
function my_save_error()
{
file_put_contents(dirname(__file__).'/error_activation.txt', ob_get_contents());
}

/*
* adding a new template: single-pruducts.php
*/

add_filter('template_include', 'products_template', 50, 1);

function products_template($template) {

    
    /* Checks for single template by post type */
    if ( is_singular('products') && file_exists(plugin_dir_path(__FILE__) . 'templates/single-products.php')) {
        $template = plugin_dir_path(__FILE__) . 'templates/single-products.php';
    }

    return $template;

}

function nf_frontend_styles(){
    wp_enqueue_style('nutrifacts-style', plugins_url('assets/css/nutrifacts-style.css' , __FILE__ ) );

}
add_action('wp_enqueue_scripts', 'nf_frontend_styles');