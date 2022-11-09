/* ---- Shrink Navbar ---- */

// When the user scrolls down 100px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 100 ||
    document.documentElement.scrollTop > 100
  ) {
    document.querySelector(".warm-logo").style.transform = "scale(0.7)";
    document.querySelector(".fixed-bar").style.padding = "0.5rem 5vw";
    document.querySelector(".fixed-bar").style.boxShadow =
      "0px 0px 4px 0px rgba(0,0,0,0.2)";
    document.querySelector(".menu-btn").style.top = "1.75rem";
  } else {
    document.querySelector(".warm-logo").removeAttribute("style");
    document.querySelector(".fixed-bar").removeAttribute("style");
    document.querySelector(".menu-btn").removeAttribute("style");
  }
  if (
    document.querySelectorAll(".item").length < 1 &&
    window.innerHeight < window.innerWidth
  ) {
    if (
      document.body.scrollTop > window.innerHeight - 200 ||
      document.documentElement.scrollTop > window.innerHeight - 200
    ) {
      document.querySelector("header.header").style.display = "block";
      document.querySelector("header.header").style.position = "absolute";
    } else {
      document.querySelector("header.header").removeAttribute("style");
    }
    if (
      document.body.scrollTop > window.innerHeight ||
      document.documentElement.scrollTop > window.innerHeight
    ) {
      document.querySelector("header.header").style.opacity = "1";
    } else {
      document.querySelector("header.header").style.opacity = "0";
    }
  }
}
