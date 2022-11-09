<?php
/**
 * Template part for displaying Header slider Block
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Qata_Alpaca_Theme
 */

?>
        
    <?php if ( is_front_page() ) : ?>
        <div class="header-slider">
            <?php $terms = get_terms( 'products_category' ); ?>
            <div class="header-slider__carousel" style="opacity: 0;">
                <div class="swiper-wrapper">
                    <?php foreach ( $terms as $term ) :
                        // The $term is an object, so we don't need to specify the taxonomy ID.
                        $term_link = get_term_link( $term );
                        $cat_image1x = wp_get_attachment_image_src(get_field('cat_image', $term), 'large')[0];
                        $cat_image2x = wp_get_attachment_image_src(get_field('cat_image', $term), 'full')[0];
                        $img_pos = get_field('img_position', $term);
                        $excluded_categories = array( 190, 240, 242 );
                        // If there was an error, continue to the next term.
                        if ( is_wp_error( $term_link ) || in_array($term->term_id, $excluded_categories) ) {
                            continue;
                        }
                        //show a non image pic if not featured image set
						if (empty($cat_image1x)) :?>
							<div style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/no_image_placeholder.png'); background-position: center; background-repeat: no-repeat; background-size: 50%; border: lightgray solid 1px; height:100%"></div>
                        
                        <?php else : //asign featured image to slide ?>
                            <div class="swiper-slide header-slider__carousel__item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/dual-ring-1s-61px.gif'); background-position: center; background-repeat: no-repeat; background-size: 5%;">
                                <a href="<?php echo $term_link ?>">
                                    <img data-src="<?php echo $cat_image1x ?>" data-srcset="<?php echo $cat_image2x ?>" style="object-position: <?php echo $img_pos['x'] ?>% <?php echo $img_pos['y'] ?>%;" class="swiper-lazy">
                                    <div class="slide-image-overlay"></div>
                                </a>
                            </div>
                        <?php endif;
                    endforeach;?>
                </div>
            </div>
            <div class="header-slider__label">
                <div class="swiper-wrapper">
                    <?php foreach ( $terms as $term ) :
                        // The $term is an object, so we don't need to specify the taxonomy ID.
                        $term_link = get_term_link( $term );
                        $term_name = $term->name;
                        $item_id = get_field('cover_product', $term);
                        if ($item_id) {
                            $item_name = get_the_title( $item_id );
                        } else {unset($item_name);}
                        $excluded_categories = array( 190, 240, 242 );
                        // If there was an error, continue to the next term.
                        if ( is_wp_error( $term_link ) || in_array($term->term_id, $excluded_categories) ) {
                            continue;
                        }
                    
                        // We successfully got a link. Print it out.?>
                        <div class="swiper-slide">
                            <a href="<?php echo $term_link ?>">
                                <div class="header-slider__label__content">
                                    <p class="header-slider__label__content__prod"><?php echo $item_name ?? '' ?></p>
                                    <h1 class="header-slider__label__content__cat"><?php echo $term_name ?></h1>
                                    <svg class="header-slider__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"/></svg>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php else :
        if (have_posts()) :
            query_posts ('posts_per_page=6');?>
            <div class="header-slider">
                <?php $terms = get_terms( 'products_category' ); ?>
                <div class="header-slider__carousel" style="opacity: 0;">
                    <div class="swiper-wrapper">

                        <?php while ( have_posts() ) : the_post(); 
                            $post_link = esc_url( get_permalink() );
                            $post_img1x = esc_url(get_the_post_thumbnail_url(get_the_ID(),'large'));
                            $post_img2x = esc_url(get_the_post_thumbnail_url(get_the_ID(),'full'));
                            // If there was an error, continue to the next term.
                            if ( is_wp_error( $post_link ) ) {
                                continue;
                            }
                            //show a non image pic if not featured image set
						    if (empty($post_img1x)) :?>
							    <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/no_image_placeholder.png'); background-position: center; background-repeat: no-repeat; background-size: 50%; border: lightgray solid 1px; height:100%"></div>
                        
                            <?php else : //asign featured image to slide ?>
                                <div class="swiper-slide header-slider__carousel__item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/dual-ring-1s-61px.gif'); background-position: center; background-repeat: no-repeat; background-size: 5%;">
                                    <a href="<?php echo $post_link ?>">
                                        <img data-src="<?php echo $post_img1x ?>" data-srcset="<?php echo $post_img2x ?> 2x" class="swiper-lazy">
                                        <div class="slide-image-overlay"></div>
                                    </a>
                                </div>

                            <?php endif;
                        endwhile;?>

                    </div>
                </div>
                <div class="header-slider__label">
                    <div class="swiper-wrapper">

                        <?php while ( have_posts() ) : the_post(); 
                            $post_link = esc_url( get_permalink() );
                            $post_name = get_the_title();
                            $post_date = get_the_date( __('F jS, Y', 'qatatheme') );
                            // If there was an error, continue to the next term.
                            if ( is_wp_error( $term_link ) ) {
                                continue;
                            }

                            // We successfully got a link. Print it out.?>
                            <div class="swiper-slide">
                                <a href="<?php echo $post_link; ?>">
                                    <div class="header-slider__label__content">
                                        <h1 class="header-slider__label__content__cat"><?php echo $post_name; ?></h1>
                                        <p class="header-slider__label__content__prod"><?php echo $post_date; ?></p>
                                        <svg class="header-slider__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"/></svg>
                                    </div>
                                </a>
                            </div>

                        <?php endwhile;?>

                    </div>
                </div>
            </div>
        <?php endif; 
    endif; ?>
        <div id="down-sign" class="first-screen__down-arrow">
            <a href="#down-sign"><i class="fas fa-long-arrow-alt-down"></i></a>
        </div>
    </section>