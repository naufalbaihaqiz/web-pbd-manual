// 1. Animasi scroll mengecilkan padding header & efek blur
window.addEventListener('scroll', () => {
    const header = document.querySelector('header');
    if (window.scrollY > 20) {
        header.classList.add('py-2', 'bg-white/90', 'backdrop-blur-md');
        header.classList.remove('py-4', 'bg-surface-white');
    } else {
        header.classList.remove('py-2', 'bg-white/90', 'backdrop-blur-md');
        header.classList.add('py-4', 'bg-surface-white');
    }
});

// 2. Mikro-interaksi animasi pengiriman formulir kontak
const contactForm = document.querySelector('form');
if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const btn = e.target.querySelector('button[type="submit"]');
        const originalText = btn.innerHTML;
        
        // Mengubah tombol menjadi state loading
        btn.innerHTML = '<span class="material-symbols-outlined animate-spin">sync</span> Mengirim...';
        btn.disabled = true;
        
        setTimeout(() => {
            // Mengubah tombol menjadi state sukses
            btn.innerHTML = '<span class="material-symbols-outlined text-green-400">check_circle</span> Terkirim!';
            btn.classList.add('bg-green-700');
            
            setTimeout(() => {
                // Mengembalikan tombol ke posisi semula
                btn.innerHTML = originalText;
                btn.disabled = false;
                btn.classList.remove('bg-green-700');
                e.target.reset();
            }, 2000);
        }, 1500);
    });
}