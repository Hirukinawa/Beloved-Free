const divs = document.querySelectorAll('.page7--row');

divs.forEach(div => {

    div.addEventListener('mouseover', () => {
        div.classList.add('numberGrow')
    });
    div.addEventListener('mouseleave', () => {
        div.classList.remove('numberGrow')
    });
})