const divs = document.querySelectorAll('.page7--row');
const boxes = document.querySelectorAll('.caixa');

function isFullInViewport(element) {
    const rect = element.getBoundingClientRect();
    const viewportHeight = window.innerHeight || document.documentElement.clientHeight;

    return rect.top >= 0 && rect.bottom <= viewportHeight;
}

function handleScroll() {

    if (window.innerWidth < 800) {

        divs.forEach(div => {
            if (isFullInViewport(div)) {
                div.classList.add('numberGrow');
            } else {
                div.classList.remove('numberGrow')
            }
        })

        boxes.forEach(box => {
            if (isFullInViewport(box)) {
                box.classList.add('boxGrow')
            } else {
                box.classList.remove('boxGrow')
            }
        })

    }
}

window.addEventListener('scroll', handleScroll);
window.addEventListener('resize', handleScroll);
handleScroll();