<?php 


if ( ! defined( 'ABSPATH' ) ) exit;

// Use:  [nutrifacts]
function nf_shortcode( $atts ) {
    
    $args = array(
    'post_type' => 'products',
);

$products = new WP_Query($args); ?>

<?php while($products->have_posts()) : $products->the_post(); ?>

	
	<?php 

		$brand = get_field('brand');

		$brand_title = get_the_title($brand);

		
	 ?>	
	 	<h3><?php the_title(); ?></h3>	

		 <?php the_post_thumbnail('thumbnail'); ?>
		 <p><?php the_content(); ?></p>
		 <p>the brand is: <?php echo $brand_title; ?></p>
		  <p>Rated with: <?php the_field('product_rating'); ?></p>
		

<?php endwhile; ?>

<?php 

wp_reset_postdata();

}
add_shortcode( 'nutrifacts', 'nf_shortcode' );