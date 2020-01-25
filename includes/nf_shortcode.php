<?php 


if ( ! defined( 'ABSPATH' ) ) exit;

// Use:  [nutrifacts]
function nf_shortcode( $atts ) {
    
    $args = array(
    'post_type' => 'products',
);

$products = new WP_Query($args); ?>

<?php while($products->have_posts()) : $products->the_post(); ?>

	
		 <h3><?php the_title(); ?></h3>
		 <p><?php the_content(); ?></p>
		 <p><?php the_field('brand'); ?></p>
		 <p><?php the_field('product_rating'); ?></p>
		 <p><?php the_field('featured'); ?></p>
		 <p><?php the_field('nutrition_data'); ?></p>

<?php endwhile; ?>

<?php 

wp_reset_postdata();

}
add_shortcode( 'nutrifacts', 'nf_shortcode' );