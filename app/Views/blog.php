<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main class="pt-24 pb-20 bg-[#fbfbfb] flex-grow">
    <div class="max-w-[1100px] mx-auto px-6 md:px-16">
        <!-- Header -->
        <div class="text-center mb-12">
            <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest block mb-2">HOME / BLOG</span>
            <h1 class="text-4xl md:text-[44px] font-bold text-slate-900" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Blog</h1>
        </div>

        <!-- Grid Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($blogs as $blog): ?>
            <a href="<?= base_url('blog/detail/' . urlencode($blog->judul_blog)) ?>" class="block bg-white p-5 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] hover:shadow-xl transition-all cursor-pointer">
                <div class="aspect-[4/3] bg-gray-100 mb-5 overflow-hidden">
                    <img src="<?= base_url('images/blog/' . esc($blog->gambar_blog) . '.webp') ?>" alt="<?= esc($blog->judul_blog) ?>" class="w-full h-full object-cover">
                </div>
                <div class="text-[8.5px] text-gray-500 uppercase font-bold tracking-wider mb-2.5"><?= esc($blog->kategori_produk) ?></div>
                <h2 class="text-[16px] font-bold text-slate-900 leading-snug" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">
                    <?= esc($blog->judul_blog) ?>
                </h2>
            </a>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <?= $pager->links('blog', 'blog_pagination') ?>

    </div>
</main>

<?= $this->endSection() ?>

<!-- Menginjeksi file JavaScript External khusus efek Parallax Blog -->
<?= $this->section('script') ?>
<script src="<?= base_url('js/blog.js') ?>"></script>
<?= $this->endSection() ?>