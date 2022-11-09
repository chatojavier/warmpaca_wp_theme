<?php
/* Template Name: Template - Blog*/
get_header();

if(have_posts()) : the_post();
  global $post;
  $home_id = $post->ID;
?>

<div class="header-slider">
            <div class="header-slider__carousel">
                <div class="swiper-wrapper">
                    <div class="swiper-slide header-slider__carousel__item"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_004.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_004@2x.jpg" style="object-position: 0 0;"></img></div></a>
                    <div class="swiper-slide header-slider__carousel__item"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/W-89.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/W-89@2x.jpg"></img></div></a>
                    <div class="swiper-slide header-slider__carousel__item"><a href="about.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/products_img_004.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/products_img_004@2x.jpg"></img></div></a>
                    <div class="swiper-slide header-slider__carousel__item"><a href="about.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/products_img_001.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/products_img_001@2x.jpg"></img></div></a>
                    <div class="swiper-slide header-slider__carousel__item"><a href="about.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/products_img_003.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/products_img_003@2x.jpg"></img></div></a>
                </div>
            </div>
            <div class="header-slider__label">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="about.html"><div class="header-slider__label__content">
                            <h1 class="header-slider__label__content__cat">¿Cómo se hace la esquila de la alapaca?</h1>
                            <p class="header-slider__label__content__prod">3 de mayo del 2020</p>
                            <svg class="header-slider__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"/></svg>
                        </div></a>
                    </div>
                    <div class="swiper-slide">
                        <a href="about.html"><div class="header-slider__label__content">
                            <h1 class="header-slider__label__content__cat">¿Cómo se hace la esquila de la alapaca?</h1>
                            <p class="header-slider__label__content__prod">3 de mayo del 2020</p>
                            <svg class="header-slider__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"/></svg>
                        </div></a>
                    </div>
                    <div class="swiper-slide">
                        <a href="about.html"><div class="header-slider__label__content">
                            <h1 class="header-slider__label__content__cat">¿Cómo se hace la esquila de la alapaca?</h1>
                            <p class="header-slider__label__content__prod">3 de mayo del 2020</p>
                            <svg class="header-slider__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"/></svg>
                        </div></a>
                    </div>
                    <div class="swiper-slide">
                        <a href="about.html"><div class="header-slider__label__content">
                            <h1 class="header-slider__label__content__cat">¿Cómo se hace la esquila de la alapaca?</h1>
                            <p class="header-slider__label__content__prod">3 de mayo del 2020</p>
                            <svg class="header-slider__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"/></svg>
                        </div></a>
                    </div>
                    <div class="swiper-slide">
                        <a href="about.html"><div class="header-slider__label__content">
                            <h1 class="header-slider__label__content__cat">¿Cómo se hace la esquila de la alapaca?</h1>
                            <p class="header-slider__label__content__prod">3 de mayo del 2020</p>
                            <svg class="header-slider__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"/></svg>
                        </div></a>
                    </div>
                </div>
            </div>
        </div>
       
        <div id="down-sign" class="first-screen__down-arrow">
            <a href="#down-sign"><i class="fas fa-long-arrow-alt-down"></i></a>
        </div>
    </section>

    <section class="second-screen">
        <div class="block-catalog">
            <div class="block-catalog__bg"></div>

            <div class="catalog-grid">
                <div class="catalog-grid__item">
                    <div class="catalog-grid__item__img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006.jpg);">
                        <a href="single.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006.jpg" alt="" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006@2x.jpg"></a>
                    </div>
                    <div class="catalog-grid__item__label">
                        <a href="single.html">
                            <div class="catalog-grid__item__label__content">
                                <h2 class="catalog-grid__item__label__content__prod">
                                    ¿Cómo se hace la esquila de la alapaca?
                                </h2>
                                <p class="catalog-grid__item__label__content__material">
                                    3 de mayo del 2020
                                </p>
                                <svg class="catalog-grid__item__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"></svg>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="catalog-grid__item">
                    <div class="catalog-grid__item__img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006.jpg);">
                        <a href="single.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006.jpg" alt="" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006@2x.jpg"></a>
                    </div>
                    <div class="catalog-grid__item__label">
                        <a href="single.html">
                            <div class="catalog-grid__item__label__content">
                                <h2 class="catalog-grid__item__label__content__prod">
                                    ¿Cómo se hace la esquila de la alapaca?
                                </h2>
                                <p class="catalog-grid__item__label__content__material">
                                    3 de mayo del 2020
                                </p>
                                <svg class="catalog-grid__item__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"></svg>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="catalog-grid__item">
                    <div class="catalog-grid__item__img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006.jpg);">
                        <a href="single.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006.jpg" alt="" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006@2x.jpg"></a>
                    </div>
                    <div class="catalog-grid__item__label">
                        <a href="single.html">
                            <div class="catalog-grid__item__label__content">
                                <h2 class="catalog-grid__item__label__content__prod">
                                    ¿Cómo se hace la esquila de la alapaca?
                                </h2>
                                <p class="catalog-grid__item__label__content__material">
                                    3 de mayo del 2020
                                </p>
                                <svg class="catalog-grid__item__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"></svg>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="catalog-grid__item">
                    <div class="catalog-grid__item__img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006.jpg);">
                        <a href="single.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006.jpg" alt="" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006@2x.jpg"></a>
                    </div>
                    <div class="catalog-grid__item__label">
                        <a href="single.html">
                            <div class="catalog-grid__item__label__content">
                                <h2 class="catalog-grid__item__label__content__prod">
                                    ¿Cómo se hace la esquila de la alapaca?
                                </h2>
                                <p class="catalog-grid__item__label__content__material">
                                    3 de mayo del 2020
                                </p>
                                <svg class="catalog-grid__item__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"></svg>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="catalog-grid__item">
                    <div class="catalog-grid__item__img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006.jpg);">
                        <a href="single.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006.jpg" alt="" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006@2x.jpg"></a>
                    </div>
                    <div class="catalog-grid__item__label">
                        <a href="single.html">
                            <div class="catalog-grid__item__label__content">
                                <h2 class="catalog-grid__item__label__content__prod">
                                    ¿Cómo se hace la esquila de la alapaca?
                                </h2>
                                <p class="catalog-grid__item__label__content__material">
                                    3 de mayo del 2020
                                </p>
                                <svg class="catalog-grid__item__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"></svg>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="catalog-grid__item">
                    <div class="catalog-grid__item__img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006.jpg);">
                        <a href="single.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006.jpg" alt="" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006@2x.jpg"></a>
                    </div>
                    <div class="catalog-grid__item__label">
                        <a href="single.html">
                            <div class="catalog-grid__item__label__content">
                                <h2 class="catalog-grid__item__label__content__prod">
                                    ¿Cómo se hace la esquila de la alapaca?
                                </h2>
                                <p class="catalog-grid__item__label__content__material">
                                    3 de mayo del 2020
                                </p>
                                <svg class="catalog-grid__item__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"></svg>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="catalog-grid__item">
                    <div class="catalog-grid__item__img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006.jpg);">
                        <a href="single.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006.jpg" alt="" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006@2x.jpg"></a>
                    </div>
                    <div class="catalog-grid__item__label">
                        <a href="single.html">
                            <div class="catalog-grid__item__label__content">
                                <h2 class="catalog-grid__item__label__content__prod">
                                    ¿Cómo se hace la esquila de la alapaca?
                                </h2>
                                <p class="catalog-grid__item__label__content__material">
                                    3 de mayo del 2020
                                </p>
                                <svg class="catalog-grid__item__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"></svg>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="catalog-grid__item">
                    <div class="catalog-grid__item__img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006.jpg);">
                        <a href="single.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006.jpg" alt="" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/responsibility_img_006@2x.jpg"></a>
                    </div>
                    <div class="catalog-grid__item__label">
                        <a href="single.html">
                            <div class="catalog-grid__item__label__content">
                                <h2 class="catalog-grid__item__label__content__prod">
                                    ¿Cómo se hace la esquila de la alapaca?
                                </h2>
                                <p class="catalog-grid__item__label__content__material">
                                    3 de mayo del 2020
                                </p>
                                <svg class="catalog-grid__item__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"></svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="block-products">
            <div class="block-products__bg"></div>
            <div class="block-products__content">
                <h1 class="block-products__content__ttl">Featured Products</h1>
                <a href="<?php echo get_home_url() . '/products/';?>"><h2 class="block-products__content__btn">View All</h2></a>
            </div>
            <div class="block-products__slider">
                <div class="product-slider">
                    <div class="product-slider__carousel">
                        <div class="swiper-wrapper">
                            <div class="product-slider__carousel__item swiper-slide"> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/W-77.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/W-77@2x.jpg" alt="" style="object-position: 0 0;"></a></div>
                            <div class="product-slider__carousel__item swiper-slide"> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/W-89.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/W-89@2x.jpg" alt="" style="object-position: 50% 50%;"></a></div>
                            <div class="product-slider__carousel__item swiper-slide"> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/W-77.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/W-77@2x.jpg" alt="" style="object-position: 0 0;"></a></div>
                            <div class="product-slider__carousel__item swiper-slide"> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/W-89.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/W-89@2x.jpg" alt="" style="object-position: 50% 50%;"></a></div>
                            <div class="product-slider__carousel__item swiper-slide"> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/W-77.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/W-77@2x.jpg" alt="" style="object-position: 0 0;"></a></div>
                            <div class="product-slider__carousel__item swiper-slide"> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/W-89.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/W-89@2x.jpg" alt="" style="object-position: 50% 50%;"></a></div>
                        </div>
                    </div>
                    <div class="product-slider__label">
                        <div class="swiper-wrapper">
                            <div class="product-slider__label__content swiper-slide">
                                <p class="product-slider__label__content__prod">FUR HAT</p>
                                <h2 class="product-slider__label__content__material">Border: 100% alpaca huacaya fur</h2>
                                <svg class="product-slider__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"/></svg>
                            </div>
                            <div class="product-slider__label__content swiper-slide">
                                <p class="product-slider__label__content__prod">FUR HAT</p>
                                <h2 class="product-slider__label__content__material">Border: 100% alpaca huacaya fur</h2>
                                <svg class="product-slider__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"/></svg>
                            </div>
                            <div class="product-slider__label__content swiper-slide">
                                <p class="product-slider__label__content__prod">FUR HAT</p>
                                <h2 class="product-slider__label__content__material">Border: 100% alpaca huacaya fur</h2>
                                <svg class="product-slider__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"/></svg>
                            </div>
                            <div class="product-slider__label__content swiper-slide">
                                <p class="product-slider__label__content__prod">FUR HAT</p>
                                <h2 class="product-slider__label__content__material">Border: 100% alpaca huacaya fur</h2>
                                <svg class="product-slider__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"/></svg>
                            </div>
                            <div class="product-slider__label__content swiper-slide">
                                <p class="product-slider__label__content__prod">FUR HAT</p>
                                <h2 class="product-slider__label__content__material">Border: 100% alpaca huacaya fur</h2>
                                <svg class="product-slider__label__content__arrow" xmlns="http://www.w3.org/2000/svg" width="25.207" height="20.414" viewBox="0 0 25.207 20.414"><defs></defs><path class="a" d="M15,0V6H0v6H15v6l9-9.09Z" transform="translate(0.5 1.199)"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.body.classList.add('blog');
    </script>

<?php
endif;
get_footer();
?>