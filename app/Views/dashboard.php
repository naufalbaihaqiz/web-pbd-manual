<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative pt-40 pb-32 px-6 md:px-16 bg-[#1f2937] overflow-hidden flex items-center min-h-[600px]">
    <!-- Background image -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover opacity-25" alt="Hero Background">
        <div class="absolute inset-0 bg-black/60"></div>
    </div>
    
    <div class="max-w-[1400px] mx-auto w-full relative z-10 text-white">
        <div class="max-w-4xl">
            <span class="text-[#A68A64] font-bold text-[13px] tracking-wide mb-4 block">Platform</span>
            <h1 class="text-4xl md:text-5xl lg:text-[54px] font-bold mb-6 leading-[1.2]" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">
                <?= esc($pengaturan->hero_title ?? 'Digital Marketplace Jasa Akademik Profesional No.1 di Indonesia') ?>
            </h1>
            <p class="text-[13px] md:text-[14px] text-gray-300 mb-10 leading-relaxed text-justify max-w-5xl">
                <?= esc($pengaturan->hero_description ?? 'Akademikpro.id adalah marketplace digital jasa akademik profesional di Indonesia...') ?>
            </p>
            <a href="#" class="inline-flex items-center gap-2 bg-[#A68A64] text-slate-900 px-6 py-2.5 rounded text-sm font-bold hover:bg-[#8f7553] transition-colors shadow-md">
                <span class="material-symbols-outlined text-[18px]">chat</span>
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

<!-- Feature Icons Section -->
<section class="relative z-20 px-6 md:px-16 -mt-16 md:-mt-24 mb-16">
    <div class="max-w-[1200px] mx-auto bg-white shadow-xl grid grid-cols-1 md:grid-cols-3 gap-y-12 gap-x-8 p-10 md:p-16 text-center">
        <?php 
        $icons = ['military_tech', 'workspace_premium', 'admin_panel_settings', 'thumb_up', 'payments', 'verified_user'];
        foreach ($kelebihan as $i => $item): ?>
        <div class="flex flex-col items-center">
            <span class="material-symbols-outlined text-5xl text-[#A68A64] mb-4"><?= $icons[$i] ?? 'star' ?></span>
            <h3 class="font-bold text-lg mb-3 text-slate-900" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;"><?= esc($item->judul_kelebihan) ?></h3>
            <p class="text-[13px] text-gray-500 leading-relaxed max-w-[280px]"><?= esc($item->deskripsi_kelebihan) ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Kategori Produk Section -->
<section id="kategori" class="py-20 px-6 md:px-16 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col items-center mb-12">
            <h2 class="text-3xl font-black text-[#0B214D]">Kategori Produk</h2>
            <div class="w-20 h-1 bg-[#F28C28] mt-3"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php 
            $bgColors = ['#E5F1FA', '#FDF0E6', '#FCE7F3', '#F8F3E6'];
            $iconColors = ['#bfdbfe', '#fed7aa', '#fbcfe8', '#fef08a']; 
            foreach ($kategori as $i => $cat): 
                $bg = $bgColors[$i % count($bgColors)];
                $ic = $iconColors[$i % count($iconColors)];
            ?>
            <div class="relative rounded-xl overflow-hidden h-64 group cursor-pointer shadow-sm hover:shadow-md transition-shadow" style="background-color: <?= $bg ?>;">
                <div class="absolute inset-0 flex items-center justify-end p-8">
                     <span class="material-symbols-outlined text-9xl" style="color: <?= $ic ?>;"><?= esc($cat->gambar_kategori) ?></span>
                </div>
                <div class="absolute bottom-4 left-4">
                    <div class="bg-[#0B214D] text-white px-6 py-2.5 rounded font-bold text-sm tracking-wide uppercase">
                        <?= esc($cat->nama_kategori) ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-10">
            <button class="bg-[#C6A27A] text-white px-8 py-3 rounded-lg font-bold shadow-md hover:bg-[#b08d66] transition-colors">
                Lihat Semua
            </button>
        </div>
    </div>
</section>

<!-- Produk Jasa Section -->
<section class="py-20 px-6 md:px-16 bg-white">
    <div class="max-w-[1100px] mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-900" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Produk Jasa</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12">
            <?php 
            $prodBgColors = ['#A5E3E7', '#F49C82', '#F7A6D8', '#E89E30', '#C9B9A3', '#D8D8D8'];
            $prodIconColors = ['text-teal-600/20', 'text-orange-800/20', 'text-pink-800/20', 'text-yellow-900/20', 'text-yellow-900/20', 'text-gray-600/20'];
            foreach ($produk_jasa as $i => $prod):
                $pbg = $prodBgColors[$i % count($prodBgColors)];
                $pic = $prodIconColors[$i % count($prodIconColors)];
            ?>
            <div class="flex flex-col items-center group">
                <div class="w-full aspect-square mb-5 relative flex items-center justify-center overflow-hidden" style="background-color: <?= $pbg ?>;">
                    <?php if ($prod->discount): ?>
                        <span class="absolute top-4 left-4 bg-black text-white text-[10px] px-2 py-1 font-bold z-10"><?= esc($prod->discount) ?></span>
                    <?php endif; ?>
                    <img src="<?= base_url('images/' . esc($prod->gambar_produk)) ?>" alt="<?= esc($prod->nama_produk) ?>" class="w-full h-full object-cover">
                </div>
                <h3 class="text-center font-bold text-base text-slate-900 leading-snug mb-2 px-2" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">
                    <?= esc($prod->nama_produk) ?>
                </h3>
                <div class="text-[13px] text-gray-500 mb-4">
                    <?= esc($prod->harga_jual) ?> 
                    <?php if ($prod->harga_normal): ?>
                        <span class="line-through text-gray-400 ml-1"><?= esc($prod->harga_normal) ?></span>
                    <?php endif; ?>
                </div>
                
                <!-- Logika Tombol Add to Cart -->
                <?php if(session()->get('isLoggedIn')): ?>
                    <form action="<?= base_url('cart/add') ?>" method="POST" class="w-full text-center">
                        <input type="hidden" name="id" value="<?= md5($prod->nama_produk) ?>">
                        <input type="hidden" name="name" value="<?= esc($prod->nama_produk) ?>">
                        <input type="hidden" name="price" value="<?= preg_replace('/[^0-9]/', '', $prod->harga_jual) ?>"> 
                        <input type="hidden" name="image" value="<?= esc($prod->gambar_produk) ?>">
                        <button type="submit" class="bg-[#A68A64] hover:bg-[#8f7553] text-white px-6 py-2 text-sm font-bold transition-colors w-1/2 rounded-sm">
                            Add to cart
                        </button>
                    </form>
                <?php else: ?>
                    <button class="trigger-login bg-[#A68A64] hover:bg-[#8f7553] text-white px-6 py-2 text-sm font-bold transition-colors w-1/2 rounded-sm">
                        Add to cart
                    </button>
                <?php endif; ?>

            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?= base_url('products') ?>" class="inline-flex items-center gap-2 bg-[#F3F4F6] text-slate-700 px-6 py-2.5 rounded text-[13px] font-bold hover:bg-gray-200 transition-colors">
                Semua Produk <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
            </a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-[#9A7B56] text-white">
    <div class="max-w-6xl mx-auto px-6 md:px-16 grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
        <div class="flex flex-col items-center">
            <span class="material-symbols-outlined text-6xl mb-4">account_balance</span>
            <p class="text-4xl md:text-5xl font-black mb-2 tracking-tight">10.000+</p>
            <p class="text-sm md:text-base font-bold">Project Selesai</p>
        </div>
        <div class="flex flex-col items-center">
            <span class="material-symbols-outlined text-6xl mb-4">groups</span>
            <p class="text-4xl md:text-5xl font-black mb-2 tracking-tight">8.000+</p>
            <p class="text-sm md:text-base font-bold">Klien Puas</p>
        </div>
        <div class="flex flex-col items-center">
            <span class="material-symbols-outlined text-6xl mb-4">corporate_fare</span>
            <p class="text-4xl md:text-5xl font-black mb-2 tracking-tight">100+</p>
            <p class="text-sm md:text-base font-bold">Mitra & Instansi</p>
        </div>
        <div class="flex flex-col items-center">
            <span class="material-symbols-outlined text-6xl mb-4">school</span>
            <p class="text-4xl md:text-5xl font-black mb-2 tracking-tight">50+</p>
            <p class="text-sm md:text-base font-bold">Tim Profesional</p>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="py-20 px-6 md:px-16 bg-white">
    <div class="max-w-[1100px] mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Blog AkademikPro.id</h2>
            <p class="text-[14px] text-gray-500 max-w-3xl mx-auto">Artikel blog yang kami sajikan terdiri dari beberapa artikel yang berhubungan dengan ruang lingkup akademik. Silahkan explore lebih lanjut!</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <?php 
            $blogBgColors = ['#E8E8E8', '#F2F8FF', '#F9F6FF'];
            $blogIconColors = ['text-gray-400', 'text-blue-200', 'text-purple-200'];
            foreach ($blogs as $i => $blog):
                $bbg = $blogBgColors[$i % count($blogBgColors)];
                $bic = $blogIconColors[$i % count($blogIconColors)];
            ?>
            <div class="flex flex-col group cursor-pointer">
                <div class="w-full aspect-[4/3] mb-5 overflow-hidden flex items-center justify-center relative" style="background-color: <?= $bbg ?>;">
                    <img src="<?= base_url('images/blog/' . esc($blog->gambar_blog) . '.webp') ?>" alt="<?= esc($blog->judul_blog) ?>" class="w-full h-full object-cover">
                </div>
                <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-3 block"><?= esc($blog->kategori_produk) ?></span>
                <h3 class="font-bold text-[19px] text-slate-900 leading-snug group-hover:text-[#A68A64] transition-colors" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">
                    <?= esc($blog->judul_blog) ?>
                </h3>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Produk Jasa Terbaru Section -->
<section class="py-20 px-6 md:px-16 bg-white border-t border-gray-100">
    <div class="max-w-[1200px] mx-auto">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-10">
            <h2 class="text-[28px] font-bold text-slate-900 mb-4 sm:mb-0" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Produk Jasa Terbaru</h2>
            <a href="<?= base_url('products') ?>" class="inline-flex items-center gap-2 bg-[#F3F4F6] text-slate-700 px-5 py-2.5 rounded text-[13px] font-bold hover:bg-gray-200 transition-colors">
                Semua Produk <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-10">
            <?php 
            $terbaruBgColors = ['#90C8A2', '#E69B35', '#DD7CB2', '#8BA2C8'];
            $terbaruIconColors = ['text-green-900/20', 'text-orange-900/20', 'text-pink-900/20', 'text-blue-900/20'];
            foreach ($produk_terbaru as $i => $prod):
                $tbg = $terbaruBgColors[$i % count($terbaruBgColors)];
                $tic = $terbaruIconColors[$i % count($terbaruIconColors)];
            ?>
            <div class="flex flex-col items-center group">
                <div class="w-full aspect-square mb-4 relative flex items-center justify-center overflow-hidden" style="background-color: <?= $tbg ?>;">
                    <img src="<?= base_url('images/' . esc($prod->gambar_produk)) ?>" alt="<?= esc($prod->nama_produk) ?>" class="w-full h-full object-cover">
                </div>
                <h3 class="text-center font-bold text-[15px] text-slate-900 leading-snug mb-2 px-2" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">
                    <?= esc($prod->nama_produk) ?>
                </h3>
                <div class="text-[13px] text-gray-500 mb-4">
                    <?= esc($prod->harga_jual) ?>
                    <?php if ($prod->harga_normal): ?>
                        <span class="line-through text-gray-400 ml-1"><?= esc($prod->harga_normal) ?></span>
                    <?php endif; ?>
                </div>

                <!-- Logika Tombol Add to Cart -->
                <?php if(session()->get('isLoggedIn')): ?>
                    <form action="<?= base_url('cart/add') ?>" method="POST" class="w-full text-center">
                        <input type="hidden" name="id" value="<?= md5($prod->nama_produk) ?>">
                        <input type="hidden" name="name" value="<?= esc($prod->nama_produk) ?>">
                        <input type="hidden" name="price" value="<?= preg_replace('/[^0-9]/', '', $prod->harga_jual) ?>"> 
                        <input type="hidden" name="image" value="<?= esc($prod->gambar_produk) ?>">
                        <button type="submit" class="bg-[#A68A64] hover:bg-[#8f7553] text-white px-6 py-2.5 text-[13px] font-bold transition-colors w-3/4 mx-auto rounded-sm">
                            Add to cart
                        </button>
                    </form>
                <?php else: ?>
                    <button class="trigger-login bg-[#A68A64] hover:bg-[#8f7553] text-white px-6 py-2.5 text-[13px] font-bold transition-colors w-3/4 mx-auto rounded-sm">
                        Add to cart
                    </button>
                <?php endif; ?>

            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 🌟 Testimoni Customer Section (Ubah Jadi 1 Gambar Dari Folder images/testimoni/) 🌟 -->
<section class="py-20 px-6 md:px-16 bg-white">
    <div class="max-w-[1100px] mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-[28px] font-bold text-slate-900" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Testimoni Customer</h2>
        </div>

        <div class="w-full rounded-xl overflow-hidden bg-[#F6F6F6] shadow-sm flex items-center justify-center relative min-h-[250px]">
            <?php if(!empty($pengaturan->gambar_testimoni)): ?>
                <!-- Menampilkan gambar gabungan testimoni utuh dinamis dari subfolder testimoni -->
                <img src="<?= base_url('images/testimoni/' . esc($pengaturan->gambar_testimoni)) ?>" alt="Testimoni Customer" class="w-full h-auto object-cover">
            <?php else: ?>
                <div class="w-full py-24 flex flex-col items-center justify-center text-gray-400">
                    <span class="material-symbols-outlined text-6xl mb-3 opacity-50">broken_image</span>
                    <span class="text-sm font-medium tracking-wider">Gambar Testimoni Belum Tersedia</span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 px-6 md:px-16 bg-white border-t border-gray-100">
    <div class="max-w-[1200px] mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Frequently Asked Questions</h2>
            <p class="text-[13px] text-gray-500 max-w-3xl mx-auto">Silahkan lihat bagian FAQ kami untuk mendapatkan pemahaman lebih jelas tentang layanan yang kami sediakan sebagai partner Anda.</p>
        </div>

        <div class="flex flex-col md:flex-row gap-6 items-start">
            <?php 
                $half = ceil(count($faqs) / 2);
                $col1 = array_slice($faqs, 0, $half);
                $col2 = array_slice($faqs, $half);
            ?>
            <!-- Column 1 -->
            <div class="w-full md:w-1/2 flex flex-col gap-0 border-x border-t border-gray-200 bg-[#F4F4F4]">
                <?php foreach($col1 as $index => $faq): ?>
                <details class="group border-b border-gray-200" <?= $index === 0 ? 'open' : '' ?>>
                    <summary class="flex items-center gap-3 p-4 bg-[#EDEDED] group-open:bg-[#B49E78] text-slate-700 group-open:text-slate-900 hover:bg-gray-200 font-medium cursor-pointer list-none [&::-webkit-details-marker]:hidden text-[13px]">
                        <span class="material-symbols-outlined text-[18px] group-open:hidden text-slate-800">add_circle</span>
                        <span class="material-symbols-outlined text-[18px] hidden group-open:block text-slate-800">do_not_disturb_on</span>
                        <?= esc($faq->pertanyaan) ?>
                    </summary>
                    <div class="p-5 text-slate-700 text-[12.5px] leading-relaxed bg-[#F4F4F4] text-justify">
                        <?= $faq->jawaban ?>
                    </div>
                </details>
                <?php endforeach; ?>
            </div>

            <!-- Column 2 -->
            <div class="w-full md:w-1/2 flex flex-col gap-0 border-x border-t border-gray-200 bg-[#F4F4F4]">
                <?php foreach($col2 as $index => $faq): ?>
                <details class="group border-b border-gray-200" <?= $index === 0 ? 'open' : '' ?>>
                    <summary class="flex items-center gap-3 p-4 bg-[#EDEDED] group-open:bg-[#B49E78] text-slate-700 group-open:text-slate-900 hover:bg-gray-200 font-medium cursor-pointer list-none [&::-webkit-details-marker]:hidden text-[13px]">
                        <span class="material-symbols-outlined text-[18px] group-open:hidden text-slate-800">add_circle</span>
                        <span class="material-symbols-outlined text-[18px] hidden group-open:block text-slate-800">do_not_disturb_on</span>
                        <?= esc($faq->pertanyaan) ?>
                    </summary>
                    <div class="p-5 text-slate-700 text-[12.5px] leading-relaxed bg-[#F4F4F4] text-justify">
                        <?= $faq->jawaban ?>
                    </div>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Partnership Section -->
<section class="py-12 bg-white text-center border-t border-gray-100">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-2xl font-bold text-slate-900 mb-6" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Partnership</h2>
        <div class="flex justify-center items-center">
            <!-- Placeholder for JasaAkademik.id logo -->
            <div class="flex items-center gap-1 font-bold text-3xl italic text-[#253275]">
                <span class="text-[#D0235C] font-black text-4xl">JA</span>
                <span class="ml-2 text-[#253275]">Jasa</span><span class="text-[#D0235C]">Akademik</span><span class="text-sm">id</span>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Banner -->
<section class="py-10 bg-[#F4F4F4] border-t border-gray-100">
    <div class="max-w-[1200px] mx-auto px-6 md:px-16">
        <div class="flex flex-col items-start gap-4">
            <h3 class="text-[17px] font-bold text-slate-900" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">
                Tertarik ingin menggunakan layanan jasa AkademikPro.id? Checkout sekarang atau konsultasikan dengan Admin!
            </h3>
            <a href="#" class="inline-flex items-center gap-2 bg-[#B49E78] text-slate-900 px-5 py-2 rounded text-[13px] font-medium shadow-md hover:bg-[#a38f6c] transition-colors whitespace-nowrap">
                <svg class="w-4 h-4 opacity-80" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                </svg>
                Chat Admin
            </a>
        </div>
    </div>
</section>

<!-- Payment Section -->
<section class="py-16 bg-white text-center border-t border-gray-100 pb-28">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-[28px] font-bold text-slate-900 mb-4" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Payment</h2>
        <p class="text-[12.5px] text-gray-500 mb-10">Kami menerima pembayaran melalui transfer bank dan dompet digital untuk kemudahan bertransaksi.</p>
        <div class="flex flex-wrap justify-center items-center gap-6 md:gap-10">
            <div class="text-[#005EAA] font-black text-[42px] italic flex items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-[#005EAA] flex items-center justify-center">
                    <span class="text-white text-xs font-sans">BCA</span>
                </div>
                BCA
            </div>
            <div class="text-[#0B5B9D] font-black text-[42px] italic flex items-center gap-1">
                <span class="material-symbols-outlined text-[36px] font-bold">account_balance</span>
                BRI
            </div>
            <div class="text-[#F15A23] font-black text-[42px] italic flex items-center gap-1">
                <span class="material-symbols-outlined text-[36px] font-bold">payments</span>
                BNI
            </div>
            <div class="text-[#4C2A86] font-black text-[42px] italic tracking-tighter">
                OVO
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>