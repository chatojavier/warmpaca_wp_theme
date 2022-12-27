<?php

/**========================
	Create new images sizes.
===========================*/
function pw_add_image_sizes()
{
	add_image_size('thumbnail-small', '100', '0', false);
	add_image_size('medium-small', '400', '0', false);
}
add_action('init', 'pw_add_image_sizes');

function pw_show_image_sizes($sizes)
{
	$sizes['thumbnail-small'] = __('Thumbnail Small');
	$sizes['medium-small'] = __('Medium Small');

	return $sizes;
}
add_filter('image_size_names_choose', 'pw_show_image_sizes');


/**========================
	Create Post Types.
===========================*/

//Products
function create_products_posttype()
{

	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                       => _x('Products', 'taxonomy general name', 'qatalpaca'),
		'singular_name'              => _x('Product', 'taxonomy singular name', 'qatalpaca'),
		'search_items'               => __('Search Products', 'qatalpaca'),
		'popular_items'              => __('Popular Products', 'qatalpaca'),
		'all_items'                  => __('All Products', 'qatalpaca'),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __('Edit Product', 'qatalpaca'),
		'update_item'                => __('Update Product', 'qatalpaca'),
		'add_new_item'               => __('Add New Product', 'qatalpaca'),
		'new_item_name'              => __('New Product Name', 'qatalpaca'),
		'separate_items_with_commas' => __('Separate products with commas', 'qatalpaca'),
		'add_or_remove_items'        => __('Add or remove products', 'qatalpaca'),
		'choose_from_most_used'      => __('Choose from the most used products', 'qatalpaca'),
		'not_found'                  => __('No products found.', 'qatalpaca'),
		'menu_name'                  => __('Products', 'qatalpaca'),
	);

	$supports = array(
		'title', 'editor', 'excerpt', 'thumbnail',
	);

	register_post_type(
		'qata_product',
		array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'products/%products_category%'),
			'menu_icon'   => 'dashicons-products',
			'menu_position' => 24,
			'taxonomies'  => array('products_category', 'materials'),
			'supports' => $supports,
		)
	);
}
add_action('init', 'create_products_posttype');


/**========================
	Create Taxonomies.
===========================*/

//Material Taxonomy
function create_materials_taxonomy()
{

	$labels = array(
		'name' => _x('Materials', 'taxonomy general name'),
		'singular_name' => _x('Material', 'taxonomy singular name'),
		'search_items' =>  __('Search Materials'),
		'popular_items' => __('Popular Materials'),
		'all_items' => __('All Materials'),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __('Edit Material'),
		'update_item' => __('Update Material'),
		'add_new_item' => __('Add New Material'),
		'new_item_name' => __('New Material Name'),
		'separate_items_with_commas' => __('Separate topics with commas'),
		'add_or_remove_items' => __('Add or remove Materials'),
		'choose_from_most_used' => __('Choose from the most used Materials'),
		'menu_name' => __('Materials'),
	);

	register_taxonomy('materials', 'qata_product', array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array('slug' => 'materials'),
	));
}

add_action('init', 'create_materials_taxonomy', 0);


//Product Categories Taxonomy
function create_products_category_taxonomy()
{

	$labels = array(
		'name' => _x('Product Categories', 'taxonomy general name'),
		'singular_name' => _x('Product Category', 'taxonomy singular name'),
		'search_items' =>  __('Search Product Categories'),
		'popular_items' => __('Popular Product Categories'),
		'all_items' => __('All Product Categories'),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __('Edit Product Category'),
		'update_item' => __('Update  ProductCategory'),
		'add_new_item' => __('Add New Product Category'),
		'new_item_name' => __('New Product Category Name'),
		'separate_items_with_commas' => __('Separate topics with commas'),
		'add_or_remove_items' => __('Add or remove Product Categories'),
		'choose_from_most_used' => __('Choose from the most used Product Categories'),
		'menu_name' => __('Categories'),
	);

	register_taxonomy('products_category', 'qata_product', array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite'      => array('slug' => 'products', 'with_front' => false),
		'supports' => array('thumbnail'),
	));
}

