<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<section class="relative pt-40 pb-32 px-6 md:px-16 bg-black overflow-hidden flex items-center min-h-[600px]">
    <div class="absolute inset-0 z-0 bg-black"></div>
    
    <div class="max-w-[1400px] mx-auto w-full relative z-10 text-white">
        <div class="max-w-4xl border-l-4 border-white pl-8">
            <span class="text-gray-400 font-bold text-[11px] uppercase tracking-[0.3em] mb-4 block" style="font-family: 'Plus Jakarta Sans', sans-serif;">Platform</span>
            <h1 class="text-4xl md:text-5xl lg:text-[54px] font-bold mb-6 leading-[1.1] text-white" style="font-family: 'Merriweather', Georgia, serif;">
                <?= esc($pengaturan->hero_title ?? 'Digital Marketplace Jasa Akademik Profesional No.1 di Indonesia') ?>
            </h1>
            <p class="text-[13px] md:text-[14px] text-gray-400 mb-10 leading-relaxed text-justify max-w-5xl font-light tracking-wide" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                <?= esc($pengaturan->hero_description ?? 'Akademikpro.id adalah marketplace digital jasa akademik profesional di Indonesia...') ?>
            </p>
            <a href="#" class="inline-flex items-center gap-3 bg-white text-black px-8 py-4 rounded-none text-xs font-bold uppercase tracking-widest hover:bg-gray-200 transition-colors shadow-2xl">
                <span class="material-symbols-outlined text-[18px]">chat</span>
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

<section class="relative z-20 px-6 md:px-16 -mt-16 md:-mt-24 mb-16">
    <div class="max-w-[1200px] mx-auto bg-white shadow-2xl grid grid-cols-1 md:grid-cols-3 gap-y-12 gap-x-8 p-10 md:p-16 text-center border border-gray-100">
        <?php 
        $icons = ['military_tech', 'workspace_premium', 'admin_panel_settings', 'thumb_up', 'payments', 'verified_user'];
        foreach ($kelebihan as $i => $item): ?>
        <div class="flex flex-col items-center group">
            <span class="material-symbols-outlined text-5xl text-black mb-4 group-hover:scale-110 transition-transform duration-500"><?= $icons[$i] ?? 'star' ?></span>
            <h3 class="font-bold text-lg mb-3 text-black" style="font-family: 'Merriweather', Georgia, serif;"><?= esc($item->judul_kelebihan) ?></h3>
            <p class="text-[13px] text-gray-500 leading-relaxed max-w-[280px]" style="font-family: 'Plus Jakarta Sans', sans-serif;"><?= esc($item->deskripsi_kelebihan) ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section id="kategori" class="py-20 px-6 md:px-16 bg-[#fafafa]">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col items-center mb-16">
            <h2 class="text-3xl font-black text-black uppercase tracking-wider" style="font-family: 'Merriweather', Georgia, serif;">Kategori Produk</h2>
            <div class="w-12 h-[2px] bg-black mt-4"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php 
            $bgColors = ['#E5F1FA', '#FDF0E6', '#FCE7F3', '#F8F3E6'];
            $iconColors = ['#bfdbfe', '#fed7aa', '#fbcfe8', '#fef08a']; 
            foreach ($kategori as $i => $cat): 
                $bg = $bgColors[$i % count($bgColors)];
                $ic = $iconColors[$i % count($iconColors)];
            ?>
            <div class="relative rounded-none overflow-hidden h-64 group cursor-pointer shadow-none border border-gray-200 transition-all duration-500 hover:shadow-2xl" style="background-color: <?= $bg ?>;">
                <div class="absolute inset-0 flex items-center justify-end p-8 transition-transform duration-700 group-hover:scale-105">
                     <span class="material-symbols-outlined text-9xl opacity-50 grayscale" style="color: <?= $ic ?>;"><?= esc($cat->gambar_kategori) ?></span>
                </div>
                <div class="absolute bottom-6 left-6 relative z-20">
                    <div class="bg-black text-white px-6 py-3 rounded-none font-bold text-xs tracking-widest uppercase shadow-xl">
                        <?= esc($cat->nama_kategori) ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-14">
            <button class="bg-black text-white px-10 py-4 rounded-none font-bold uppercase tracking-widest text-xs hover:bg-gray-800 transition-colors shadow-xl">
                Lihat Semua
            </button>
        </div>
    </div>
