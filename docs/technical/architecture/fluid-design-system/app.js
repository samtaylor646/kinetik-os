// --- Custom Cursor Logic ---
const cursor = document.querySelector('.cursor');
const glassPreview = document.querySelector('#glassmorphism .ds-preview');

if(cursor && glassPreview) {
    glassPreview.addEventListener('mousemove', (e) => {
        const rect = glassPreview.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        cursor.style.transform = `translate3d(${x - 50}px, ${y - 22}px, 0)`;
        cursor.style.position = 'absolute';
        cursor.style.left = '0';
        cursor.style.top = '0';
    });
    
    glassPreview.addEventListener('mouseenter', () => {
        cursor.style.opacity = '1';
    });
    
    glassPreview.addEventListener('mouseleave', () => {
        cursor.style.opacity = '0';
        setTimeout(() => {
            cursor.style.transform = `translate3d(calc(50% - 50px), calc(50% - 22px), 0)`;
            cursor.style.opacity = '1';
        }, 300);
    });
}

// --- Accordion Logic ---
document.querySelectorAll('.accordion-header').forEach(button => {
    button.addEventListener('click', () => {
        const item = button.parentElement;
        item.classList.toggle('is-active');
    });
});

// --- Sidebar Navigation Scroll Spy ---
const sections = document.querySelectorAll('.ds-section');
const navLinks = document.querySelectorAll('.ds-sidebar nav ul li a');
const mainContent = document.querySelector('.ds-content');

if (mainContent) {
    mainContent.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (mainContent.scrollTop >= (sectionTop - 150)) {
                current = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(li => {
            li.classList.remove('active');
            if (li.getAttribute('href').includes(current) && current !== '') {
                li.classList.add('active');
            }
        });
    });
}