add_action('init', 'create_products_category_taxonomy', 0);


//Changing each URL product to: /products/categoryName/item

function products_category_post_link($post_link, $id = 0)
{
	$post = get_post($id);
	$terms = wp_get_object_terms($post->ID, 'products_category');
	if ($terms) {
		return str_replace('%products_category%', $terms[0]->slug, $post_link);
	} else {
		return str_replace('%books%/', '', $post_link);
	}
	return $post_link;
}
add_filter('post_type_link', 'products_category_post_link', 1, 3);

//Remove TaxonomyName from the archive title

add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_author()) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif (is_tax()) { //for custom post types
		$title = sprintf(__('%1$s'), single_term_title('', false));
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	}
	return $title;
});



/**========================
	Products Slider Function.
===========================*/

function get_product_slider($terms_names, $numberSlides)
{
	//defining what kind of page is it
	$postType = get_post_type();
	$postId = get_the_ID();
	$term = get_queried_object()->term_id;
	$excluded_terms = array(190, 240, 242);
	// defining args of posts to display
	// posts of post category
	if ($postType == 'qata_product' && !in_array($term, $excluded_terms)) {
		$args = array(
			'post_type' => $postType,
			'orderby'   => 'rand',
			'posts_per_page' => $numberSlides,
			'tax_query' => array(
				array(
					'taxonomy' => 'products_category',
					'field'    => 'slug',
					'terms'    => $terms_names,
				),
			),
		);
	}
	// All posts
	else {
		$args = array(
			'post_type' => 'qata_product',
			'orderby'   => 'rand',
			'posts_per_page' => $numberSlides,
		);
	}
	// Assingn args to WP_Query
	$the_query = new WP_Query($args);

	// Creating an array to store all the items ids 
	$IDitems = array();

	// Starting the loop
	if ($the_query->have_posts()) : ?>
		<!-- Image Slider -->
		<div class="product-slider__carousel">
			<div class="swiper-wrapper">
				<?php while ($the_query->have_posts()) :
					$the_query->the_post();
					$excluded_post = array(2144, 2145, 2146);
					if (get_the_ID() === $postId || in_array(get_the_ID(), $excluded_post)) {
						continue;
					}
					$IDitems[] = get_the_ID(); ?>
					<!-- loader gif -->
					<div class="product-slider__carousel__item swiper-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/dual-ring-1s-61px.gif'); background-position: center; background-repeat: no-repeat; background-size: 5%;">

						<!-- Link to Item -->
						<a href="<?php echo get_permalink(); ?>">
							<?php //loop to get cover image and positions
							if (have_rows('item_slider')) :
								while (have_rows('item_slider')) : the_row();
									if (get_sub_field('cover')) :
										$image1x = wp_get_attachment_image_src(get_sub_field('img_item'), 'large')[0];
										$image2x = wp_get_attachment_image_src(get_sub_field('img_item'), 'full')[0];
										$posX = get_sub_field('position_x');
										$posY = get_sub_field('position_y');
										$cover_checker = "check";
										//show a non image pic if cover is activated but empty
										if (empty($image1x)) : ?>
											<div style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/no_image_placeholder.png'); background-position: center; background-repeat: no-repeat; background-size: 50%; border: lightgray solid 1px; height:100%"></div>
										<?php else : //asign image cover to slide 
										?>
											<img data-src="<?php echo $image1x; ?>" data-srcset="<?php echo $image2x; ?>" alt="" style="object-position: <?php echo $posX; ?>% <?php echo $posY; ?>%" class="swiper-lazy">
											<div class="slide-image-overlay"></div>
										<?php endif; ?>
								<?php break;
									endif;
									unset($cover_checker);
								endwhile;
							endif;
							if (!isset($cover_checker)) : ?>
								<div style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/no_image_placeholder.png'); background-position: center; background-repeat: no-repeat; background-size: 50%; border: lightgray solid 1px; height:100%"></div>
							<?php endif; ?>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		</div>

		<!-- Label Slider -->
		<div class="product-slider__label">
			<div class="swiper-wrapper">
				<?php foreach ($IDitems as $item) : ?>
					<div class="product-slider__label__content swiper-slide">
						<p class="product-slider__label__content__prod"><?php echo get_the_title($item); ?></p>

						<!-- Item Composition -->
						<h2 class="product-slider__label__content__material">
							<?php if (have_rows('compositions', $item)) : ?>
								<?php while (have_rows('compositions', $item)) : the_row(); ?>
									<!-- Composition with differents parts -->
									<?php if (get_sub_field('comp_part')) : ?>
										<div>
											<span><?php the_sub_field('comp_part') ?>:</span>

											<?php $materialLenght = count(get_sub_field('composition'));
											if (have_rows('composition')) :
												$i = 1;
												while (have_rows('composition')) :
													the_row(); ?>

													<span>
														<?php $taxonomyTerm = get_sub_field('material'); ?>
														<?php the_sub_field('percentage') ?>% <?php echo esc_html($taxonomyTerm->name); ?>
														<?php if ($i != $materialLenght) {
															echo ' / ';
															$i++;
														} ?>
													</span>

												<?php endwhile; ?>
											<?php endif; ?>
										</div>
										<!-- Single Part Composition -->
									<?php else : ?>
										<?php if (have_rows('composition', $item)) : ?>
											<?php while (have_rows('composition', $item)) : the_row(); ?>
												<span>
													<?php $taxonomyTerm = get_sub_field('material'); ?>
													<?php the_sub_field('percentage') ?>% <?php echo esc_html($taxonomyTerm->name); ?>
												</span>
											<?php endwhile; ?>
										<?php endif; ?>
									<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>
						</h2>

						<svg class="product-slider__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414">
							<defs></defs>
							<path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)" />
						</svg>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php wp_reset_postdata();
	else : ?>
		<span>No products found</span>
	<?php endif;
}