</section>

<section class="py-24 px-6 md:px-16 bg-white border-t border-gray-100">
    <div class="max-w-[1100px] mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-black uppercase tracking-wider" style="font-family: 'Merriweather', Georgia, serif;">Produk Jasa</h2>
            <div class="w-12 h-[2px] bg-black mt-4 mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-20">
            <?php 
            $prodBgColors = ['#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4'];
            foreach ($produk_jasa as $i => $prod):
                $pbg = $prodBgColors[$i % count($prodBgColors)];
            ?>
            <div class="flex flex-col items-center group relative z-10 hover:z-50 transition-all duration-500">
                <div class="w-full aspect-[4/5] mb-8 relative flex items-center justify-center bg-transparent">
                    <div class="absolute inset-0 border border-gray-200 z-0" style="background-color: <?= $pbg ?>;"></div>
                    
                    <?php if ($prod->discount): ?>
                        <span class="absolute top-0 left-0 -ml-3 -mt-3 bg-black text-white text-[10px] px-3 py-1.5 font-bold z-30 uppercase tracking-widest shadow-lg" style="font-family: 'Plus Jakarta Sans', sans-serif;"><?= esc($prod->discount) ?></span>
                    <?php endif; ?>
                    
                    <img src="<?= base_url('images/' . esc($prod->gambar_produk)) ?>" alt="<?= esc($prod->nama_produk) ?>" class="w-[115%] h-[115%] max-w-none object-cover grayscale group-hover:grayscale-0 transition-all duration-700 group-hover:scale-105 relative z-20 shadow-xl">
                </div>
                
                <h3 class="text-center font-bold text-lg text-black leading-snug mb-3 px-2 relative z-20" style="font-family: 'Merriweather', Georgia, serif;">
                    <?= esc($prod->nama_produk) ?>
                </h3>
                <div class="text-[14px] text-gray-500 mb-6 font-medium tracking-wide relative z-20" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    <?= esc($prod->harga_jual) ?> 
                    <?php if ($prod->harga_normal): ?>
                        <span class="line-through text-gray-300 ml-2"><?= esc($prod->harga_normal) ?></span>
                    <?php endif; ?>
                </div>
                
                <?php if(session()->get('isLoggedIn')): ?>
                    <form action="<?= base_url('cart/add') ?>" method="POST" class="w-full text-center relative z-20">
                        <input type="hidden" name="id" value="<?= md5($prod->nama_produk) ?>">
                        <input type="hidden" name="name" value="<?= esc($prod->nama_produk) ?>">
                        <input type="hidden" name="price" value="<?= preg_replace('/[^0-9]/', '', $prod->harga_jual) ?>"> 
                        <input type="hidden" name="image" value="<?= esc($prod->gambar_produk) ?>">
                        <button type="submit" class="bg-black text-white px-6 py-3.5 text-xs font-bold transition-colors w-3/4 mx-auto rounded-none uppercase tracking-widest hover:bg-gray-800" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            Add to cart
                        </button>
                    </form>
                <?php else: ?>
                    <button class="trigger-login bg-black text-white px-6 py-3.5 text-xs font-bold transition-colors w-3/4 mx-auto rounded-none uppercase tracking-widest hover:bg-gray-800 relative z-20" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        Add to cart
                    </button>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-24">
            <a href="<?= base_url('products') ?>" class="inline-flex items-center gap-3 border border-black text-black px-8 py-4 rounded-none text-xs font-bold hover:bg-black hover:text-white transition-all uppercase tracking-widest" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                Semua Produk <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
            </a>
        </div>
    </div>
</section>

