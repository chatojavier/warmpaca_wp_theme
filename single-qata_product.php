<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Qata_Alpaca_Theme
 */

get_header();
?>
    </section>
    <section class="second-screen">
        <!-- Item Block -->
        <?php get_template_part( 'template-parts/content-item', get_post_type() ); ?>

        <!-- Product Slider Block -->
        <?php get_template_part( 'template-parts/content-block-product', get_post_type() ); ?>

        <!-- Category Menu Block -->
        <?php get_template_part( 'template-parts/content-block-category', get_post_type() ); ?>
    </section>

    <script>
        document.body.classList.add('item');
    </script>


<?php
get_footer();