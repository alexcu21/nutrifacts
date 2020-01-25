<?php 


// Register Products Post Type
function nf_product_posttype() {

	$labels = array(
		'name'                  => _x( 'Products', 'Post Type General Name', 'nutrifacts' ),
		'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'nutrifacts' ),
		'menu_name'             => __( 'Products', 'nutrifacts' ),
		'name_admin_bar'        => __( 'Products', 'nutrifacts' ),
		'archives'              => __( 'Product Archives', 'nutrifacts' ),
		'attributes'            => __( 'Product Attributes', 'nutrifacts' ),
		'parent_item_colon'     => __( 'Parent Product:', 'nutrifacts' ),
		'all_items'             => __( 'All Products', 'nutrifacts' ),
		'add_new_item'          => __( 'Add New Product', 'nutrifacts' ),
		'add_new'               => __( 'Add New', 'nutrifacts' ),
		'new_item'              => __( 'New Product', 'nutrifacts' ),
		'edit_item'             => __( 'Edit Product', 'nutrifacts' ),
		'update_item'           => __( 'Update Product', 'nutrifacts' ),
		'view_item'             => __( 'View Product', 'nutrifacts' ),
		'view_items'            => __( 'View Products', 'nutrifacts' ),
		'search_items'          => __( 'Search Product', 'nutrifacts' ),
		'not_found'             => __( 'Not found', 'nutrifacts' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'nutrifacts' ),
		'featured_image'        => __( 'Featured Image', 'nutrifacts' ),
		'set_featured_image'    => __( 'Set featured image', 'nutrifacts' ),
		'remove_featured_image' => __( 'Remove featured image', 'nutrifacts' ),
		'use_featured_image'    => __( 'Use as featured image', 'nutrifacts' ),
		'insert_into_item'      => __( 'Insert into Product', 'nutrifacts' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Product', 'nutrifacts' ),
		'items_list'            => __( 'Products list', 'nutrifacts' ),
		'items_list_navigation' => __( 'Products list navigation', 'nutrifacts' ),
		'filter_items_list'     => __( 'Filter Products list', 'nutrifacts' ),
	);
	$args = array(
		'label'                 => __( 'Product', 'nutrifacts' ),
		'description'           => __( 'new post type for products.', 'nutrifacts' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'            => array( 'product_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-store',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'products', $args );

}
add_action( 'init', 'nf_product_posttype', 0 );

// Register product category
function nf_product_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Product Categories', 'Taxonomy General Name', 'nutrifacts' ),
		'singular_name'              => _x( 'Product Category', 'Taxonomy Singular Name', 'nutrifacts' ),
		'menu_name'                  => __( 'Product Category', 'nutrifacts' ),
		'all_items'                  => __( 'All Items', 'nutrifacts' ),
		'parent_item'                => __( 'Parent Item', 'nutrifacts' ),
		'parent_item_colon'          => __( 'Parent Item:', 'nutrifacts' ),
		'new_item_name'              => __( 'New Item Name', 'nutrifacts' ),
		'add_new_item'               => __( 'Add New Item', 'nutrifacts' ),
		'edit_item'                  => __( 'Edit Item', 'nutrifacts' ),
		'update_item'                => __( 'Update Item', 'nutrifacts' ),
		'view_item'                  => __( 'View Item', 'nutrifacts' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'nutrifacts' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'nutrifacts' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'nutrifacts' ),
		'popular_items'              => __( 'Popular Items', 'nutrifacts' ),
		'search_items'               => __( 'Search Items', 'nutrifacts' ),
		'not_found'                  => __( 'Not Found', 'nutrifacts' ),
		'no_terms'                   => __( 'No items', 'nutrifacts' ),
		'items_list'                 => __( 'Items list', 'nutrifacts' ),
		'items_list_navigation'      => __( 'Items list navigation', 'nutrifacts' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'product_category', array( 'products' ), $args );

}
add_action( 'init', 'nf_product_taxonomy', 0 );

// Register Brands Post Type
function nf_brand_posttype() {

	$labels = array(
		'name'                  => _x( 'Brands', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Brand', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Brands', 'text_domain' ),
		'name_admin_bar'        => __( 'Brands', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Brand', 'text_domain' ),
		'edit_item'             => __( 'Edit Brand', 'text_domain' ),
		'update_item'           => __( 'Update Brand', 'text_domain' ),
		'view_item'             => __( 'View Brand', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Brand', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'brands', $args );

}
add_action( 'init', 'custom_post_type', 0 );

/**
 * Flush rewrite rules on activation.
 */
function nf_rewrite_flush() {
	nf_product_posttype();
	nf_product_taxonomy();
	nf_brand_posttype();
	flush_rewrite_rules();
}