/**========================
	Post Slider Function.
===========================*/

function get_post_slider($numberSlides)
{
	//identify id of post
	$postId = get_the_ID();
	// defining args of posts to display
	$args = array(
		'post_type' => 'post',
		'orderby'   => 'rand',
		'posts_per_page' => $numberSlides,
	);
	// Assingn args to WP_Query
	$the_query = new WP_Query($args);

	// Creating an array to store all the items ids 
	$IDitems = array();

	// Starting the loop
	if ($the_query->have_posts()) : ?>
		<!-- Image Slider -->
		<div class="product-slider__carousel">
			<div class="swiper-wrapper">
				<?php while ($the_query->have_posts()) :
					$the_query->the_post();
					if (get_the_ID() === $postId) {
						continue;
					}
					$IDitems[] = get_the_ID(); ?>
					<!-- loader gif -->
					<div class="product-slider__carousel__item swiper-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/dual-ring-1s-61px.gif'); background-position: center; background-repeat: no-repeat; background-size: 5%;">

						<!-- Link to post -->
						<a href="<?php echo get_permalink(); ?>">
							<?php //defining with post values
							$image1x = esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium'));
							$image2x = esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large'));
							//show a non image pic if not featured image set
							if (empty($image1x)) : ?>
								<div style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/no_image_placeholder.png'); background-position: center; background-repeat: no-repeat; background-size: 50%; border: lightgray solid 1px; height:100%"></div>
							<?php else : //asign featured image to slide 
							?>
								<img data-src="<?php echo $image1x; ?>" data-srcset="<?php echo $image2x; ?> 2x" alt="" class="swiper-lazy">
								<div class="slide-image-overlay"></div>
							<?php endif; ?>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		</div>

		<!-- Label Slider -->
		<div class="product-slider__label">
			<div class="swiper-wrapper">
				<?php foreach ($IDitems as $item) : ?>
					<div class="product-slider__label__content swiper-slide">
						<p class="product-slider__label__content__prod"><?php echo get_the_title($item); ?></p>

						<!-- Post Composition -->
						<h2 class="product-slider__label__content__material">
							<?php echo get_the_date(__('F jS, Y', 'qatatheme'), $item); ?>
						</h2>

						<svg class="product-slider__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414">
							<defs></defs>
							<path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)" />
						</svg>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php wp_reset_postdata();
	else : ?>
		<span>No posts found</span>
