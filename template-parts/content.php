<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Qata_Alpaca_Theme
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class('block-single'); ?>>
	
	<?php
	$postAuthor = get_the_author();
	$authorAvatar = get_avatar( wp_get_current_user()->ID );
	$postDate = get_the_date( __('F jS, Y', 'qatatheme') );
	$postCat = get_the_category();
	$postCatName = $postCat[0]->name;
	$postCatLink = esc_url( get_category_link($postCat[0]->term_id ) );
	$postContent = get_the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'qatatheme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'qatatheme' ),
				'after'  => '</div>',
			)
		);
	?>

	<div class="block-single__bg"></div>
	<div class="block-single__container">
		<div class="block-single__pic-author">
			<?php echo $authorAvatar; ?>
		</div>
		<div class="block-single__info">
			<p class="block-single__info__author">
				<?php echo $postAuthor; ?>
			</p>
			<p class="block-single__info__date">
				<?php echo $postDate; ?>
			</p>
			<p class="block-single__info__category">
				<a href="<?php echo $postCatLink; ?>">
					<?php echo $postCatName; ?>
				</a>
			</p>
		</div>
		<div class="block-single__content">
			<?php echo $postContent; ?>
		</div>
	</div>
</article> 