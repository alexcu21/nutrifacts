<?php 


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

/*
* adding styles to single-pruducts.php
*/

function nf_frontend_styles(){
    wp_enqueue_style('nutrifacts-style', plugins_url('assets/css/nutrifacts-style.css' , __FILE__ ) );

}
add_action('wp_enqueue_scripts', 'nf_frontend_styles');

function nf_get_result($label, $fieldname1, $fieldname2){

	$nutrition_facts = get_field('nutrition_data');
	$result = $nutrition_facts[$fieldname1] + $nutrition_facts[$fieldname2];
	$percentage_result = round( $result / $nutrition_facts['servings_size'] * 100);

	
		echo '<p>';
			echo $label .' '. $result . 'g';
		echo '</p>';	
		echo '<p>';
			echo $percentage_result . '%';
		echo '</p>';	
	

}

function nf_get_percentage($label_element, $fieldname){
	$nutrition_facts = get_field('nutrition_data');

	$element = isset($nutrition_facts[$fieldname]) ? $nutrition_facts[$fieldname] : '' ;

	$percentage_element = round( $element / $nutrition_facts['servings_size'] * 100);

	
		echo '<p>';
			echo $label_element .' '. $element . 'g';
		echo '</p>';	
		echo '<p>';
			echo $percentage_element . '%';
		echo '</p>';	
	
}