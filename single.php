<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Qata_Alpaca_Theme
 */

get_header();
get_template_part( 'template-parts/header-hero', get_post_type() );
?>

	<section class="second-screen">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>

		<div class="block-articles">
            <div class="block-articles__bg"></div>
            <div class="block-articles__content">
                <h1 class="block-articles__content__ttl"><?php _e('Recent Articles', 'qatatheme') ?></h1>
                <a href="blog.html"><h2 class="block-articles__content__btn"><?php _e('View All', 'qatatheme') ?></h2></a>
            </div>
            <div class="block-articles__slider">
				<div class="product-slider">
					<?php get_post_slider(6); ?>
				</div>
            </div>
        </div>

	</section><!-- #main -->
	<script>
        document.body.classList.add('single');
	</script>

<?php
get_footer();
