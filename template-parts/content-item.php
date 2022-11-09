<?php

/**
 * Template part for displaying Item Info
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Qata_Alpaca_Theme
 */

?>

<div class="block-item">
    <!-- Item Slider -->
    <div class="item-slider">
        <?php if (have_rows('item_slider')) : ?>
            <!-- Main Slider -->
            <div class="item-slider__carousel">
                <div class="swiper-wrapper">
                    <?php while (have_rows('item_slider')) : the_row();
                        $image1x = wp_get_attachment_image_src(get_sub_field('img_item'), 'medium')[0];
                        $image2x = wp_get_attachment_image_src(get_sub_field('img_item'), 'large')[0];
                        $posX = get_sub_field('position_x');
                        $posY = get_sub_field('position_y');
                    ?>
                        <!-- Slide -->
                        <div class="swiper-slide item-slider__carousel__item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/dual-ring-1s-61px.gif'); background-position: center; background-repeat: no-repeat;">
                            <img data-src="<?php echo $image1x; ?>" data-srcset="<?php echo $image2x; ?> 2x" style="object-position: <?php echo $posX; ?>% <?php echo $posY; ?>%;" class="swiper-lazy">
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <!-- Thumbnail Slider -->
            <?php if (count(get_field('item_slider')) > 1) : ?>
                <div class="thumb-slider__carousel">
                    <div class="swiper-wrapper">
                        <?php while (have_rows('item_slider')) : the_row();
                            $img_thumb1x = wp_get_attachment_image_src(get_sub_field('img_item'), 'thumbnail-small')[0];
                            $img_thumb2x = wp_get_attachment_image_src(get_sub_field('img_item'), 'thumbnail')[0];
                            $posX = get_sub_field('position_x');
                            $posY = get_sub_field('position_y');
                        ?>
                            <!-- Slide -->
                            <div class="swiper-slide thumb-slider__carousel__item">
                                <img src="<?php echo $img_thumb1x; ?>" srcset="<?php echo $img_thumb2x; ?> 2x" style="object-position: <?php echo $posX; ?>% <?php echo $posY; ?>%;">
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="thumb-slider__navigation">
                    <div class="thumb-slider-prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="thumb-slider-next"><i class="fas fa-chevron-right"></i></div>
                </div>
            <?php endif; ?>
            <!-- None Image -->
        <?php else : ?>
            <div class="item-slider__carousel">
                <div class="swiper-slide item-slider__carousel__item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/no_image_placeholder.png'); background-position: center; background-repeat: no-repeat; background-size: 50%; border: lightgray solid 1px;"></div>
            </div>

        <?php endif; ?>
    </div>


    <!-- Item Card -->
    <div class="card-item">
        <div class="card-item__bg"></div>
        <div class="card-item__content">
            <!-- Item Title -->
            <div class="card-item__title">
                <h1 class="card-item__content__ttl">
                    <?php the_title(); ?>
                </h1>
            </div>
            <!-- Item Composition -->
            <?php if (have_rows('compositions')) : ?>
                <div class="card-item__composition">
                    <?php while (have_rows('compositions')) : the_row(); ?>
                        <!-- Composition with differents parts -->
                        <?php if (get_sub_field('comp_part')) : ?>
                            <p>
                                <span class="card-item__composition__part "><?php the_sub_field('comp_part') ?>:</span>

                                <?php $materialLenght = count(get_sub_field('composition'));
                                if (have_rows('composition')) :
                                    $i = 1;
                                    while (have_rows('composition')) :
                                        the_row(); ?>

                                        <span class="card-item__content__material" id="material">
                                            <?php $taxonomyTerm = get_sub_field('material'); ?>
                                            <?php the_sub_field('percentage') ?>% <a href="<?php echo home_url(); ?>/materials/<?php echo esc_html($taxonomyTerm->slug); ?>"><?php echo esc_html($taxonomyTerm->name); ?></a>
                                            <?php if ($i != $materialLenght) {
                                                echo ' / ';
                                                $i++;
                                            } ?>
                                        </span>

                                    <?php endwhile; ?>
                            </p>
                        <?php endif; ?>
                        <!-- Single Part Composition -->
                    <?php else : ?>
                        <?php if (have_rows('composition')) : ?>
                            <?php while (have_rows('composition')) : the_row(); ?>
                                <p class="card-item__content__material" id="material">
                                    <?php $taxonomyTerm = get_sub_field('material'); ?>
                                    <?php the_sub_field('percentage') ?> % <a href="<?php echo home_url(); ?>/materials/<?php echo esc_html($taxonomyTerm->slug); ?>"><?php echo esc_html($taxonomyTerm->name); ?></a>
                                </p>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <!-- Item Colors -->
            <?php if (have_rows('color_palette')) : ?>
                <div class="card-item__colors">
                    <h3 class="card-item__content__subtitle">
                        <?php _e('COLORS', 'qatatheme') ?>
                    </h3>
                    <div class="card-item__content__palete">
                        <?php while (have_rows('color_palette')) : the_row(); ?>
                            <!-- Color Square -->
                            <?php if (get_sub_field('color_name') !== "Rainbow") : ?>
                                <div class="card-item__content__palete__color tooltip" style="background-color:<?php the_sub_field('color'); ?>">
                                    <span class="tooltiptext"><?php the_sub_field('color_name'); ?></span>
                                </div>
                                <!-- Rainbow Square -->
                            <?php else : ?>
                                <div class="card-item__content__palete__color tooltip" style="background: linear-gradient(to right, #ff8080 , #fffa80, #81ff80, #7ea0ff, #ff7afd, #ff8080);">
                                    <span class="tooltiptext"><?php the_sub_field('color_name'); ?></span>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Item Sizes -->
            <?php if (have_rows('sizes_container')) : ?>
                <div class="card-item__sizes">
                    <h3 class="card-item__content__subtitle">
                        <?php _e('SIZE', 'qatatheme') ?>
                    </h3>

                    <?php while (have_rows('sizes_container')) : the_row(); ?>

                        <?php if (get_row_layout() == 'simple_size') : ?>
                            <?php if (have_rows('sizes_list')) : ?>
                                <div class="card-item__sizes__list">
                                    <?php while (have_rows('sizes_list')) : the_row(); ?>
                                        <p class="card-item__content__txt" id="item-size">
                                            <?php the_sub_field('size') ?>
                                        </p>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                            <p class="card-item__sizes__disclaimer">
                                * <?php the_sub_field('disclaimer') ?>
                            </p>
                        <?php elseif (get_row_layout() == 'table_size') : ?>
                            <?php if (have_rows('table')) : ?>
                                <table class="card-item__sizes__table">
                                    <?php while (have_rows('table')) : the_row(); ?>
                                        <tr>
                                            <?php if (get_sub_field('col_1')) : ?>
                                                <td class="card-item__content__txt"><?php the_sub_field('col_1') ?></td>
                                            <?php endif; ?>
                                            <?php if (get_sub_field('col_2')) : ?>
                                                <td class="card-item__content__txt"><?php the_sub_field('col_2') ?></td>
                                            <?php endif; ?>
                                            <?php if (get_sub_field('col_3')) : ?>
                                                <td class="card-item__content__txt"><?php the_sub_field('col_3') ?></td>
                                            <?php endif; ?>
                                            <?php if (get_sub_field('col_4')) : ?>
                                                <td class="card-item__content__txt"><?php the_sub_field('col_4') ?></td>
                                            <?php endif; ?>
                                            <?php if (get_sub_field('col_5')) : ?>
                                                <td class="card-item__content__txt"><?php the_sub_field('col_5') ?></td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endwhile; ?>
                                </table>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <!-- Item Accesories -->
            <?php if (get_field('accessories')) : ?>
                <div class="card-item__accessories">
                    <h3 class="card-item__content__subtitle">
                        <?php _e('ACCESSORIES', 'qatatheme') ?>
                    </h3>
                    <p class="card-item__content__txt" id="item-size">
                        <?php the_field('accessories'); ?>
                    </p>
                </div>
            <?php endif; ?>

            <?php if (get_field('item_description')) : ?>
                <div class="card-item__description">
                    <h3 class="card-item__content__subtitle ">
                        <?php _e('Description', 'qatatheme') ?>
                    </h3>

                    <p class="card-item__content__txt" id="item-description">
                        <?php the_field('item_description'); ?>
                    </p>
                </div>
            <?php endif; ?>

            <?php if (get_field('care_instructions')) : ?>
                <div class="card-item__care">
                    <h3 class="card-item__content__subtitle">
                        <?php _e('Care Instructions', 'qatatheme') ?>
                    </h3>
                    <p class="card-item__content__txt" id="item-care">
                        <?php the_field('care_instructions'); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>