<?php
/* Template Name: Template - Products*/
get_header();

if(have_posts()) : the_post();
  global $post;
  $home_id = $post->ID;
?>

<!-- Header Hero Products -->
<?php get_template_part( 'template-parts/header-hero-product', get_post_type() ); ?>

    <section class="second-screen">
        <?php get_quality_block();
        get_about_alpacas_block();
        get_fiber_properties_block() ?>

        
    </section>

    <script>
        document.body.classList.add('products');
    </script>

<?php
endif;
get_footer();
?>