<section class="py-24 bg-black text-white">
    <div class="max-w-6xl mx-auto px-6 md:px-16 grid grid-cols-2 md:grid-cols-4 gap-12 text-center divide-x divide-gray-800">
        <div class="flex flex-col items-center">
            <span class="material-symbols-outlined text-5xl mb-6 text-gray-400">account_balance</span>
            <p class="text-4xl md:text-5xl font-black mb-3 tracking-tight" style="font-family: 'Merriweather', Georgia, serif;">10K+</p>
            <p class="text-xs md:text-sm font-bold uppercase tracking-widest text-gray-400" style="font-family: 'Plus Jakarta Sans', sans-serif;">Project Selesai</p>
        </div>
        <div class="flex flex-col items-center">
            <span class="material-symbols-outlined text-5xl mb-6 text-gray-400">groups</span>
            <p class="text-4xl md:text-5xl font-black mb-3 tracking-tight" style="font-family: 'Merriweather', Georgia, serif;">8K+</p>
            <p class="text-xs md:text-sm font-bold uppercase tracking-widest text-gray-400" style="font-family: 'Plus Jakarta Sans', sans-serif;">Klien Puas</p>
        </div>
        <div class="flex flex-col items-center">
            <span class="material-symbols-outlined text-5xl mb-6 text-gray-400">corporate_fare</span>
            <p class="text-4xl md:text-5xl font-black mb-3 tracking-tight" style="font-family: 'Merriweather', Georgia, serif;">100+</p>
            <p class="text-xs md:text-sm font-bold uppercase tracking-widest text-gray-400" style="font-family: 'Plus Jakarta Sans', sans-serif;">Mitra & Instansi</p>
        </div>
        <div class="flex flex-col items-center">
            <span class="material-symbols-outlined text-5xl mb-6 text-gray-400">school</span>
            <p class="text-4xl md:text-5xl font-black mb-3 tracking-tight" style="font-family: 'Merriweather', Georgia, serif;">50+</p>
            <p class="text-xs md:text-sm font-bold uppercase tracking-widest text-gray-400" style="font-family: 'Plus Jakarta Sans', sans-serif;">Tim Profesional</p>
        </div>
    </div>
</section>

