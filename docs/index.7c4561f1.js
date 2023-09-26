// VARIABLES
// elements for mobile menu
let e,t;const o=document.querySelector("#menu-button"),c=document.querySelector("#menu"),n="open",r=document.querySelectorAll(".to-start"),l=document.querySelector("#to-event"),i=document.querySelector("#to-about"),s=document.querySelector("#to-faqs"),d=document.querySelector("#to-code-of-conduct"),a=document.querySelectorAll(".to-contact"),u=document.querySelector("#proximos-eventos"),m=document.querySelector("#quienes-somos"),f=document.querySelector("#preguntas-frecuentes"),h=document.querySelector("#codigo-de-conducta"),v=document.querySelector("#contacto"),y=document.querySelector("#header"),L=document.querySelector("#inicio");let q=L.scrollHeight-y.scrollHeight,w=0,S=window.pageYOffset;const g="main",p="hidden",E="body-scroll-lock";function b(){o.classList.remove(n),c.classList.remove(n),document.body.classList.remove(E)}// Smooth scroll to
function k(e,t){t.preventDefault(),e.scrollIntoView({behavior:"smooth"})}// EVENTS
// event for open / close menu
o.addEventListener("click",// FUNCTIONS
// Open / close mobile menu
function(){o.classList.contains(n)?(b(),document.body.classList.remove(E)):(o.classList.add(n),c.classList.add(n),document.body.classList.add(E))}),c.addEventListener("click",b),// Scroll events
r.forEach(e=>{e.addEventListener("click",e=>{e.preventDefault(),window.scrollTo({top:0,behavior:"smooth"})})}),l.addEventListener("click",e=>{k(u,e)}),i.addEventListener("click",e=>{k(m,e)}),s.addEventListener("click",e=>{k(f,e)}),d.addEventListener("click",e=>{k(h,e)}),a.forEach(e=>{e.addEventListener("click",e=>{k(v,e)})}),window.onscroll=()=>{q=L.scrollHeight-y.offsetHeight,window.scrollY>=q?y.classList.add(g):y.classList.remove(g),window.scrollY>=y.offsetHeight&&(S=window.pageYOffset,w<S?y.classList.add(p):y.classList.remove(p),w=S)},window.onload=()=>{y.classList.remove(p)};const C=document.querySelector("#contact-title-container"),H=document.querySelector("#contact-title");function I(){!function(){// create range of elelemnts to be cloned
let e=Array(Y()-1+1).fill(void 0).map((e,t)=>t+1);// update container content
C.replaceChildren(H),// clone elelemnts
e.forEach(e=>{let t=H.cloneNode(!0);// add unique id for each cloned element
t.id=`contact-title-clone-${e}`,C.appendChild(t)})}();let t=Y(),o=Array(t+1).fill(0);e=setInterval(function(){C.childNodes.forEach((e,c)=>{// update element position
e.style.transform=`translateX(${o[c]}px)`,o[c]=o[c]-1,0===Math.round(e.getBoundingClientRect().right)&&(// safe new position for moved element
o[c]=Math.round(C.childNodes[t].getBoundingClientRect().right),C.removeChild(e),C.appendChild(e))})},10)}function A(){clearInterval(e),e=null}function Y(){// calculate number of cloned elelemnts
return Math.ceil(C.offsetWidth/H.offsetWidth)}window.addEventListener("resize",function(e){t&&(clearTimeout(t),A()),t=setTimeout(I,200,e)});const M=new IntersectionObserver(t=>{for(let o of t)o.isIntersecting&&!e?I():A()},{threshold:0});M.observe(C);//# sourceMappingURL=index.7c4561f1.js.map

//# sourceMappingURL=index.7c4561f1.js.map
