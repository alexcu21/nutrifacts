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



//callbacks for endpoints

function nf_get_products_items() {
  $args = array (
    'post_type' => 'products',
  );
 
  $items = array();
 
  if ( $products = get_posts( $args ) ) {
    foreach ( $products as $product ) {
      $items[] = array(
        'id' => $product->ID,
        'title' => $product->post_title,
      	'brand' => $product->brand,
      	'rating' => $product->product_rating,
      	'featured' => $product->featured,
      );
    }
  }
  return $items;
}

function nf_get_brand_items() {
  $args = array (
    'post_type' => 'brands',
  );
 
  $items = array();
 
  if ( $brands = get_posts( $args ) ) {
    foreach ( $brands as $brand ) {
      $items[] = array(
        'id' => $brand->ID,
        'title' => $brand->post_title,
      );
    }
  }
  return $items;
}

function nf_get_categories() {
  
  $items = array();

  if( $terms = get_terms( 'product_category' ) ){
  		foreach( $terms as $term ){
  			$items[] = array(
  				'id' => $term->term_id,
  				'name' => $term->name,
  			);
  		}
  }
 
  return $items;
}

// registring new enpoints

/*
* /wp-json/nutrition-facts/v1/product-categories (products categories endpoint)
* /wp-json/nutrition-facts/v1/products (products list endpoint)
* /wp-json/nutrition-facts/v1/brands (products list endpoint)
*/


function nf_register_api_endpoints() {
  register_rest_route( 'nutrition-facts/v1', '/products', array(
    'methods' => 'GET',
    'callback' => 'nf_get_products_items',
  ) );

   register_rest_route( 'nutrition-facts/v1', '/brands', array(
    'methods' => 'GET',
    'callback' => 'nf_get_brand_items',
  ) );


   register_rest_route( 'nutrition-facts/v1', '/product-categories', array(
    'methods' => 'GET',
    'callback' => 'nf_get_categories',
  ) );
}
 
add_action( 'rest_api_init', 'nf_register_api_endpoints' );

