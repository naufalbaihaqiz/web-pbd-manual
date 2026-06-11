<div id="searchOverlay" class="fixed inset-0 z-[110] flex flex-col items-center justify-start search-overlay-bg search-scrollbar overflow-y-auto px-4 py-12 hidden animate-in fade-in duration-300">
    
    <button id="btnCloseSearch" class="absolute top-6 right-6 md:top-10 md:right-10 text-white hover:text-gray-300 transition-colors" data-purpose="close-button">
        <span class="material-symbols-outlined" style="font-size: 32px;">close</span>
    </button>
    
    <div class="w-full max-w-4xl mt-10 md:mt-20 relative z-10">
        
        <div class="relative w-full border-b border-gray-600 pb-2 mb-8">
            <form action="<?= base_url('products') ?>" method="GET" class="flex items-center justify-between w-full">
                <input id="searchInput" name="keyword" autocomplete="off" class="bg-transparent border-none focus:ring-0 outline-none text-white text-3xl md:text-5xl font-light w-full placeholder-gray-500" placeholder="Ketik kata kunci pencarian..." type="text"/>
                <button type="submit" class="text-white ml-4 hover:text-[#a8977b] transition-colors">
                    <span class="material-symbols-outlined" style="font-size: 36px;">search</span>
                </button>
            </form>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8" data-purpose="search-results-grid" id="ajaxSearchResults">
            <p id="searchLoading" class="text-gray-400 hidden col-span-2 text-center py-4">Mencari produk...</p>
        </div>
        
        <div class="mt-12 text-center">
            <button class="text-white font-bold text-lg hover:text-[#a8977b] transition-colors" onclick="document.querySelector('#searchOverlay form').submit()">
                Tampilkan Lebih Banyak
            </button>
        </div>
        
    </div>
</div>