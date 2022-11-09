<?php
/**
 * Template part for displaying Category Menu Block
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Qata_Alpaca_Theme
 */

?>

<div class="block-categories">
    <div class="block-categories__bg"></div>
    <div class="block-categories__img">
    <?php
        $post_term = get_the_terms( $post->ID, 'products_category' )[0];
        $archive_term = get_queried_object();
        $image1x = wp_get_attachment_image_src(get_field('cat_image', $post_term), 'large')[0];
        $image2x = wp_get_attachment_image_src(get_field('cat_image', $post_term), 'full')[0];
    ?>
        <img src="<?php echo $image1x ?>" alt="" srcset="<?php echo $image2x ?> 2x" style="object-position: center;">
        <img src="" srcset="" class="block-categories__img__change opacity-0">
    </div>

    <div class="block-categories__card">
        <h1 class="block-categories__card__ttl">
            <?php _e('Products', 'qatatheme') ?>
        </h1>
        
        <?php
        $terms = get_terms( 'products_category' );
        $pers_ids = array('zh' => 242, 'en' => 190, 'es' => 240);
        $terms_lenght = count($terms);
        $pers_key = null;
        ?>
        <ul class="block-categories__card__list">
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