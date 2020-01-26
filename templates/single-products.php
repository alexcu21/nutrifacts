<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

 

	while(have_posts()) : the_post(); ?>


	<?php 

		$brand = get_field('brand');

		$brand_title = get_the_title($brand);

	 ?>

		 <?php the_post_thumbnail('thumbnail'); ?>
		 <p><?php the_content(); ?></p>
		 <p>the brand is: <?php echo $brand_title; ?></p>
		  <p>Rated with: <?php the_field('product_rating'); ?></p>




<?php endwhile;



get_footer();