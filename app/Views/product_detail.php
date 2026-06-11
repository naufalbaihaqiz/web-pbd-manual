<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main class="pt-24 pb-20 bg-[#fbfbfb] min-h-screen">
    <div class="max-w-[1000px] mx-auto px-6 md:px-16 flex flex-col md:flex-row gap-10">
        <!-- Image Section -->
        <div class="w-full md:w-1/2">
            <div class="aspect-square bg-white border border-gray-200 p-8 flex items-center justify-center relative">
                <?php if($produk->discount): ?>
                <div class="absolute top-4 left-4 z-10 bg-black text-white text-[10px] font-bold px-2 py-1 uppercase"><?= esc($produk->discount) ?></div>
                <?php endif; ?>
                <img src="<?= base_url('images/' . esc($produk->gambar_produk)) ?>" alt="<?= esc($produk->nama_produk) ?>" class="w-full h-full object-contain">
            </div>
        </div>

        <!-- Details Section -->
        <div class="w-full md:w-1/2 flex flex-col">
            <nav class="flex items-center gap-2 mb-4 text-[11px] font-bold text-gray-400 uppercase tracking-widest">
                <a class="hover:text-gray-900 transition-colors" href="<?= base_url('/') ?>">Home</a>
                <span>/</span>
                <a class="hover:text-gray-900 transition-colors" href="<?= base_url('products') ?>">Shop</a>
            </nav>
            
            <h1 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">
                <?= esc($produk->nama_produk) ?>
            </h1>
            
            <?php if($produk->harga_normal): ?>
            <div class="flex items-center gap-3 mb-6">
                <span class="text-gray-400 line-through text-lg"><?= esc($produk->harga_normal) ?></span>
                <span class="text-2xl font-bold text-slate-800"><?= esc($produk->harga_jual) ?></span>
            </div>
            <?php else: ?>
            <p class="text-2xl font-bold text-slate-800 mb-6"><?= esc($produk->harga_jual) ?></p>
            <?php endif; ?>
            
            <div class="text-gray-600 text-sm leading-relaxed mb-8">
                <p>Ini adalah halaman detail untuk produk/jasa <strong><?= esc($produk->nama_produk) ?></strong>. Anda dapat menambahkan deskripsi lengkap mengenai produk ini di database dan menampilkannya di sini.</p>
            </div>
            
            <div class="mt-auto">
                <?php if(session()->get('isLoggedIn')): ?>
                    <form action="<?= base_url('cart/add') ?>" method="POST" class="w-full">
                        <input type="hidden" name="id" value="<?= md5($produk->nama_produk) ?>">
                        <input type="hidden" name="name" value="<?= esc($produk->nama_produk) ?>">
                        <input type="hidden" name="price" value="<?= preg_replace('/[^0-9]/', '', $produk->harga_jual) ?>"> 
                        <input type="hidden" name="image" value="<?= esc($produk->gambar_produk) ?>">
                        <button type="submit" class="bg-[#a8977b] text-white px-10 py-4 font-bold hover:bg-[#8d7e66] transition-colors rounded-sm text-[13px] uppercase tracking-widest w-full text-center">
                            Add to cart
                        </button>
                    </form>
                <?php else: ?>
                    <button class="trigger-login bg-[#a8977b] text-white px-10 py-4 font-bold hover:bg-[#8d7e66] transition-colors rounded-sm text-[13px] uppercase tracking-widest w-full text-center">
                        Add to cart
                    </button>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</main>

<?= $this->endSection() ?>
