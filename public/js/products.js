// 1. Animasi efek bayangan (shadow) pada Header saat di-scroll
window.addEventListener('scroll', () => {
    const header = document.querySelector('header');
    if (window.scrollY > 20) {
        header.classList.add('shadow-md');
    } else {
        header.classList.remove('shadow-md');
    }
});

// 2. Simulasi interaksi tombol filter kategori
const filterButtons = document.querySelectorAll('button[class*="rounded-full"]');
filterButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        filterButtons.forEach(b => {
            b.classList.remove('bg-primary', 'text-on-primary');
            b.classList.add('bg-surface-container-high', 'text-secondary');
        });
        btn.classList.add('bg-primary', 'text-on-primary');
        btn.classList.remove('bg-surface-container-high', 'text-secondary');
    });
});