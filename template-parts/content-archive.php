<?php
/**
 * Template part for displaying posts resume sqares
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Qata_Alpaca_Theme
 */

?>

<?php $thisPostID = get_the_ID(); ?>
<!-- New Item -->
<div id="post-<?php echo $thisPostID; ?>" <?php post_class('catalog-grid__item'); ?>>

    <?php if( get_post_type() == 'qata_product' ) : ?> 

		<div class="catalog-grid__item__img" style="object-position: center;">
			<a href="<?php echo esc_url( get_permalink()); ?>"><!-- get link item-->
				<?php if( have_rows('item_slider', $thisPostID) ): ?>
					<?php while( have_rows('item_slider', $thisPostID) ): the_row();
						$image1x = wp_get_attachment_image_src(get_sub_field('img_item'), 'medium')[0];
						$image2x = wp_get_attachment_image_src(get_sub_field('img_item'), 'large')[0];
						$posX = get_sub_field('position_x');
						$posY = get_sub_field('position_y');
					?> 
						<?php if (get_sub_field('cover')) : ?>
							<img data-src="<?php echo $image1x; ?>" data-srcset="<?php echo $image2x; ?>" style="object-position: <?php echo $posX; ?>% <?php echo $posY; ?>%;" class="lazyload" loading="lazy" ><!-- get image Item -->
						<?php endif; ?>
					<?php endwhile; ?>
				<?php else : ?>
					<img data-src="<?php echo get_template_directory_uri(); ?>/assets/img/no_image_placeholder.png" style="background-color: white; border: lightgray solid 1px;" class="lazyload" loading="lazy" ><!-- None Image -->
				<?php endif; ?>
			</a>
		</div>
		
		<div class="catalog-grid__item__label">
			<a href="<?php echo esc_url( get_permalink() ); ?>"><!-- get link item-->
				<div class="catalog-grid__item__label__content">
					<h2 class="catalog-grid__item__label__content__prod">
						<?php the_title() ?><!-- get title item-->
					</h2>
					<?php if( have_rows('compositions', $thisPostID) ):
						while( have_rows('compositions', $thisPostID) ): the_row(); ?>
						<!-- Composition with differents parts -->
						<?php if(get_sub_field('comp_part')): ?>
							<p class="catalog-grid__item__label__content__material">
							<span><?php the_sub_field('comp_part') ?>:</span>
							
							<?php if( have_rows('composition', $thisPostID) ): ?>
								<?php while( have_rows('composition', $thisPostID) ): the_row(); ?>

									<span>
										<?php $taxonomyTerm = get_sub_field('material'); ?>
										<?php the_sub_field('percentage')?> % <?php echo esc_html($taxonomyTerm->name); ?> /
									</span>
						
								<?php endwhile; ?>
							</p><!-- get composition item-->
							<?php endif; ?>
						<!-- Single Part Composition -->
						<?php else: ?>
							<?php if( have_rows('composition') ): ?>
								<?php while( have_rows('composition') ): the_row(); ?>
									<p class="catalog-grid__item__label__content__material">
										<?php $taxonomyTerm = get_sub_field('material'); ?>
										<?php the_sub_field('percentage')?> % <?php echo esc_html($taxonomyTerm->name); ?>
									</p> <!-- get composition item-->
								<?php endwhile; ?>
							<?php endif; ?>
						<?php endif; ?>
					<?php endwhile;
					endif; ?>
					<svg class="catalog-grid__item__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"></svg>
				</div>
			</a>
		</div>

	<?php else : ?>

		<div class="catalog-grid__item__img" style="object-position: center;">
			<a href="<?php echo esc_url( get_permalink()); ?>"><!-- get link item-->
				<?php if( has_post_thumbnail() ):
					$image1x = esc_url(get_the_post_thumbnail_url(get_the_ID(),'medium'));
					$image2x = esc_url(get_the_post_thumbnail_url(get_the_ID(),'large'));
					?> 
					<img data-src="<?php echo $image1x; ?>" data-srcset="<?php echo $image2x; ?>" class="lazyload" loading="lazy" ><!-- get image Item -->
				<?php else : ?>
					<img data-src="<?php echo get_template_directory_uri(); ?>/assets/img/no_image_placeholder.png" style="background-color: white; border: lightgray solid 1px;" class="lazyload" loading="lazy" ><!-- None Image -->
				<?php endif; ?>
			</a>
		</div>
		
		<div class="catalog-grid__item__label">
			<a href="<?php echo esc_url( get_permalink() ); ?>"><!-- get post link -->
				<div class="catalog-grid__item__label__content">
					<h2 class="catalog-grid__item__label__content__prod">
						<?php the_title() ?><!-- get post title -->
					</h2>
					<p class="catalog-grid__item__label__content__material">
						<?php echo get_the_date( __('F jS, Y', 'qatatheme') ); ?><!-- get post date -->
					</p>
					<svg class="catalog-grid__item__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"></svg>
				</div>
			</a>
		</div>

	<?php endif; ?>
</div>