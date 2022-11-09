<?php
/* Template Name: Template - About Us*/
get_header();

if (have_posts()) : the_post();
?>

    <!-- Header Hero -->
    <?php get_template_part('template-parts/header-hero', get_post_type()); ?>

    <section class="second-screen">

        <div class="block-guiltfree">
            <div class="block-guiltfree__bg"></div>
            <div class="block-guiltfree__content">
                <h2 class="block-guiltfree__content__ttl">
                    <?php if (get_field('guilt-free_title')) {
                        the_field('guilt-free_title');
                    } ?>
                </h2>
                <p class="block-guiltfree__content__txt">
                    <?php if (get_field('guilt-free_text')) {
                        the_field('guilt-free_text');
                    } ?>
                </p>
            </div>
            <figure class="block-guiltfree__img">
                <img src="<?php echo get_field('guilt-free_img')['img_1x']; ?>" srcset="<?php echo get_field('guilt-free_img')['img_2x']; ?>" alt="Qata Alpaca - Alpacas in their natural environment.">
            </figure>
        </div>

        <?php get_template_part('template-parts/content-block-product', get_post_type()); ?>

    </section>

    <script>
        document.body.classList.add('about');
    </script>

<?php
endif;
get_footer();
?>