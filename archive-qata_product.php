<?php
/* Products archive page */
get_header();

if(have_posts()) : the_post();
  global $post;
  $home_id = $post->ID;
?>

<!-- Header Hero Products -->
<?php get_template_part( 'template-parts/header-hero-product', get_post_type() ); ?>

    <section class="second-screen">
        <div class="block-artisans">
            <div class="block-artisans__bg"></div>
            <div class="block-artisans__content">
                <h2 class="block-artisans__content__ttl">
                    QUALITY & STANDARDS
                </h2>
                <p class="block-artisans__content__txt">
                    We believe that artisans deserve to be recognized and receive a good payment for their work, which sometimes does not happen, making it impossible for artisans to continue living on their art. We work hand in hand with local artisans specialized in fur and alpaca yarn products for home decoration, accessories and toys.
                </p>
            </div>
            <figure class="block-artisans__img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/products_img_002.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/products_img_002@2x.jpg" alt="Qata Alpaca - Alpacas in their natural environment.">
            </figure>
        </div>

        <div class="block-guiltfree">
            <div class="block-guiltfree__bg"></div>
            <div class="block-guiltfree__content">
                <h2 class="block-guiltfree__content__ttl">
                    About Alpacas
                </h2>
                <div class="block-guiltfree__content__txt">
                    <p>
                        Alpaca, considered once as the “fibre of the gods” by the Incas, is more to what meets the eye. It is known that approximately 80% of the world’s alpaca population live in the Peruvian Andes (in the regions of Puno, Arequipa, Cuzco, Ayacucho, Huancavelica and Apurimac). There are two different kinds: Huacayas and Suris. These beautiful animals inhabit the pastures of the Peruvian highlands from 3,800 metres above sea level to even higher zones. Unlike other animal fibres such as goat or sheep, alpacas are incredibly special due to their unique environmental and sustainable properties.
                    </p>
                    <p>
                        Alpacas diet consist on pastures and other plants found in their natural habitat. What makes their feeding process so special is that alpacas do not harm the soil, they nibble the top of the grasses and eat much less food than most other fibre-producing livestock. Unlike other animals, that rip out the plants, alpacas feeding technique allows the vegetation to grow back easily. Another great difference with other livestock animals is that alpaca’s feet do not damage the soil. Alpacas have two toes with toenails and a very soft pad at the bottom of each foot making its pace and graze much less harmful to the land.
                    </p>
                    <p>
                        In addition, the water supply for these animals comes from natural resources such as streams and rivers due to glacier melting. At above 4,000 metres above sea level resources are endless for these amazing animals. Living at this higher conditions also makes alpacas even more environmentally friendly because their habitat is not suitable for agriculture. This has a massive impact on the environment and garment industry.
                    </p>
                </div>
            </div>
            <figure class="block-guiltfree__img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/products_img_003.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/products_img_003@2x.jpg" alt="Qata Alpaca - Alpacas in their natural environment." style="object-position: 0% 25%;"> 
            </figure>
        </div>

        <div class="block-properties">
            <div class="block-properties__bg"></div>
            <div class="block-properties__content">
                <h2 class="block-properties__content__ttl">
                    PROPERTIES OF THE FIBRE AND FUR
                </h2>
                <ul class="block-properties__content__txt">
                    <li>
                        Alpaca fibre fineness varies from 18 microns to 35 microns making it extremely soft to the tact and allows the manufacture of light and thick garments.
                    </li>
                    <li>
                        Alpaca fibre is flame-resistant. Compared to vegetable or synthetic fibres, alpaca’s fibre is more flame-resistant since it does not melt onto the skin. It can endure temperatures up to 600°C before ignition.
                    </li>
                    <li>
                        Alpaca fibre is water-resistant. Water does not penetrate de fur easily.
                    </li>
                </ul>
                <ul class="block-properties__content__txt">
                    <li>
                        Alpaca fibre has an incredibly soft touch. Unlike cashmere, which can be as softer as alpaca, alpaca’s cuticle is smoother making it more soft and smooth to the tact. The scale height of wool is between 0.65 to 0.90 microns while alpaca fibre reaches 0.25 microns.
                    </li>
                    <li>
                        Alpaca hides are very resistant to wear and tear over the time. Attributes such as strength and density of the fibre allows it to create beautiful yet durable garments.
                    </li>
                </ul>
                <ul class="block-properties__content__txt">
                    <li>
                        Alpaca fibre is non-allergenic due to the absence of lanolin that could cause an allergic reaction.
                    </li>
                    <li>
                        Perfect for any kind of climates. Alpaca fibre adapts perfectly to warm and cold weathers since it has very effective insulate properties so is wearable through the year and perfect for home products.
                    </li>
                    <li>
                        Alpaca fibre comes in more than 22 natural colors.
                    </li>
                </ul>
            </div>
            <figure class="block-properties__img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/products_img_004.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/products_img_004@2x.jpg" alt="Qata Alpaca - Alpacas in their natural environment.">
            </figure>
        </div>
    </section>

    <script>
        document.body.classList.add('products');
    </script>

<?php
endif;
get_footer();
?>