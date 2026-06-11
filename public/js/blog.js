// Efek parallax sederhana untuk gambar saat halaman di-scroll
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const images = document.querySelectorAll('.group img');
    images.forEach(img => {
        const speed = 0.05;
        img.style.transform = `translateY(${scrolled * speed}px) scale(1.05)`;
    });
});