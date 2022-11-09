<?php
/**
 * Template part for Header Hero .
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Qata_Alpaca_Theme
 */

?>
    <?php if( get_post_type() == 'post' ) : ?>
        
            <div class="header-hero">
            <?php
                $post_image1x = esc_url(get_the_post_thumbnail_url(get_the_ID(),'large'));
                $post_image2x = esc_url(get_the_post_thumbnail_url(get_the_ID(),'full'));
                $post_name = get_the_title();
                $post_date = get_the_date( __('F jS, Y', 'qatatheme') );
            ?>
                <div class="header-hero__img">
                    <img src="<?php echo $post_image1x; ?>" alt="" srcset="<?php echo $post_image2x; ?>">
                </div>

                <div class="header-card landscape">
                    <div class="header-card__content">
                        <h1 class="header-card__ttl">
                            <?php echo $post_name; ?>
                        </h1>
                        <div class="header-card__descrip">
                            <?php echo $post_date; ?>
                        </div>   
                    </div>
                </div>
                
            </div>
        
            <div id="down-sign" class="first-screen__down-arrow">
                <a href="#down-sign"><i class="fas fa-long-arrow-alt-down"></i></a>
            </div>
        </section>

        <div class="header-card portrait">
            <h1 class="header-card__ttl">
            <?php echo $post_name; ?>
            </h1>
            <div class="header-card__descrip">
            <?php echo $post_date; ?>
            </div>
        </div>

    <?php else : ?>

            <div class="header-hero">
            <?php
                $head_image1x = wp_get_attachment_image_src(get_field('header_image'), 'large')[0];
                $head_image2x = wp_get_attachment_image_src(get_field('header_image'), 'full')[0];
            ?>
                <div class="header-hero__img">
                    <img src="<?php echo $head_image1x; ?>" alt="" srcset="<?php echo $head_image2x; ?>" style="object-position: <?php the_field('image_position_x') ?>% <?php the_field('image_position_y') ?>%;">
                </div>

                <div class="header-card landscape">
                    <h1 class="header-card__ttl">
                        <?php the_title(); ?>
                    </h1>
                    <div class="header-card__descrip">
                        <?php the_content(); ?>
                    </div>
                    
                </div>
                
            </div>
        
            <div id="down-sign" class="first-screen__down-arrow">
                <a href="#down-sign"><i class="fas fa-long-arrow-alt-down"></i></a>
            </div>
        </section>

        <div class="header-card portrait">
            <h1 class="header-card__ttl">
            <?php the_title(); ?>
            </h1>
            <div class="header-card__descrip">
            <?php the_content(); ?>
            </div>
        </div>

    <?php endif; ?>