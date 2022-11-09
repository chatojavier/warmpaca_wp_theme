<?php
/* Template Name: Template - Home */
get_header();
get_template_part( 'template-parts/content-header_slider', get_post_type() );

if(have_posts()) : the_post();
?>

    <section class="second-screen">
        <?php
        if (get_field('block_1')) :
            $block_01 = get_field('block_1');
            $block_01_img_1x = $block_01['image']['img_1x'];
            $block_01_img_2x = $block_01['image']['img_2x'];
            $block_01_description = $block_01['text']['description'];
            $block_01_button = $block_01['text']['button'];
            ?>
            <div id="block-about" class="block-about">
                <div class="block-about__bg"></div>
                <div class="block-about__content">
                    <p class="block-about__content__txt"><?php echo $block_01_description; ?></p>
                    <a href="about-us/"><h2 class="block-about__content__btn"><?php echo $block_01_button; ?></h2></a>
                </div>
                <figure class="block-about__img">
                    <img src="<?php echo $block_01_img_1x; ?>" srcset="<?php echo $block_01_img_2x; ?>" alt="Qata Alpaca - Alpacas in their natural environment.">
                </figure>
            </div>
            <?php
        endif;
        if (get_field('block_2')) :
            $block_02 = get_field('block_2');
            $block_02_img01_1x = $block_02['image_01']['img_1x'];
            $block_02_img01_2x = $block_02['image_01']['img_2x'];
            $block_02_img02_1x = $block_02['image_02']['img_1x'];
            $block_02_img02_2x = $block_02['image_02']['img_2x'];
            $block_02_description = $block_02['text']['description'];
            $block_02_button = $block_02['text']['button'];
            ?>
            <div class="block-respons">
                <div class="block-respons__bg"></div>
                <figure class="block-respons__img1">
                    <img src="<?php echo $block_02_img01_1x; ?>" srcset="<?php echo $block_02_img01_2x; ?>" alt="Qata Alpaca - Light Coffee Alpaca Huacaya.">
                </figure>
                <div class="block-respons__content">
                    <p class="block-respons__content__txt mb-8"><?php echo $block_02_description; ?></p>
                    <a href="responsibility/"><h2 class="block-respons__content__btn"><?php echo $block_02_button; ?></h2></a>
                </div>
                <figure class="block-respons__img2">
                    <img src="<?php echo $block_02_img02_1x; ?>" srcset="<?php echo $block_02_img02_2x; ?>" alt="Qata Alpaca - Artisans working Alpaca's fur.">
                </figure>
            </div>
            <?php
        endif;
        ?>

        <div class="block-products">
            <div class="block-products__bg"></div>
            <div class="block-products__content">
                <h1 class="block-products__content__ttl"><?php _e('Featured Products', 'qatatheme')?></h1>
                <a href="<?php echo get_home_url() . '/products/';?>"><h2 class="block-products__content__btn"><?php _e('View All', 'qatatheme') ?></h2></a>
            </div>
            <div class="block-products__slider">
                <div class="product-slider">
                    <?php get_product_slider( '', 6 ); ?>
                </div>
            </div>
        </div>
    </section>

<?php
endif;
get_footer();
?>