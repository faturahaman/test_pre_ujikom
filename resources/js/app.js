import './bootstrap';
document.addEventListener('DOMContentLoaded', () => {
    const menuOpenButton = document.getElementById('menu-toggle-open');
    const menuCloseButton = document.getElementById('menu-toggle-close');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileLinks = document.querySelectorAll('.mobile-link');

    const openMenu = () => {
        if (mobileMenu) {
            mobileMenu.classList.remove('hidden');
            mobileMenu.classList.add('flex'); 
            document.body.style.overflow = 'hidden'; 
        }
    };

    const closeMenu = () => {
        if (mobileMenu) {
            mobileMenu.classList.add('hidden');
            mobileMenu.classList.remove('flex'); 
            document.body.style.overflow = '';
        }
    };

    if (menuOpenButton) {
        menuOpenButton.addEventListener('click', openMenu);
    }

    if (menuCloseButton) {
        menuCloseButton.addEventListener('click', closeMenu);
    }

    mobileLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });
});