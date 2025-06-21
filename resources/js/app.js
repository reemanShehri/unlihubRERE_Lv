import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('DOMContentLoaded', function() {
    AOS.init({
        duration: 800,
        once: true,
        offset: 120
    });

    // هذه الدالة ستطبق التأثير على جميع العناصر تلقائيًا
    function autoAnimateSections() {
        const sections = document.querySelectorAll('section, .animate-auto');

        sections.forEach((section, index) => {
            section.setAttribute('data-aos', 'fade-up');
            section.setAttribute('data-aos-delay', index * 100);
        });

        AOS.refresh();
    }

    autoAnimateSections();
});