<?php endif;
}


/**========================
	Set ACF cover item Image as Featured Post Image.
===========================*/

function acf_set_featured_image($value, $post_id, $field)
{

	if (have_rows('item_slider', $post_id)) {
		while (have_rows('item_slider', $post_id)) {
			the_row();
			if (get_sub_field('cover')) {
				$feat_img = get_sub_field('img_item');
			}
		}
	}

	if ($feat_img != '') {
		//Add the value which is the image ID to the _thumbnail_id meta data for the current post
		add_post_meta($post_id, '_thumbnail_id', $feat_img);
	}

	return $value;
}

// acf/update_value/name={$field_name} - filter for a specific field based on it's name
add_filter('acf/update_value/name=item_slider', 'acf_set_featured_image', 10, 3);


/**========================
	order archive posts by title ascending
===========================*/

function my_change_sort_order($query)
{
	if (is_archive()) :
		//If you wanted it for the archive of a custom post type use: is_post_type_archive( $post_type )
		//Set the order ASC or DESC
		$query->set('order', 'ASC');
		//Set the orderby
		$query->set('orderby', 'title');
	endif;
};

add_action('pre_get_posts', 'my_change_sort_order');


/**========================
	ACF include and register this location type.
===========================*/

function my_acf_init_location_types()
{

	// Check function exists, then include and register the custom location type class.
	if (function_exists('acf_register_location_type')) {
		include_once(get_template_directory() . '/inc/class-my-acf-location-taxonomy-term.php');
		acf_register_location_type('My_ACF_Location_Taxonomy_Term');
	}
}

add_action('acf/init', 'my_acf_init_location_types');


/**========================
	ACF Create Option Pages.
===========================*/

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Footer Fields',
		'menu_title'	=> 'Footer Fields',
		'menu_slug' 	=> 'footer-fields',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' => 'dashicons-table-row-after',
		'position' => 25
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Popup',
		'menu_title'	=> 'Popup',
		'menu_slug' 	=> 'popup',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' => 'dashicons-admin-page',
		'position' => 26
	));
};


/**========================
	Remove Pages from Dashboard Menu
===========================*/

if (!function_exists('remove_menu_pages')) {
	function remove_menu_pages()
	{
		$comments_menu_slug = 'edit-comments.php';
		remove_menu_page($comments_menu_slug);
	}
};
add_action('admin_menu', 'remove_menu_pages');


/**========================
	Including ACF in theme
===========================*/
// // Define path and URL to the ACF plugin.
// define( 'MY_ACF_PATH', get_stylesheet_directory() . '/plugins/acf/' );
// define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/plugins/acf/' );

// // Include the ACF plugin.
// include_once( MY_ACF_PATH . 'acf.php' );

// // Customize the url setting to fix incorrect asset URLs.
// add_filter('acf/settings/url', 'my_acf_settings_url');
// function my_acf_settings_url( $url ) {
// 	return MY_ACF_URL;
// }

// (Optional) Hide the ACF admin menu item.
// add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
// function my_acf_settings_show_admin( $show_admin ) {
// 	return false;
// }

/* Stop Adding Functions Below this Line */
?>