<?php
/* Template Name: Template - Responsibility*/
get_header();

if(have_posts()) : the_post();
  global $post;
  $home_id = $post->ID;
?>

    <!-- Header Hero -->
    <?php get_template_part( 'template-parts/header-hero', get_post_type() ); ?>

    <section class="second-screen">
        <div class="block-artisans">
            <div class="block-artisans__bg"></div>
            <div class="block-artisans__content">
                <h2 class="block-artisans__content__ttl">
                    <?php if( get_field('artisans_title')) { the_field('artisans_title'); } ?>
                </h2>
                <p class="block-artisans__content__txt">
                    <?php if( get_field('artisans_text')) { the_field('artisans_text'); } ?>
                </p>
            </div>
            <figure class="block-artisans__img">
                <img src="<?php echo get_field('artisans_img')['img_1x']; ?>" srcset="<?php echo get_field('artisans_img')['img_2x']; ?>" alt="Qata Alpaca - Alpacas in their natural environment.">
            </figure>
        </div>

        <div class="block-guiltfree">
            <div class="block-guiltfree__bg"></div>
            <div class="block-guiltfree__content">
                <h2 class="block-guiltfree__content__ttl">
                    <?php if( get_field('guilt-free_title')) { the_field('guilt-free_title'); } ?>
                </h2>
                <p class="block-guiltfree__content__txt">
                    <?php if( get_field('guilt-free_text')) { the_field('guilt-free_text'); } ?>
                </p>
            </div>
            <figure class="block-guiltfree__img">
                <img src="<?php echo get_field('guilt-free_img')['img_1x']; ?>" srcset="<?php echo get_field('guilt-free_img')['img_2x']; ?>" alt="Qata Alpaca - Alpacas in their natural environment.">
            </figure>
        </div>

        <div class="block-articles">
            <div class="block-articles__bg"></div>
            <div class="block-articles__content">
                <h1 class="block-articles__content__ttl"><?php _e('Recent Articles', 'qatatheme') ?></h1>
                <a href=""><h2 class="block-articles__content__btn"><?php _e('View All', 'qatatheme')?></h2></a>
            </div>
            <div class="block-articles__slider">
                <div class="product-slider">
                    <?php get_post_slider(6); ?>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.body.classList.add('responsibility');
    </script>

<?php
endif;
get_footer();
?>