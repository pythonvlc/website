// VARIABLES

// elements for mobile menu
const menuButton = document.querySelector("#menu-button");
const menu = document.querySelector("#menu");
const classOpen = "open";

// constants and variables for header changes on scroll
const header = document.querySelector("#header");
const hero = document.querySelector("#inicio");
let heroHeight = hero.scrollHeight - header.scrollHeight;
let oldScrollValue = 0;
let newScrollValue = window.pageYOffset;
const classMain = "main";
const classHidden = "hidden";
const lockBodyScroll = "body-scroll-lock";

// FUNCTIONS

// Open / close mobile menu
function toggleMenu() {
  if (menuButton.classList.contains(classOpen)) {
    closeMenu();
  } else {
    menuButton.classList.add(classOpen);
    menu.classList.add(classOpen);
    document.body.classList.add(lockBodyScroll);
  }
};
function closeMenu() {
  menuButton.classList.remove(classOpen);
  menu.classList.remove(classOpen);
  document.body.classList.remove(lockBodyScroll);
};

// EVENTS

// event for open / close menu
menuButton.addEventListener("click", toggleMenu);
menu.addEventListener("click", closeMenu);

window.onscroll = () => {
  heroHeight = hero.scrollHeight - header.offsetHeight;

  // check position to add or remove the style to header to be visible on main content
  if (window.scrollY >= heroHeight) {
    header.classList.add(classMain);
  } else {
    header.classList.remove(classMain);
  }

  // check position to hide or show header
  if (window.scrollY >= header.offsetHeight) {
    newScrollValue = window.pageYOffset;
    if (oldScrollValue < newScrollValue) {
      header.classList.add(classHidden);
    } else {
      header.classList.remove(classHidden);
    }
    oldScrollValue = newScrollValue;
  }
};

window.onload = () => {
  header.classList.remove(classHidden);
};
