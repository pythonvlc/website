const conductContent = document.querySelector("#conduct-content");
const conductButton = document.querySelector("#conduct-read-more");

function toggleReadMore() {
    conductContent.style.height = `${conductContent.scrollHeight}px`;
    conductButton.style.opacity = 0;
    setTimeout(() => {
        conductContent.removeAttribute("style");
        conductButton.style.display = "none";
    }, 550)
};

conductButton.addEventListener("click", toggleReadMore)