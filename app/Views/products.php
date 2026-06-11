<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main class="pt-24 pb-section-gap max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop min-h-screen">
    <nav class="flex items-center gap-2 mb-4 text-[11px] font-label-sm text-secondary uppercase tracking-widest justify-center">
        <a class="hover:text-primary transition-colors" href="<?= base_url('/') ?>">Home</a>
        <span>/</span>
        <span class="text-on-background">Shop</span>
    </nav>
    
    <h1 class="text-display-lg font-display-lg text-center mb-16 text-[64px]">Shop</h1>
    
    <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-4">
        <p class="text-[12px] font-label-md text-secondary uppercase tracking-widest">Showing all results</p>
        <div class="relative min-w-[220px]">
            <form action="<?= base_url('products') ?>" method="GET" id="sortForm">
                <?php $sort = $current_sort ?? 'default'; ?>
                <select name="sort" onchange="document.getElementById('sortForm').submit()" class="w-full appearance-none bg-transparent border border-outline-variant px-4 py-3 pr-10 font-label-md text-secondary focus:outline-none focus:border-primary rounded-sm text-sm cursor-pointer">
                    <option value="default" <?= $sort == 'default' ? 'selected' : '' ?>>Default sorting</option>
                    <option value="popularity" <?= $sort == 'popularity' ? 'selected' : '' ?>>Sort by popularity</option>
                    <option value="latest" <?= $sort == 'latest' ? 'selected' : '' ?>>Sort by latest</option>
                    <option value="price_low" <?= $sort == 'price_low' ? 'selected' : '' ?>>Sort by price: low to high</option>
                    <option value="price_high" <?= $sort == 'price_high' ? 'selected' : '' ?>>Sort by price: high to low</option>
                </select>
            </form>
            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-secondary text-lg">expand_more</span>
        </div>
    </div>
    
    <div class="grid grid-cols-1 gap-x-gutter gap-y-16 md:grid-cols-4">
        
        <?php foreach ($produk_jasa as $p): ?>
        <div class="flex flex-col items-center text-center group">
            <a href="<?= base_url('products/detail/' . urlencode($p->nama_produk)) ?>" class="relative w-full mb-6 overflow-hidden bg-surface-container-low aspect-[1.15] block">
                <?php if($p->discount): ?>
                <div class="absolute top-4 left-4 z-10 bg-black text-white text-[10px] font-bold px-2 py-1 uppercase"><?= esc($p->discount) ?></div>
                <?php endif; ?>
                
                <img alt="<?= esc($p->nama_produk) ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="<?= base_url('images/' . esc($p->gambar_produk)) ?>"/>
            
            </a>
            <a href="<?= base_url('products/detail/' . urlencode($p->nama_produk)) ?>" class="block">
                <h3 class="text-headline-sm font-headline-sm mb-3 leading-tight text-[22px] px-2 hover:text-primary transition-colors cursor-pointer line-clamp-2" title="<?= esc($p->nama_produk) ?>">
                    <?= esc($p->nama_produk) ?>
                </h3>
            </a>
            
            <?php if($p->harga_normal): ?>
            <div class="flex items-center gap-2 mb-4">
                <span class="text-secondary-fixed-dim line-through text-body-md"><?= esc($p->harga_normal) ?></span>
                <span class="text-body-lg font-bold text-secondary"><?= esc($p->harga_jual) ?></span>
            </div>
            <?php else: ?>
            <p class="text-body-lg font-bold text-secondary mb-4"><?= esc($p->harga_jual) ?></p>
            <?php endif; ?>
            
            <?php if(session()->get('isLoggedIn')): ?>
                <form action="<?= base_url('cart/add') ?>" method="POST" class="w-full max-w-[200px]">
                    <input type="hidden" name="id" value="<?= md5($p->nama_produk) ?>">
                    <input type="hidden" name="name" value="<?= esc($p->nama_produk) ?>">
                    <input type="hidden" name="price" value="<?= preg_replace('/[^0-9]/', '', $p->harga_jual) ?>"> 
                    
                    <input type="hidden" name="image" value="<?= esc($p->gambar_produk) ?>">
                    
                    <button type="submit" class="bg-[#a8977b] text-white px-10 py-3 font-label-md hover:opacity-90 transition-opacity rounded-sm text-[12px] uppercase tracking-widest w-full">
                        Add to cart
                    </button>
                </form>
            <?php else: ?>
                <button class="trigger-login bg-[#a8977b] text-white px-10 py-3 font-label-md hover:opacity-90 transition-opacity rounded-sm text-[12px] uppercase tracking-widest w-full max-w-[200px]">
                    Add to cart
                </button>
            <?php endif; ?>

        </div>
        <?php endforeach; ?>
        
    </div>
    
    <?= $pager->links('produk', 'products_pagination') ?>
</main>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('js/products.js') ?>"></script>
<?= $this->endSection() ?>