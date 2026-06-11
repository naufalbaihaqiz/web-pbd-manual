document.addEventListener('DOMContentLoaded', () => {
    const searchOverlay = document.getElementById('searchOverlay');
    const triggerSearchBtns = document.querySelectorAll('.trigger-search');
    const btnCloseSearch = document.getElementById('btnCloseSearch');
    const searchInput = document.getElementById('searchInput');
    const resultsGrid = document.getElementById('ajaxSearchResults');
    const loadingIndicator = document.getElementById('searchLoading');

    // Fungsi buka pencarian
    const openSearch = () => {
        searchOverlay.classList.remove('hidden');
        searchOverlay.classList.add('flex');
        // Otomatis fokus ke kolom ketik setelah animasi selesai
        setTimeout(() => searchInput.focus(), 100);
    };

    // Fungsi tutup pencarian
    const closeSearch = () => {
        searchOverlay.classList.add('hidden');
        searchOverlay.classList.remove('flex');
    };

    // Deteksi klik pada ikon pencarian (bisa lebih dari 1 jika ada menu mobile)
    triggerSearchBtns.forEach(btn => {
        btn.addEventListener('click', openSearch);
    });

    // Deteksi tombol close
    if(btnCloseSearch) btnCloseSearch.addEventListener('click', closeSearch);

    // Tutup jika mengeklik area gelap di luar konten
    if(searchOverlay) {
        searchOverlay.addEventListener('click', function(e) {
            if (e.target === this) closeSearch();
        });
    }

    // Tutup jika menekan tombol Escape di keyboard
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !searchOverlay.classList.contains('hidden')) {
            closeSearch();
        }
    });

    // 🌟 Logika Live Search (AJAX)
    let searchTimeout = null;
    
    if(searchInput && resultsGrid) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const keyword = this.value.trim();
            
            // Hentikan pencarian jika kurang dari 2 huruf
            if(keyword.length < 2) {
                resultsGrid.innerHTML = '';
                if(loadingIndicator) {
                    resultsGrid.appendChild(loadingIndicator);
                    loadingIndicator.classList.add('hidden');
                }
                return;
            }

            // Tampilkan tulisan loading, hapus hasil sebelumnya
            resultsGrid.innerHTML = '';
            if(loadingIndicator) {
                loadingIndicator.classList.remove('hidden');
                resultsGrid.appendChild(loadingIndicator);
            }

            // Jeda 500ms setelah user berhenti mengetik agar tidak memberatkan server
            searchTimeout = setTimeout(() => {
                fetch(`/products/searchAjax?keyword=${encodeURIComponent(keyword)}`)
                .then(res => res.json())
                .then(data => {
                    // Sembunyikan tulisan loading
                    if(loadingIndicator) loadingIndicator.classList.add('hidden');
                    
                    resultsGrid.innerHTML = '';
                    if(loadingIndicator) resultsGrid.appendChild(loadingIndicator);
                    
                    // Jika data tidak ditemukan
                    if(data.length === 0) {
                        resultsGrid.insertAdjacentHTML('beforeend', '<p class="text-gray-400 col-span-2 text-center py-4">Produk tidak ditemukan.</p>');
                        return;
                    }
                    
                    // Jika data ditemukan, buat elemen HTML-nya
                    let html = '';
                    data.forEach(item => {
                        html += `
                        <a href="/products/detail/${encodeURIComponent(item.nama_produk)}" class="flex items-start space-x-4 group cursor-pointer transition-transform hover:translate-x-2 duration-300">
                            <div class="flex-shrink-0 w-24 h-24 overflow-hidden rounded bg-gray-800">
                                <img alt="${item.nama_produk}" class="w-full h-full object-cover" src="/images/${item.gambar_produk}"/>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-white text-sm md:text-base font-semibold leading-snug group-hover:text-[#a8977b] transition-colors">
                                    ${item.nama_produk}
                                </h3>
                                <p class="text-[#a8977b] text-sm mt-2 font-bold">${item.harga_jual}</p>
                            </div>
                        </a>
                        `;
                    });
                    
                    // Suntikkan HTML ke dalam grid
                    resultsGrid.insertAdjacentHTML('beforeend', html);
                })
                .catch(error => {
                    console.error("Terjadi error saat mengambil data pencarian:", error);
                });
            }, 500); // 500ms delay
        });
    }
});