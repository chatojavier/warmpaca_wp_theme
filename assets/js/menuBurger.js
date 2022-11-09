/* ---- Menu Burger Button ---- */

const menuBurgerCallback = () => {
  var menuBtn = document.querySelector(".menu-btn");
  var menuLinkContact = document.querySelector(".menu-nav__item .contact");
  var menuBtnBurger = document.querySelector(".menu-btn__burger");
  var nav = document.querySelector(".nav");
  var menuNavArr = document.querySelectorAll(".menu-nav");
  var menuNavItem = document.querySelectorAll(".menu-nav__item");

  var showMenu = false;

  menuBtn.addEventListener("click", function () {
    if (showMenu === false) {
      menuBtnBurger.classList.add("open");
      nav.classList.add("open");
      menuNavArr.forEach((menuNav) => {
        menuNav.classList.add("open");
      });
      for (var i = 0; i < menuNavItem.length; i++) {
        menuNavItem[i].classList.add("open");
      }
      document.body.setAttribute("style", "overflow: hidden");
      showMenu = true;
    } else {
      menuBtnBurger.classList.remove("open");
      nav.classList.remove("open");
      menuNavArr.forEach((menuNav) => {
        menuNav.classList.remove("open");
      });
      for (var i = 0; i < menuNavItem.length; i++) {
        menuNavItem[i].classList.remove("open");
      }
      document.body.removeAttribute("style");
      showMenu = false;
    }
  });

  menuLinkContact.addEventListener("click", function () {
    menuBtnBurger.classList.remove("open");
    nav.classList.remove("open");
    menuNav.classList.remove("open");
    for (var i = 0; i < menuNavItem.length; i++) {
      menuNavItem[i].classList.remove("open");
    }
    document.body.removeAttribute("style");
    showMenu = false;
  });
};

window.addEventListener("DOMContentLoaded", menuBurgerCallback);
