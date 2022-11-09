<?php
/**
 * Template part for Header Hero of Products.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Qata_Alpaca_Theme
 */

?>
        
        <div class="header-hero">
            <div class="header-hero__img">
            <?php
            $head_image1x = wp_get_attachment_image_src(get_field('header_image'), 'large')[0];
            $head_image2x = wp_get_attachment_image_src(get_field('header_image'), 'full')[0];
            $archive_personalized = get_term(190, 'products_category');
            ?>
                <img src="<?php echo $head_image1x ?>" alt="" srcset="<?php echo $head_image2x ?> 2x" style="object-position: <?php the_field('image_position_x') ?>% <?php the_field('image_position_y') ?>%;">
                <img src="" srcset="" class="header-hero__img__change opacity-0">
            </div>
            <div class="header-card landscape">
                <h1 class="header-card__ttl">
                    <?php the_title(); ?>
                </h1>

                <?php
                $terms = get_terms( 'products_category' );
                $pers_ids = array('zh' => 242, 'en' => 190, 'es' => 240);
                $terms_lenght = count($terms);
                $pers_key = null;
                ?>
                <ul class="header-card__list">
                <?php 
                $arr_index = 1;
                foreach ( $terms as $key => $term ) :
                    // The $term is an object, so we don't need to specify the $taxonomy.
                    $term_id = $term->term_id;
                    $term_link = get_term_link( $term );
                    $cat_image1x = wp_get_attachment_image_src(get_field('cat_image', $term), 'large')[0];
                    $cat_image2x = wp_get_attachment_image_src(get_field('cat_image', $term), 'full')[0];
                    
                    // If there was an error, continue to the next term.
                    if ( is_wp_error( $term_link ) || $term == get_queried_object() ) {
                        $arr_index++;
                        continue; 
                    }

                    // change "personalized items" position to end
                    if (in_array($term_id, $pers_ids) &&  $arr_index < $terms_lenght) :
                        $pers_key = $key;
                        $arr_index++;
                        continue; 
                    elseif (!in_array($term_id, $pers_ids) &&  $arr_index == $terms_lenght) :
                        ?>
                        <li>
                            <a href="<?php echo esc_url( $term_link ); ?>" data-src="<?php echo $cat_image1x; ?>" data-srcset="<?php echo $cat_image2x ?>"> <?php echo $term->name ?> </a>
                        </li>
                        <?php
                        if($pers_key !== null) :
                            $pers_term = $terms[$pers_key];
                            $term_link = get_term_link( $pers_term );
                            $cat_image1x = wp_get_attachment_image_src(get_field('cat_image', $pers_term), 'large')[0];
                            $cat_image2x = wp_get_attachment_image_src(get_field('cat_image', $pers_term), 'full')[0];
                            ?>
                            <li>
                                <a href="<?php echo esc_url( $term_link ); ?>" data-src="<?php echo $cat_image1x; ?>" data-srcset="<?php echo $cat_image2x ?>"> <?php echo $pers_term->name ?> </a>
                            </li>
                            <?php
                        endif;
                        $arr_index++;
                        continue; 
                    endif;
                    ?>
                    <li>
                        <a href="<?php echo esc_url( $term_link ); ?>" data-src="<?php echo $cat_image1x; ?>" data-srcset="<?php echo $cat_image2x ?>"> <?php echo $term->name ?> </a>
                    </li>
                    <?php
                    $arr_index++;
                endforeach;
                ?>
                </ul>                
            </div>
        </div>
       
        <div id="down-sign" class="first-screen__down-arrow">
            <a href="#down-sign"><i class="fas fa-long-arrow-alt-down"></i></a>
        </div>
    </section>

    <div class="header-card portrait">
        <h1 class="header-card__ttl">
            <?php _e('Products', 'qatatheme')?>
        </h1>
        
        <ul class="header-card__list">
        <?php foreach ( $terms as $term ) {
            // The $term is an object, so we don't need to specify the $taxonomy.
            $term_link = get_term_link( $term );
            
            // If there was an error, continue to the next term.
            if ( is_wp_error( $term_link )) {
                continue;
            } 
        
            // We successfully got a link. Print it out.?>
            <li>
                <a href="<?php echo esc_url( $term_link ); ?>"> <?php echo $term->name ?> </a>
            </li>
        <?php } ?>
        </ul>
    </div>