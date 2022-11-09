// import Swiper, { Lazy } from "swiper";

const headerSwiperCallback = () => {
  if (document.querySelectorAll(".header-slider__carousel").length > 0) {
    // Header Pics Slider Config
    const headerSwiper = new Swiper(".header-slider__carousel", {
      // Modules
      // modules: [Lazy],
      // Optional parameters
      init: false,
      slidesPerView: "auto",
      spaceBetween: false,
      centeredSlides: false,
      loop: true,
      loopedSlides: 4,
      speed: 500,
      updateOnWindowResize: true,
      autoplay: {
        delay: 2500,
      },
      // Disable preloading of all images
      preloadImages: false,
      // Enable lazy loading
      lazy: {
        loadPrevNext: true,
        loadOnTransitionStart: true,
      },
      // Disable load again images loaded
      updateOnImagesReady: false,
    });

    //Header Label Slider Config
    const headerLabelSwiper = new Swiper(".header-slider__label", {
      // Optional parameters
      slidesPerView: "auto",
      spaceBetween: false,
      centeredSlides: false,
      loop: true,
      loopedSlides: 4,
      speed: 500,
      allowTouchMove: false,
    });

    setTimeout(() => {
      headerSwiper.init();
    }, 500);

    headerSwiper.on("init", () => {
      document.querySelector(".header-slider__carousel").style.opacity = 1;
      // chage the opacity to get visible
      const headerSlide = document.querySelectorAll(
        ".header-slider__carousel .swiper-slide"
      );
      //function next prev
      slideNextPrev(headerSlide, headerSwiper, headerLabelSwiper);
    });
  }
};

const productSwiperCallback = () => {
  if (document.querySelectorAll(".product-slider__carousel").length > 0) {
    // Product Pics Slider Config
    const nrSlides = document.querySelectorAll(
      ".product-slider__carousel__item"
    ).length;

    const product_sliders = document.querySelectorAll(
      ".product-slider__carousel"
    );

    let options = {
      slidesPerView: "auto",
      loop: false,
      lazy: true,
      centeredSlides: true,
    };

    if (nrSlides > 1) {
      options = {
        // Optional parameters
        init: false,
        slidesPerView: "auto",
        spaceBetween: false,
        centeredSlides: true,
        loop: true,
        loopedSlides: 4,
        speed: 500,
        updateOnWindowResize: true,
        // Disable preloading of all images
        preloadImages: false,
        // Enable lazy loading
        lazy: {
          loadPrevNext: true,
          loadOnTransitionStart: true,
        },
        // Disable load again images loaded
        updateOnImagesReady: false,
      };
    }

    const productSwiper = new Swiper(".product-slider__carousel", options);

    // Product Label Slider Config
    const productLabelSwiper = new Swiper(".product-slider__label", {
      // Optional parameters
      slidesPerView: "auto",
      spaceBetween: false,
      centeredSlides: false,
      loop: true,
      loopedSlides: 4,
      speed: 500,
      allowTouchMove: false,
    });

    //function next prev
    setTimeout(() => {
      productSwiper.init();
    }, 500);

    productSwiper.on("init", () => {
      for (let index = 0; index < product_sliders.length; index++) {
        const element = product_sliders[index];
        element.style.opacity = 1;
      }
      const productSlides = document.querySelectorAll(
        ".product-slider__carousel .swiper-slide"
      );
      slideNextPrev(productSlides, productSwiper, productLabelSwiper);
    });
  }
};

const itemSwiperCallback = () => {
  if (document.querySelectorAll(".item-slider__carousel").length > 0) {
    // Item Pics Slider Config
    const itemSwiper = new Swiper(".item-slider__carousel", {
      // Optional parameters
      slidesPerView: 1,
      spaceBetween: false,
      centeredSlides: true,
      speed: 500,
      updateOnWindowResize: true,
      loop: true,
      loopedSlides: 4,
      // Disable preloading of all images
      preloadImages: false,
      // Enable lazy loading
      lazy: true,
      // Disable load again images loaded
      updateOnImagesReady: false,
    });

    const thumbSwiper = new Swiper(".thumb-slider__carousel", {
      // Optional parameters
      slidesPerView: 4,
      spaceBetween: 16,
      centeredSlides: true,
      speed: 500,
      updateOnWindowResize: true,
      slideToClickedSlide: true,
      navigation: {
        nextEl: ".thumb-slider-next",
        prevEl: ".thumb-slider-prev",
      },
      loop: true,
      loopedSlides: 4,
      touchRatio: 0.2,
    });

    //function next prev
    itemSwiper.controller.control = thumbSwiper;
    thumbSwiper.controller.control = itemSwiper;
  }
};

// Next Slide Function Header Slider

//function next prev
function slideNextPrev(slides, picSwiper, labelSwiper) {
  for (let i = 0; i < slides.length; i++) {
    const slide = slides[i];
    slide.addEventListener("click", function (event) {
      if (slide.classList.contains("swiper-slide-next")) {
        event.preventDefault();
        picSwiper.slideNext(500);
      } else if (slide.classList.contains("swiper-slide-prev")) {
        event.preventDefault();
        picSwiper.slidePrev(500);
      }
    });
  }
  // link between img and label slides
  if (typeof labelSwiper !== "undefined") {
    picSwiper.controller.control = labelSwiper;
  }
}

window.addEventListener("load", headerSwiperCallback);
window.addEventListener("load", productSwiperCallback);
window.addEventListener("load", itemSwiperCallback);
