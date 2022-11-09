<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Qata_Alpaca_Theme
 */

?>

<footer>

	<div class="block-contact" id="contact">
		<div class="block-contact__bg"></div>
		<div class="block-contact__content">
			<?php
			if (get_field('footer_text', 'option')) :
			?>
				<p class="block-contact__content__txt">
					<?php the_field('footer_text', 'option'); ?>
				</p>
				<?php
			endif;
			if (have_rows('contact_data', 'option')) :
				while (have_rows('contact_data', 'option')) : the_row();
				?>
					<div class="block-contact__content__contacts">
						<?php
						if (get_sub_field('contact_details')) :
							$contact_text = get_sub_field('contact_details');
						?>
							<p class="contact_details">
								<?php echo $contact_text; ?>
							</p>
						<?php
						endif;
						if (have_rows('contact_apps')) :
						?>
							<div class="msn-icons">
								<?php
								while (have_rows('contact_apps')) : the_row();
								?>
									<a href="<?php echo get_sub_field('url'); ?>" target="_blank"><?php echo get_sub_field('icon'); ?></a>
								<?php
								endwhile;
								?>
							</div>
						<?php
						endif;
						?>
					</div>
			<?php
				endwhile;
			endif;
			?>
		</div>
		<!-- <div class="insta-container">
		<script src="https://apps.elfsight.com/p/platform.js" ></script>
		<div class="elfsight-app-4a319c36-b32c-4165-b3cc-b67ef65bde61"></div>
	</div> -->
	</div>

	<div class="block-footer">
		<div class="block-footer__bg"></div>
		<div class="block-footer__content">
			<div class="logo">
				<div class="logo__container | text-cuper w-64">
					<?php include get_template_directory() . '/inc/svgs/warmpaca-logo.php' ?>
				</div>
			</div>
			<p class="copyright">
				© <?php echo date("Y"); ?> Warmpaca. All rights reserved. <br>
				<a href="https://javierbenavides.com" target="_blank">Creative Web Design by Javier Benavides.</a>
			</p>
		</div>
	</div>

</footer>
<script src="https://kit.fontawesome.com/08c8d440a1.js" crossorigin="anonymous"></script>
<script>
	var menuContainer = document.querySelector('.fixed-bar ul.primary-menu');
	var languageItems = `<span class='menu-nav__item'>${window.innerWidth > window.innerHeight ? "|" : "• • •" }</span>` + `<?php get_template_part('template-parts/header', 'links-language'); ?>`;
	if (menuContainer) menuContainer.innerHTML += languageItems;
</script>

<?php wp_footer(); ?>

</body>

</html>