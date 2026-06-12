<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main class="pt-24 pb-32 bg-white min-h-[70vh]">
    <div class="max-w-[1100px] mx-auto px-6 md:px-16">
        
        <div class="text-center mb-16">
            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] block mb-4" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                <a href="<?= base_url('/') ?>" class="text-black hover:underline">HOME</a> / CART
            </span>
            <h1 class="text-5xl md:text-[64px] font-bold text-black uppercase tracking-widest" style="font-family: 'Merriweather', Georgia, serif;">Cart</h1>
            <div class="w-12 h-[2px] bg-black mt-6 mx-auto"></div>
        </div>

        <?php if(empty($cart)): ?>
            <div class="text-center py-16 border border-gray-200">
                <span class="material-symbols-outlined text-6xl text-gray-300 mb-6 block">shopping_bag</span>
                <h2 class="text-xl font-bold text-black mb-8 uppercase tracking-widest" style="font-family: 'Merriweather', Georgia, serif;">Keranjang Anda Masih Kosong</h2>
                <a href="<?= base_url('products') ?>" class="inline-block bg-black text-white px-10 py-4 font-bold text-xs uppercase tracking-widest hover:bg-gray-800 rounded-none" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    Kembali Belanja
                </a>
            </div>
        <?php else: ?>

        <div class="flex flex-col lg:flex-row gap-12">
            <div class="flex-1">
                <form action="<?= base_url('cart/update') ?>" method="POST">
                <div class="hidden md:grid grid-cols-12 gap-4 pb-4 border-b-2 border-black text-[11px] font-bold text-black uppercase tracking-widest" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    <div class="col-span-7">Product</div>
                    <div class="col-span-2 text-center">Quantity</div>
                    <div class="col-span-3 text-right pr-4">Subtotal</div>
                </div>

                <?php foreach($cart as $id => $item): ?>
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 py-6 border-b border-gray-200 items-center">
                    <div class="col-span-12 md:col-span-7 flex items-center gap-6">
                        <div class="w-[90px] h-[90px] bg-gray-100 flex-shrink-0 border border-gray-200 rounded-none p-1">
                            <img src="<?= base_url('images/' . $item['image']) ?>" alt="<?= $item['name'] ?>" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="text-[15px] font-bold text-black mb-2 leading-snug" style="font-family: 'Merriweather', Georgia, serif;"><?= $item['name'] ?></h3>
                            <div class="text-[13px] text-gray-500 font-medium" style="font-family: 'Plus Jakarta Sans', sans-serif;">Rp<?= number_format($item['price'], 0, ',', '.') ?></div>
                        </div>
                    </div>
                    
                    <div class="col-span-6 md:col-span-2 flex items-center justify-start md:justify-center mt-4 md:mt-0">
                        <div class="flex items-center border border-black w-[100px] h-[40px] rounded-none">
                            <button type="button" onclick="this.nextElementSibling.value = Math.max(1, parseInt(this.nextElementSibling.value) - 1)" class="w-10 h-full flex items-center justify-center text-black hover:bg-black hover:text-white text-lg font-light">-</button>
                            <input type="text" name="qty[<?= $id ?>]" value="<?= $item['qty'] ?>" class="w-full h-full text-center text-[13px] border-none outline-none focus:ring-0 font-bold text-black bg-transparent p-0" style="font-family: 'Plus Jakarta Sans', sans-serif;" readonly>
                            <button type="button" onclick="this.previousElementSibling.value = parseInt(this.previousElementSibling.value) + 1" class="w-10 h-full flex items-center justify-center text-black hover:bg-black hover:text-white text-lg font-light">+</button>
                        </div>
                    </div>
                    
                    <div class="col-span-6 md:col-span-3 flex items-center justify-between md:justify-end mt-4 md:mt-0 pr-0 md:pr-4">
                        <span class="md:hidden text-[11px] font-bold uppercase tracking-widest text-black" style="font-family: 'Plus Jakarta Sans', sans-serif;">Subtotal: </span>
                        <div class="flex items-center gap-6">
                            <span class="text-[14px] text-black font-bold" style="font-family: 'Plus Jakarta Sans', sans-serif;">Rp<?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?></span>
                            <a href="<?= base_url('cart/remove/' . $id) ?>" class="text-gray-400 hover:text-black" title="Hapus Produk">
                                <span class="material-symbols-outlined text-[20px]">close</span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-8">
                    
                    <div class="flex items-center gap-0 w-full sm:w-auto">
                        <input type="text" name="coupon_code" value="<?= esc($applied_coupon ?? '') ?>" placeholder="COUPON CODE" <?= !empty($applied_coupon) ? 'readonly' : '' ?> class="w-full sm:w-[200px] h-[45px] px-5 border <?= !empty($applied_coupon) ? 'border-black bg-gray-100 text-gray-500' : 'border-black text-black' ?> text-[11px] font-bold outline-none focus:ring-0 rounded-none uppercase tracking-widest placeholder-gray-400" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        
                        <?php if(!empty($applied_coupon)): ?>
                            <button type="submit" formaction="<?= base_url('cart/remove_coupon') ?>" class="bg-black text-white px-6 h-[45px] text-[11px] font-bold hover:bg-gray-800 whitespace-nowrap rounded-none uppercase tracking-widest border border-black" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                Remove
                            </button>
                        <?php else: ?>
                            <button type="submit" formaction="<?= base_url('cart/apply_coupon') ?>" class="bg-black text-white px-6 h-[45px] text-[11px] font-bold hover:bg-gray-800 whitespace-nowrap rounded-none uppercase tracking-widest border border-black" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                Apply
                            </button>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit" class="w-full sm:w-auto border border-black bg-white text-black px-8 h-[45px] text-[11px] font-bold hover:bg-black hover:text-white whitespace-nowrap rounded-none uppercase tracking-widest" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        Update Cart
                    </button>
                </div>
                </form>
            </div>

            <div class="w-full lg:w-[380px] flex-shrink-0">
                <div class="border-2 border-black p-8 bg-white rounded-none">
                    <h2 class="text-[18px] font-bold text-black mb-8 uppercase tracking-widest border-b-2 border-black pb-4" style="font-family: 'Merriweather', Georgia, serif;">Cart Totals</h2>
                    
                    <div class="flex justify-between items-center py-5 border-b border-gray-200 text-[13px]" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <span class="font-bold text-black uppercase tracking-wider text-[11px]">Subtotal</span>
                        <span class="text-gray-600 font-medium">Rp<?= number_format($subtotal ?? 0, 0, ',', '.') ?></span>
                    </div>

                    <?php if(isset($discount) && $discount > 0): ?>
                    <div class="flex justify-between items-center py-5 border-b border-gray-200 text-[13px] text-black" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <span class="font-bold uppercase tracking-wider text-[11px]">Discount</span>
                        <span class="font-bold">-Rp<?= number_format($discount, 0, ',', '.') ?></span>
                    </div>
                    <div class="text-[10px] text-gray-500 font-bold uppercase tracking-widest mt-2" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        Code: <?= esc($applied_coupon) ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="flex justify-between items-center py-6 text-[13px] mb-6" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <span class="font-bold text-black uppercase tracking-wider text-[12px]">Total</span>
                        <span class="font-black text-black text-[18px]">Rp<?= number_format($total ?? 0, 0, ',', '.') ?></span>
                    </div>

                    <a href="<?= base_url('cart/checkout') ?>" class="w-full flex items-center justify-center bg-black text-white h-[50px] text-[11px] font-bold hover:bg-gray-800 rounded-none uppercase tracking-widest border border-black" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
        
        <?php endif; ?>

    </div>
</main>

<?php if(session()->getFlashdata('coupon_error')): ?>
    <script>alert("<?= session()->getFlashdata('coupon_error') ?>");</script>
<?php endif; ?>

<?php if(session()->getFlashdata('coupon_success')): ?>
    <script>alert("<?= session()->getFlashdata('coupon_success') ?>");</script>
<?php endif; ?>

<?= $this->endSection() ?>