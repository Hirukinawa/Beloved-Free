function mouseOver() {
    document.getElementById('whatsLogo').src = '../images/whatsapp-green.png';
    document.getElementById('fale').style.color = 'rgb(37, 211, 102)';
}

function mouseOut() {
    document.getElementById('whatsLogo').src = '../images/whatsapp-gold3.png';
    document.getElementById('fale').style.color = '#BC9722';
}

window.addEventListener('resize', function() {
    var menuList = document.querySelector('.menu-list');
    var isMobile = window.matchMedia('(max-width: 800px)').matches;

    if (!isMobile && window.getComputedStyle(menuList).getPropertyValue('display') === 'flex') {
        menuList.style.display = 'none';
    }
});

function toggleMenu() {
    var menuList = document.querySelector('.menu-list');
    var isMobile = window.matchMedia('(max-width: 800px)').matches;

    if (isMobile && window.getComputedStyle(menuList).getPropertyValue('display') === 'none') {
        menuList.style.display = 'flex';
    } else {
        menuList.style.display = 'none';
    }

    if (!isMobile) {
        menuList.style.display = 'none';
    }
}