<section class="py-24 px-6 md:px-16 bg-[#fafafa]">
    <div class="max-w-[1100px] mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-black uppercase tracking-wider mb-6" style="font-family: 'Merriweather', Georgia, serif;">Blog AkademikPro</h2>
            <p class="text-[14px] text-gray-500 max-w-2xl mx-auto leading-relaxed" style="font-family: 'Plus Jakarta Sans', sans-serif;">Artikel blog eksklusif yang menyajikan pemahaman mendalam tentang ruang lingkup akademik dan profesional.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <?php foreach ($blogs as $i => $blog): ?>
            <div class="flex flex-col group cursor-pointer bg-white p-4 pt-8 shadow-sm hover:shadow-2xl transition-all duration-500 rounded-none border border-gray-100 relative z-10 hover:z-50">
                <div class="w-full aspect-[4/3] mb-8 flex items-center justify-center relative bg-transparent">
                    <div class="absolute inset-0 bg-black z-0"></div>
                    <img src="<?= base_url('images/blog/' . esc($blog->gambar_blog) . '.webp') ?>" alt="<?= esc($blog->judul_blog) ?>" class="w-[110%] h-[115%] max-w-none object-cover opacity-80 group-hover:opacity-100 grayscale group-hover:grayscale-0 transition-all duration-700 relative z-20 -mt-8 shadow-lg group-hover:scale-105">
                </div>
                
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3 block" style="font-family: 'Plus Jakarta Sans', sans-serif;"><?= esc($blog->kategori_produk) ?></span>
                <h3 class="font-bold text-lg text-black leading-snug group-hover:text-gray-500 transition-colors" style="font-family: 'Merriweather', Georgia, serif;">
                    <?= esc($blog->judul_blog) ?>
                </h3>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-24 px-6 md:px-16 bg-white border-t border-gray-100">
    <div class="max-w-[1200px] mx-auto">
        <div class="flex flex-col sm:flex-row justify-between items-end mb-16 border-b border-gray-200 pb-6">
            <h2 class="text-3xl font-bold text-black uppercase tracking-wider" style="font-family: 'Merriweather', Georgia, serif;">Terbaru</h2>
            <a href="<?= base_url('products') ?>" class="inline-flex items-center gap-2 text-black text-xs font-bold hover:text-gray-500 transition-colors uppercase tracking-widest mt-4 sm:mt-0" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                Semua Produk <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16">
            <?php foreach ($produk_terbaru as $i => $prod): ?>
            <div class="flex flex-col items-start group relative z-10 hover:z-50">
                <div class="w-full aspect-[4/5] mb-8 relative flex items-center justify-center bg-transparent">
                    <div class="absolute inset-0 bg-gray-100 z-0"></div>
                    <img src="<?= base_url('images/' . esc($prod->gambar_produk)) ?>" alt="<?= esc($prod->nama_produk) ?>" class="w-[115%] h-[115%] max-w-none object-cover grayscale group-hover:grayscale-0 transition-all duration-700 relative z-20 shadow-md group-hover:shadow-2xl group-hover:scale-105">
                </div>
                
                <h3 class="font-bold text-[15px] text-black leading-snug mb-2" style="font-family: 'Merriweather', Georgia, serif;">
                    <?= esc($prod->nama_produk) ?>
                </h3>
                <div class="text-[13px] text-gray-500 mb-5 font-medium tracking-wide" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    <?= esc($prod->harga_jual) ?>
                    <?php if ($prod->harga_normal): ?>
                        <span class="line-through text-gray-300 ml-2"><?= esc($prod->harga_normal) ?></span>
                    <?php endif; ?>
                </div>

                <?php if(session()->get('isLoggedIn')): ?>
                    <form action="<?= base_url('cart/add') ?>" method="POST" class="w-full">
                        <input type="hidden" name="id" value="<?= md5($prod->nama_produk) ?>">
                        <input type="hidden" name="name" value="<?= esc($prod->nama_produk) ?>">
                        <input type="hidden" name="price" value="<?= preg_replace('/[^0-9]/', '', $prod->harga_jual) ?>"> 
                        <input type="hidden" name="image" value="<?= esc($prod->gambar_produk) ?>">
                        <button type="submit" class="border border-black text-black px-4 py-2.5 text-[11px] font-bold transition-colors w-full rounded-none uppercase tracking-widest hover:bg-black hover:text-white" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            Add to cart
                        </button>
                    </form>
                <?php else: ?>
                    <button class="trigger-login border border-black text-black px-4 py-2.5 text-[11px] font-bold transition-colors w-full rounded-none uppercase tracking-widest hover:bg-black hover:text-white" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        Add to cart
                    </button>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-24 px-6 md:px-16 bg-black text-white">
    <div class="max-w-[1100px] mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold uppercase tracking-wider" style="font-family: 'Merriweather', Georgia, serif;">Testimoni</h2>
            <div class="w-12 h-[2px] bg-white mt-4 mx-auto"></div>
        </div>

        <div class="w-full rounded-none bg-gray-900 shadow-2xl flex items-center justify-center relative min-h-[300px] border border-gray-800 mt-10 mb-10">
            <?php if(!empty($pengaturan->gambar_testimoni)): ?>
                <img src="<?= base_url('images/testimoni/' . esc($pengaturan->gambar_testimoni)) ?>" alt="Testimoni Customer" class="w-[105%] max-w-none h-auto object-cover grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition-all duration-700 relative z-20 -my-8 shadow-2xl">
            <?php else: ?>
                <div class="w-full py-32 flex flex-col items-center justify-center text-gray-600">
                    <span class="material-symbols-outlined text-6xl mb-4 opacity-30">broken_image</span>
                    <span class="text-xs font-bold tracking-widest uppercase" style="font-family: 'Plus Jakarta Sans', sans-serif;">Gambar Testimoni Belum Tersedia</span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="py-24 px-6 md:px-16 bg-[#fafafa]">
    <div class="max-w-[1200px] mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-black mb-6 uppercase tracking-wider" style="font-family: 'Merriweather', Georgia, serif;">FAQ</h2>
            <p class="text-[14px] text-gray-500 max-w-2xl mx-auto leading-relaxed" style="font-family: 'Plus Jakarta Sans', sans-serif;">Pemahaman lebih jelas tentang layanan eksklusif yang kami sediakan.</p>
        </div>

        <div class="flex flex-col md:flex-row gap-8 items-start">
            <?php 
                $half = ceil(count($faqs) / 2);
                $col1 = array_slice($faqs, 0, $half);
                $col2 = array_slice($faqs, $half);
            ?>
            <div class="w-full md:w-1/2 flex flex-col gap-4">
                <?php foreach($col1 as $index => $faq): ?>
                <details class="group bg-white border border-gray-200 shadow-sm rounded-none" <?= $index === 0 ? 'open' : '' ?>>
                    <summary class="flex items-center gap-4 p-6 text-black hover:text-gray-500 font-bold cursor-pointer list-none [&::-webkit-details-marker]:hidden text-[13px] uppercase tracking-wide transition-colors" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <span class="material-symbols-outlined text-[20px] group-open:hidden">add</span>
                        <span class="material-symbols-outlined text-[20px] hidden group-open:block">remove</span>
                        <?= esc($faq->pertanyaan) ?>
                    </summary>
                    <div class="p-6 pt-0 text-gray-500 text-[13px] leading-relaxed text-justify border-t border-gray-100 mt-2" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <?= $faq->jawaban ?>
                    </div>
                </details>
                <?php endforeach; ?>
            </div>

            <div class="w-full md:w-1/2 flex flex-col gap-4">
                <?php foreach($col2 as $index => $faq): ?>
                <details class="group bg-white border border-gray-200 shadow-sm rounded-none" <?= $index === 0 ? 'open' : '' ?>>
                    <summary class="flex items-center gap-4 p-6 text-black hover:text-gray-500 font-bold cursor-pointer list-none [&::-webkit-details-marker]:hidden text-[13px] uppercase tracking-wide transition-colors" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <span class="material-symbols-outlined text-[20px] group-open:hidden">add</span>
                        <span class="material-symbols-outlined text-[20px] hidden group-open:block">remove</span>
                        <?= esc($faq->pertanyaan) ?>
                    </summary>
                    <div class="p-6 pt-0 text-gray-500 text-[13px] leading-relaxed text-justify border-t border-gray-100 mt-2" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <?= $faq->jawaban ?>
                    </div>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-black text-white">
    <div class="max-w-[1200px] mx-auto px-6 md:px-16">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            <h3 class="text-xl md:text-2xl font-bold leading-snug max-w-2xl text-center md:text-left" style="font-family: 'Merriweather', Georgia, serif;">
                Elevasi kualitas akademik Anda. Konsultasikan kebutuhan proyek bersama kami hari ini.
            </h3>
            <a href="#" class="inline-flex items-center gap-3 bg-white text-black px-8 py-4 rounded-none text-xs font-bold hover:bg-gray-200 transition-colors uppercase tracking-widest shadow-xl" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                <span class="material-symbols-outlined text-[18px]">chat</span>
                Chat Admin
            </a>
        </div>
    </div>
</section>

<section class="py-20 bg-white text-center">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-sm font-bold text-gray-400 mb-12 uppercase tracking-[0.2em]" style="font-family: 'Plus Jakarta Sans', sans-serif;">Supported By & Payment</h2>
        
        <div class="flex flex-wrap justify-center items-center gap-10 md:gap-16 grayscale opacity-80 hover:grayscale-0 transition-all duration-700">
            <div class="flex items-center gap-1 font-bold text-2xl italic text-[#253275]" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                <span class="text-[#D0235C] font-black text-3xl">JA</span>
                <span class="ml-2 text-[#253275]">Jasa</span><span class="text-[#D0235C]">Akademik</span><span class="text-xs">id</span>
            </div>
            
            <div class="w-[1px] h-10 bg-gray-200 hidden md:block"></div>
            
            <div class="text-[#005EAA] font-black text-3xl italic flex items-center gap-2">
                BCA
            </div>
            <div class="text-[#0B5B9D] font-black text-3xl italic flex items-center gap-1">
                BRI
            </div>
            <div class="text-[#F15A23] font-black text-3xl italic flex items-center gap-1">
                BNI
            </div>
            <div class="text-[#4C2A86] font-black text-3xl italic tracking-tighter">
                OVO
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>