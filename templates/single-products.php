<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

 

	while(have_posts()) : the_post(); ?>


	<?php 

		$brand = get_field('brand');

		$brand_title = get_the_title($brand);

		$productID = get_the_ID();

		$terms = get_the_terms($productID , 'product_category');

		$the_terms = get_the_term_list( get_the_id(), 'product_category');
/*

echo '<pre>';
		echo var_dump($the_terms);
echo '</pre>';
		
*/
	 ?>

		 <?php the_post_thumbnail('thumbnail'); ?>
		 <p>Categories: <?php echo $the_terms; ?></p>
		 <p><?php the_content(); ?></p>
		 <p>the brand is: <?php echo $brand_title; ?></p>
		  <p>Rated with: <?php the_field('product_rating'); ?></p>




<?php endwhile;



get_footer();