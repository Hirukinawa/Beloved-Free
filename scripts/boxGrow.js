const boxes = document.querySelectorAll('.caixa');

boxes.forEach(box => {
    box.addEventListener('mouseover', () => {
        box.classList.add('boxGrow')
    });

    box.addEventListener('mouseleave', () => {
        box.classList.remove("boxGrow")
    })
})