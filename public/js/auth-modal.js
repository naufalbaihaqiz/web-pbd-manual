document.addEventListener('DOMContentLoaded', () => {
    const modalOverlay = document.getElementById('modalOverlay');
    const btnCart = document.getElementById('btnCart');
    const btnProfile = document.getElementById('btnProfile');
    const btnCloseModal = document.getElementById('btnCloseModal');

    // Fungsi buka modal
    const openModal = () => {
        modalOverlay.classList.remove('hidden');
        modalOverlay.classList.add('flex');
    };

    // Fungsi tutup modal
    const closeModal = () => {
        modalOverlay.classList.add('hidden');
        modalOverlay.classList.remove('flex');
    };

    // Deteksi klik pada ikon Navbar
    if(btnCart) btnCart.addEventListener('click', openModal);
    if(btnProfile) btnProfile.addEventListener('click', openModal);
    if(btnCloseModal) btnCloseModal.addEventListener('click', closeModal);

    // 🌟 TAMBAHAN BARU: Deteksi SEMUA tombol yang memiliki class 'trigger-login'
    const triggerButtons = document.querySelectorAll('.trigger-login');
    triggerButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault(); // Mencegah halaman reload jika memakai tag <a>
            openModal();
        });
    });

    // Tutup modal jika klik area luar
    if(modalOverlay) {
        modalOverlay.addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });
    }
});

// Fungsi Ganti Tab Login / Sign Up (Tetap Sama)
function switchTab(tab) {
    const loginTab = document.getElementById('loginTab');
    const signupTab = document.getElementById('signupTab');
    const loginView = document.getElementById('loginView');
    const signupView = document.getElementById('signupView');

    if (tab === 'login') {
        loginTab.classList.add('border-primary', 'text-on-surface');
        loginTab.classList.remove('border-transparent', 'text-secondary');
        signupTab.classList.add('border-transparent', 'text-secondary');
        signupTab.classList.remove('border-primary', 'text-on-surface');
        
        loginView.classList.remove('hidden');
        signupView.classList.add('hidden');
    } else {
        signupTab.classList.add('border-primary', 'text-on-surface');
        signupTab.classList.remove('border-transparent', 'text-secondary');
        loginTab.classList.add('border-transparent', 'text-secondary');
        loginTab.classList.remove('border-primary', 'text-on-surface');
        
        signupView.classList.remove('hidden');
        loginView.classList.add('hidden');
    }
}