// VARIABLES

// elements for mobile menu
const menuButton = document.querySelector("#menu-button");
const menu = document.querySelector("#menu");
const classOpen = "open";

// interactive elements for scroll to
const toStartElements = document.querySelectorAll(".to-start");
const toEventElement = document.querySelector("#to-event");
const toAboutElement = document.querySelector("#to-about");
const toFaqsElement = document.querySelector("#to-faqs");
const toContactElements = document.querySelectorAll(".to-contact");

// elements to be scrolled to
const eventElement = document.querySelector("#proximos-eventos");
const aboutElement = document.querySelector("#quienes-somos");
const faqsElement = document.querySelector("#preguntas-frecuentes");
const contactElement = document.querySelector("#contacto");

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
    document.body.classList.remove(lockBodyScroll);
  } else {
    menuButton.classList.add(classOpen);
    menu.classList.add(classOpen);
    document.body.classList.add(lockBodyScroll);
  }
};
function closeMenu() {
  menuButton.classList.remove(classOpen);
  menu.classList.remove(classOpen);
};

// Smooth scroll to
function scrollToElement(el, e) {
  e.preventDefault();
  el.scrollIntoView({ behavior: 'smooth' });
};

// EVENTS

// event for open / close menu
menuButton.addEventListener("click", toggleMenu);
menu.addEventListener("click", closeMenu);

// Scroll events
toStartElements.forEach((i) => {
  i.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
});
toEventElement.addEventListener("click", (e) => {
  scrollToElement(eventElement, e);
});
toAboutElement.addEventListener("click", (e) => {
  scrollToElement(aboutElement, e);
});
toFaqsElement.addEventListener("click", (e) => {
  scrollToElement(faqsElement, e);
});
toContactElements.forEach((i) => {
  i.addEventListener("click",(e) => {
    scrollToElement(contactElement, e);
  });
});

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
