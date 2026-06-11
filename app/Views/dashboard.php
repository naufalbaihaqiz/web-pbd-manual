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
        <div class="flex flex-col items-center">
            <span class="material-symbols-outlined text-5xl text-black mb-4"><?= $icons[$i] ?? 'star' ?></span>
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
            $kategori_custom = [
                (object)[
                    'nama_kategori' => 'Jasa Pembuatan Karya Ilmiah',
                    'gambar_kategori' => 'Jasa Pembuatan Karya Ilmiah.png',
                    'jumlah_produk' => '25'
                ],
                (object)[
                    'nama_kategori' => 'Jasa Olah Data Statistik',
                    'gambar_kategori' => 'Jasa Olah Data Statistik.png',
                    'jumlah_produk' => '15'
                ],
                (object)[
                    'nama_kategori' => 'Jasa Review Skripsi',
                    'gambar_kategori' => 'Jasa Review Skripsi.png',
                    'jumlah_produk' => '20'
                ],
                (object)[
                    'nama_kategori' => 'Jasa Akademik Lainnya',
                    'gambar_kategori' => 'Jasa Akademik Lainnya.png',
                    'jumlah_produk' => '20'
                ]
            ];

            $bgColors = ['#ffdcb3', '#fbeae9', '#ffdcb3', '#a5c7c6'];
            foreach ($kategori_custom as $i => $cat): 
                $bg = $bgColors[$i % count($bgColors)];
            ?>
            <div class="relative rounded-none overflow-hidden h-64 cursor-pointer shadow-sm border border-transparent transition-shadow duration-300 hover:shadow-md flex items-center" style="background-color: <?= $bg ?>;">
                <div class="absolute left-8 md:left-10 z-20 flex flex-col justify-center max-w-[50%]">
                    <span class="text-[13px] font-black text-black mb-6"><?= esc($cat->jumlah_produk) ?></span>
                    <h3 class="font-bold text-[19px] md:text-[22px] text-black leading-snug" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <?= esc($cat->nama_kategori) ?>
                    </h3>
                </div>
                <div class="absolute right-4 bottom-0 h-[85%] w-[55%] flex items-end justify-end pointer-events-none">
                     <img src="<?= base_url('images/' . rawurlencode($cat->gambar_kategori)) ?>" alt="<?= esc($cat->nama_kategori) ?>" class="h-full w-full object-contain object-right-bottom">
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
            <div class="flex flex-col items-center relative z-10 border border-transparent hover:border-gray-100 p-4 rounded-2xl hover:shadow-md bg-white transition-shadow duration-300">
                <div class="w-full aspect-[4/5] mb-6 relative flex items-center justify-center overflow-hidden rounded-xl bg-gray-50 border border-gray-100" style="background-color: <?= $pbg ?>;">
                    
                    <?php if ($prod->discount): ?>
                        <span class="absolute top-3 left-3 bg-black text-white text-[10px] font-bold px-2.5 py-1 uppercase tracking-widest shadow-md z-30 rounded-sm" style="font-family: 'Plus Jakarta Sans', sans-serif;"><?= esc($prod->discount) ?></span>
                    <?php endif; ?>
                    
                    <div class="absolute inset-0 z-20 flex items-center justify-center p-6">
                        <img src="<?= base_url('images/' . esc($prod->gambar_produk)) ?>" alt="<?= esc($prod->nama_produk) ?>" class="w-full h-full object-contain drop-shadow-sm">
                    </div>
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
            <div class="flex flex-col cursor-pointer bg-white p-4 pt-8 shadow-sm hover:shadow-md transition-shadow duration-300 rounded-none border border-gray-100 relative z-10">
                <div class="w-full aspect-[4/3] mb-8 flex items-center justify-center relative bg-transparent">
                    <div class="absolute inset-0 bg-black z-0"></div>
                    <img src="<?= base_url('images/blog/' . esc($blog->gambar_blog) . '.webp') ?>" alt="<?= esc($blog->judul_blog) ?>" class="w-[110%] h-[115%] max-w-none object-cover opacity-90 relative z-20 -mt-8 shadow-lg">
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
            <div class="flex flex-col items-start relative z-10 border border-transparent hover:border-gray-100 p-4 rounded-2xl hover:shadow-md bg-white transition-shadow duration-300">
                <div class="w-full aspect-[4/5] mb-6 relative flex items-center justify-center overflow-hidden rounded-xl bg-gray-50 border border-gray-100">
                    <div class="absolute inset-0 z-20 flex items-center justify-center p-6">
                        <img src="<?= base_url('images/' . esc($prod->gambar_produk)) ?>" alt="<?= esc($prod->nama_produk) ?>" class="w-full h-full object-contain drop-shadow-sm">
                    </div>
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
                <img src="<?= base_url('images/testimoni/' . esc($pengaturan->gambar_testimoni)) ?>" alt="Testimoni Customer" class="w-[105%] max-w-none h-auto object-cover relative z-20 -my-8 shadow-2xl">
            <?php else: ?>
                <div class="w-full py-32 flex flex-col items-center justify-center text-gray-600">
                    <span class="material-symbols-outlined text-6xl mb-4 opacity-30">broken_image</span>
                    <span class="text-xs font-bold tracking-widest uppercase" style="font-family: 'Plus Jakarta Sans', sans-serif;">Gambar Testimoni Belum Tersedia</span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="py-16 px-6 md:px-16 bg-[#fafafa]">
    <div class="max-w-[1200px] mx-auto">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-bold text-black mb-4 tracking-wide" style="font-family: 'Plus Jakarta Sans', sans-serif;">Frequently Asked Questions</h2>
            <p class="text-[13px] text-gray-500 max-w-3xl mx-auto" style="font-family: 'Plus Jakarta Sans', sans-serif;">Silahkan lihat bagian FAQ kami untuk mendapatkan pemahaman lebih jelas tentang layanan yang kami sediakan sebagai partner Anda.</p>
        </div>

        <div class="flex flex-col md:flex-row gap-6 items-start">
            <?php 
                $half = ceil(count($faqs) / 2);
                $col1 = array_slice($faqs, 0, $half);
                $col2 = array_slice($faqs, $half);
            ?>
            <div class="w-full md:w-1/2 flex flex-col gap-2">
                <?php foreach($col1 as $index => $faq): ?>
                <details class="group bg-[#f4f4f4] border border-gray-200 rounded-none shadow-sm" <?= $index === 0 ? 'open' : '' ?>>
                    <summary class="flex items-center gap-3 p-4 text-black font-bold cursor-pointer list-none [&::-webkit-details-marker]:hidden text-[13px] group-open:bg-[#B49E78] transition-colors" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <span class="material-symbols-outlined text-[18px] group-open:hidden font-bold">add_circle</span>
                        <span class="material-symbols-outlined text-[18px] hidden group-open:block font-bold">remove_circle</span>
                        <?= esc($faq->pertanyaan) ?>
                    </summary>
                    <div class="p-6 text-gray-700 text-[13px] leading-relaxed text-justify border-t border-gray-200" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <?= $faq->jawaban ?>
                    </div>
                </details>
                <?php endforeach; ?>
            </div>

            <div class="w-full md:w-1/2 flex flex-col gap-2">
                <?php foreach($col2 as $index => $faq): ?>
                <details class="group bg-[#f4f4f4] border border-gray-200 rounded-none shadow-sm" <?= $index === 0 ? 'open' : '' ?>>
                    <summary class="flex items-center gap-3 p-4 text-black font-bold cursor-pointer list-none [&::-webkit-details-marker]:hidden text-[13px] group-open:bg-[#B49E78] transition-colors" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <span class="material-symbols-outlined text-[18px] group-open:hidden font-bold">add_circle</span>
                        <span class="material-symbols-outlined text-[18px] hidden group-open:block font-bold">remove_circle</span>
                        <?= esc($faq->pertanyaan) ?>
                    </summary>
                    <div class="p-6 text-gray-700 text-[13px] leading-relaxed text-justify border-t border-gray-200" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <?= $faq->jawaban ?>
                    </div>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Partnership Section -->
