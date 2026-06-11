<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main class="pt-24 pb-20 bg-[#fbfbfb] min-h-screen">
    <div class="max-w-[800px] mx-auto px-6 md:px-16">
        <!-- Header -->
        <div class="mb-12">
            <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest block mb-2">HOME / BLOG / <?= esc($blog->kategori_produk) ?></span>
            <h1 class="text-3xl md:text-[40px] font-bold text-slate-900 leading-tight mb-6" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">
                <?= esc($blog->judul_blog) ?>
            </h1>
        </div>

        <!-- Featured Image -->
        <div class="aspect-[16/9] bg-gray-100 mb-10 overflow-hidden w-full">
            <img src="<?= base_url('images/blog/' . esc($blog->gambar_blog) . '.webp') ?>" alt="<?= esc($blog->judul_blog) ?>" class="w-full h-full object-cover">
        </div>

        <!-- Content Placeholder -->
        <div class="text-gray-700 leading-relaxed text-lg" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">
            <p class="mb-6">
                Ini adalah halaman detail untuk artikel <strong><?= esc($blog->judul_blog) ?></strong>. 
                Anda dapat menambahkan kolom `konten` di database dan menampilkannya di sini.
            </p>
            <p class="mb-6">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>
        
        <div class="mt-12 pt-8 border-t border-gray-200">
            <a href="<?= base_url('blog') ?>" class="text-sm font-bold text-[#A68A64] hover:text-[#8b7352] transition-colors flex items-center gap-2">
                <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                Kembali ke Blog
            </a>
        </div>
    </div>
</main>

<?= $this->endSection() ?>
