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

		$nutrition_facts = get_field('nutrition_data');

		/* testing 

		$total_fat = $nutrition_facts['satured_fat'] + $nutrition_facts['trans_fat'];			
		$total_fat_per = round( $total_fat / $nutrition_facts['servings_size'] * 100);

		*/
/*
echo '<pre>';
		echo var_dump($nutrition_facts);
echo '</pre>';
*/		

	 ?>

<div class="product">
	
	<div class="product-category">
		 <p>Categories: <?php echo $the_terms; ?></p>
	</div>
	<div class="post-thumbnail">
		<?php the_post_thumbnail('thumbnail'); ?>
	</div>
	<div class="brand">
		<p class="brand">Brand: <?php echo $brand_title; ?></p>
	</div>
	<div class="product-description">
		<p><?php the_content(); ?></p>
	</div>

	<div class="rating">
		<p>Rated: <?php the_field('product_rating'); ?>/10</p>
	</div>

	<div class="nutrition-wrapper">
		<div class="nutrition-card">
			<div class="nutrition-header">
				<h3>Nutrition Facts</h3>
				<p>Serving Size <?php echo $nutrition_facts['servings_size']; ?>g</p>	
			</div>
			<div class="nutrition-body">
				<div class="calories">
					<p>Amount Per Serving</p>
					<p>Calories <?php echo $nutrition_facts['_calories']; ?></p>
				</div>
				<div class="percentage-values">
					<p>% Daily Value*</p>
					<div class="daily-value total_fat">
						<?php nf_get_result('Total Fat', 'saturated_fat', 'trans_fat'); ?>
					</div>
					<div class="daily-value satured_fat">
						<?php nf_get_percentage('Satured Fat', 'saturated_fat'); ?>
					</div>	

					<div class="daily-value trans_fat">
						<?php nf_get_percentage('Trans Fat', 'trans_fat'); ?>
					</div>

					<div class="daily-value cholesterol">
						<?php nf_get_percentage('Cholesterol', 'cholesterol'); ?>
					</div>

					<div class="daily-value sodium">
						<?php nf_get_percentage('Sodium', 'sodium'); ?>
					</div>

					<div class="daily-value total_carbohidrate">
						<?php nf_get_result('Total Carbohidrate', 'dietary_fiber', 'sugars'); ?>
					</div>

					<div class="daily-value dietary_fiber">
						<?php nf_get_percentage('Dietary Fiber', 'dietary_fiber'); ?>
					</div>
					
					<div class="daily-value sugars">
						<?php nf_get_percentage('Dietary Fiber', 'sugars'); ?>
					</div>

					<div class="daily-value protein">
						<?php nf_get_percentage('Protein', 'protein'); ?>
					</div>

					<div class="vitamins">
						<div class="vit-row1">
							<p>Vitamin A <?php echo $nutrition_facts['vitamin_a'];  ?></p>
							<p>Vitamin C <?php echo $nutrition_facts['vitamin_c'];  ?></p>
						</div>
						<div class="vit-row2">
							<p>Calcium <?php echo $nutrition_facts['Calcium'];  ?></p>
							<p>Iron <?php echo $nutrition_facts['Iron'];  ?></p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>

</div>

<?php endwhile;



get_footer();