const scrollMassagem = document.querySelector('#scrollMassagem');

scrollMassagem.addEventListener('mouseover', () => {
    scrollMassagem.style.animationPlayState = 'paused';
});

scrollMassagem.addEventListener('mouseleave', () => {
    scrollMassagem.style.animationPlayState = 'running';
});
