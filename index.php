<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Qata_Alpaca_Theme
 */

get_header();
get_template_part( 'template-parts/content-header_slider', get_post_type() );
if (have_posts()) :
?>

	<!-- Second Screen -->
	<section class="second-screen">
        <div class="block-catalog">
            <div class="block-catalog__bg"></div>

            <div class="catalog-grid">
				<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/* Posts resume sqares */
						get_template_part( 'template-parts/content-archive', get_post_type() );

					endwhile;
				?>
            </div>
        </div>
	</section>
	
	<?php else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>


	<script>
        document.body.classList.add('blog');
	</script>
	<script>
	  if ('loading' in HTMLImageElement.prototype) {
	  // Si el navegador soporta lazy-load, tomamos todas las imágenes que tienen la clase
	  // `lazyload`, obtenemos el valor de su atributo `data-src` y lo inyectamos en el `src`.
	  var images = document.querySelectorAll("img.lazyload");
	    images.forEach(img => {
	        img.src = img.dataset.src;
			if (img.dataset.srcset) {
				img.srcset = img.dataset.srcset;
			};
	    });
	  } else {
	    // Importamos dinámicamente la libreria `lazysizes`
	    var script = document.createElement("script");
	    script.async = true;
	    script.src = "https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.0/lazysizes.min.js";
	    document.body.appendChild(script);
	  }
	</script>
<?php
get_footer();