<section class="pt-16 pb-12 bg-white text-center">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-[18px] font-bold text-black mb-4 tracking-wide" style="font-family: 'Plus Jakarta Sans', sans-serif;">Partnership</h2>
        
        <div class="flex justify-center items-center">
            <div class="flex items-center gap-1 font-bold text-2xl italic text-[#253275]" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                <span class="text-[#D0235C] font-black text-4xl">JA</span>
                <span class="ml-2 text-[#253275]">Jasa</span><span class="text-[#D0235C]">Akademik</span><span class="text-xs">id</span>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-12 bg-[#fafafa]">
    <div class="max-w-[1200px] mx-auto px-6 md:px-16 text-left flex flex-col items-start">
        <h3 class="text-[15px] font-bold text-black mb-6" style="font-family: 'Plus Jakarta Sans', sans-serif;">Tertarik ingin menggunakan layanan jasa AkademikPro.id? Checkout sekarang atau konsultasikan dengan Admin!</h3>
        <a href="#" class="inline-flex items-center gap-2 bg-[#B49E78] text-black px-6 py-2.5 rounded-md text-[13px] font-bold shadow-sm transition-colors" style="font-family: 'Plus Jakarta Sans', sans-serif;">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
            </svg>
            Chat Admin
        </a>
    </div>
</section>

<!-- Payment Section -->
<section class="py-16 bg-white text-center">
    <div class="max-w-[1200px] mx-auto px-6">
        <h2 class="text-[18px] font-bold text-black mb-4 tracking-wide" style="font-family: 'Plus Jakarta Sans', sans-serif;">Payment</h2>
        <p class="text-[13px] text-gray-500 mb-10" style="font-family: 'Plus Jakarta Sans', sans-serif;">Kami menerima pembayaran melalui transfer bank dan dompet digital untuk kemudahan bertransaksi.</p>
        
        <div class="flex flex-wrap justify-center items-center gap-6 md:gap-10">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" alt="BCA" class="h-10 object-contain">
            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/BRI_2020.svg" alt="BRI" class="h-10 object-contain">
            <img src="https://upload.wikimedia.org/wikipedia/id/5/55/BNI_logo.svg" alt="BNI" class="h-8 object-contain">
            <img src="https://upload.wikimedia.org/wikipedia/commons/e/eb/Logo_OVO.svg" alt="OVO" class="h-8 object-contain">
        </div>
    </div>
</section>

<?= $this->endSection() ?>