/* ---- Category Hover Image change ---- */

const changeImageOnHoverCallback = () => {
  if (document.querySelectorAll(".block-categories").length > 0) {
    var categoryLinkList = document.querySelectorAll(
      ".block-categories__card__list a"
    );
    var categoryImgContainer = document.querySelector(
      ".block-categories__img__change"
    );
    //Callback Load images in cache
    addLoadEvent(preloadImages(categoryLinkList));
    //Callback Load Image Hover
    hoverImg(categoryLinkList, categoryImgContainer);
  }
  if (document.body.classList.contains("products")) {
    var headerLinkList = document.querySelectorAll(".header-card__list a");
    var headerImgContainer = document.querySelector(
      ".header-hero__img__change"
    );
    //Callback Load images in cache
    addLoadEvent(preloadImages(headerLinkList));
    //Callback Load Image Hover
    hoverImg(headerLinkList, headerImgContainer);
  }
}

window.addEventListener("DOMContentLoaded", changeImageOnHoverCallback);

//Load images in cache
function preloadImages(linkList) {
  if (!preloadImages.cache) {
    preloadImages.cache = [];
  }
  var img;
  for (var i = 0; i < linkList.length; i++) {
    var linkSrc = linkList[i].getAttribute("data-src");
    var linkSrcset = linkList[i].getAttribute("data-srcset");
    img = new Image();
    img.src = linkSrc;
    img.srcset = linkSrcset;
    preloadImages.cache.push(img);
  }
}

//Delaying preloading until after the page loads
function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != "function") {
    window.onload = func;
  } else {
    window.onload = function () {
      if (oldonload) {
        oldonload();
      }
      func();
    };
  }
}

//Load image hover
function hoverImg(linkList, imgContainer) {
  for (var i = 0; i < linkList.length; i++) {
    linkList[i].addEventListener("mouseover", function () {
      var linkSrc = this.getAttribute("data-src");
      var linkSrcset = this.getAttribute("data-srcset");
      imgContainer.src = linkSrc;
      imgContainer.srcset = linkSrcset;
      imgContainer.classList.add("opacity-100");
      imgContainer.classList.remove("opacity-0");
    });
    linkList[i].addEventListener("mouseout", function () {
      imgContainer.classList.add("opacity-0");
      imgContainer.classList.remove("opacity-100");
    });
  }
}
