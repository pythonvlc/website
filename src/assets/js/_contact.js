const contactTitleContainer = document.querySelector("#contact-title-container");
const contactTitle = document.querySelector("#contact-title");

let intervalId;

function startAnimation() {
  addClonedElements();

  const clones = numberToClone();
  // create array with positions of elements
  let translatePosition = new Array(clones + 1).fill(0);

  intervalId = setInterval(createAnimation, 10);

  function createAnimation() {
    contactTitleContainer.childNodes.forEach((el, i) => {
      // update element position
      el.style.transform = `translateX(${translatePosition[i]}px)`;
      translatePosition[i] = translatePosition[i] - 1;

      if (Math.round(el.getBoundingClientRect().right) === 0) {
        // safe new position for moved element
        translatePosition[i] = Math.round(contactTitleContainer.childNodes[clones].getBoundingClientRect().right);

        // move first element to the end
        const element = el;
        contactTitleContainer.removeChild(element);
        contactTitleContainer.appendChild(element);
      }
    });
  }
};

function stopInterval() {
  clearInterval(intervalId);
  intervalId = null;
}

function addClonedElements() {
  // create range of elelemnts to be cloned
  const cloneRange = range(1, numberToClone());

  // update container content
  contactTitleContainer.replaceChildren(contactTitle);

  // clone elelemnts
  cloneRange.forEach((i) => {
    const clone = contactTitle.cloneNode(true);
    // add unique id for each cloned element
    clone.id = `contact-title-clone-${i}`;
    contactTitleContainer.appendChild(clone);
  });
};

function numberToClone() {
  // calculate number of cloned elelemnts
  return Math.ceil(contactTitleContainer.offsetWidth / contactTitle.offsetWidth);
};

function range(start, end) {
  // create range
  return (new Array(end - start + 1))
    .fill(undefined)
    .map((_, i) => i + start
  );
};

function debounce(func){
  let timer;
  return function(event){
      if(timer) {
        clearTimeout(timer);
        stopInterval();
      }
      timer = setTimeout(func, 200, event);
  };
}

window.addEventListener("resize", debounce( startAnimation ));


const intersectionObserverOptions = { threshold: 0 }
const intersectionObserverCallback = (entries) => {
  for (const entry of entries) {
    entry.isIntersecting && !intervalId
      ? startAnimation()
      : stopInterval();
  }
};

const intersectionObserver = new IntersectionObserver(intersectionObserverCallback, intersectionObserverOptions);
intersectionObserver.observe(contactTitleContainer);
