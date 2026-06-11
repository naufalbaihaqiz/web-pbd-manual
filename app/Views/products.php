<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main class="pt-24 pb-32 max-w-[1200px] mx-auto px-6 md:px-16 min-h-screen bg-white">
    <nav class="flex items-center gap-2 mb-8 text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] justify-center" style="font-family: 'Plus Jakarta Sans', sans-serif;">
        <a class="hover:text-black transition-colors" href="<?= base_url('/') ?>">Home</a>
        <span>/</span>
        <span class="text-black">Shop</span>
    </nav>
    
    <div class="text-center mb-16">
        <h1 class="text-5xl md:text-[64px] font-bold text-black uppercase tracking-widest" style="font-family: 'Merriweather', Georgia, serif;">Shop</h1>
        <div class="w-12 h-[2px] bg-black mt-6 mx-auto"></div>
    </div>
    
    <div class="flex flex-col md:flex-row justify-between items-center mb-16 border-b border-gray-200 pb-6 gap-6">
        <p class="text-[11px] font-bold text-gray-500 uppercase tracking-widest" style="font-family: 'Plus Jakarta Sans', sans-serif;">Showing all results</p>
        <div class="relative min-w-[250px]">
            <form action="<?= base_url('products') ?>" method="GET" id="sortForm">
                <?php $sort = $current_sort ?? 'default'; ?>
                <select name="sort" onchange="document.getElementById('sortForm').submit()" class="w-full appearance-none bg-transparent border border-black px-5 py-3 pr-10 text-black focus:outline-none focus:ring-1 focus:ring-black rounded-none text-xs font-bold uppercase tracking-widest cursor-pointer" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    <option value="default" <?= $sort == 'default' ? 'selected' : '' ?>>Default sorting</option>
                    <option value="popularity" <?= $sort == 'popularity' ? 'selected' : '' ?>>Sort by popularity</option>
                    <option value="latest" <?= $sort == 'latest' ? 'selected' : '' ?>>Sort by latest</option>
                    <option value="price_low" <?= $sort == 'price_low' ? 'selected' : '' ?>>Price: low to high</option>
                    <option value="price_high" <?= $sort == 'price_high' ? 'selected' : '' ?>>Price: high to low</option>
                </select>
            </form>
            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-black text-lg">expand_more</span>
        </div>
    </div>
    
    <div class="grid grid-cols-1 gap-x-10 gap-y-20 md:grid-cols-3">
        
        <?php 
        $prodBgColors = ['#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4'];
        foreach ($produk_jasa as $i => $p): 
            $pbg = $prodBgColors[$i % count($prodBgColors)];
        ?>
        <div class="flex flex-col items-center group relative z-10 hover:z-50 transition-all duration-500">
            <div class="w-full aspect-[4/5] mb-8 relative flex items-center justify-center bg-transparent">
                <div class="absolute inset-0 border border-gray-200 z-0" style="background-color: <?= $pbg ?>;"></div>
                
                <?php if($p->discount): ?>
                <span class="absolute top-0 left-0 -ml-3 -mt-3 bg-black text-white text-[10px] font-bold px-3 py-1.5 uppercase tracking-widest shadow-lg z-30" style="font-family: 'Plus Jakarta Sans', sans-serif;"><?= esc($p->discount) ?></span>
                <?php endif; ?>
                
                <a href="<?= base_url('products/detail/' . urlencode($p->nama_produk)) ?>" class="absolute inset-0 z-20 flex items-center justify-center">
                    <img alt="<?= esc($p->nama_produk) ?>" class="w-[115%] h-[115%] max-w-none object-cover grayscale group-hover:grayscale-0 transition-all duration-700 group-hover:scale-105 shadow-xl" src="<?= base_url('images/' . esc($p->gambar_produk)) ?>"/>
                </a>
            </div>
            
            <a href="<?= base_url('products/detail/' . urlencode($p->nama_produk)) ?>" class="block relative z-20 w-full">
                <h3 class="text-center font-bold mb-3 leading-snug text-lg text-black hover:text-gray-500 transition-colors line-clamp-2 px-2" title="<?= esc($p->nama_produk) ?>" style="font-family: 'Merriweather', Georgia, serif;">
                    <?= esc($p->nama_produk) ?>
                </h3>
            </a>
            
            <div class="text-[14px] text-gray-500 mb-6 font-medium tracking-wide relative z-20 flex items-center justify-center gap-2 w-full" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                <?php if($p->harga_normal): ?>
                    <span class="line-through text-gray-300"><?= esc($p->harga_normal) ?></span>
                    <span class="text-black font-bold"><?= esc($p->harga_jual) ?></span>
                <?php else: ?>
                    <span class="text-black font-bold"><?= esc($p->harga_jual) ?></span>
                <?php endif; ?>
            </div>
            
            <?php if(session()->get('isLoggedIn')): ?>
                <form action="<?= base_url('cart/add') ?>" method="POST" class="w-full text-center relative z-20">
                    <input type="hidden" name="id" value="<?= md5($p->nama_produk) ?>">
                    <input type="hidden" name="name" value="<?= esc($p->nama_produk) ?>">
                    <input type="hidden" name="price" value="<?= preg_replace('/[^0-9]/', '', $p->harga_jual) ?>"> 
                    <input type="hidden" name="image" value="<?= esc($p->gambar_produk) ?>">
                    <button type="submit" class="border border-black bg-black text-white px-8 py-3.5 text-xs font-bold transition-all w-3/4 mx-auto rounded-none uppercase tracking-widest hover:bg-white hover:text-black shadow-md" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        Add to cart
                    </button>
                </form>
            <?php else: ?>
                <button class="trigger-login border border-black bg-black text-white px-8 py-3.5 text-xs font-bold transition-all w-3/4 mx-auto rounded-none uppercase tracking-widest hover:bg-white hover:text-black shadow-md relative z-20" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    Add to cart
                </button>
            <?php endif; ?>

        </div>
        <?php endforeach; ?>
        
    </div>
    
    <div class="mt-20 flex justify-center">
        <?= $pager->links('produk', 'products_pagination') ?>
    </div>
</main>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('js/products.js') ?>"></script>
<?= $this->endSection() ?>