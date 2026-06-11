<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main class="pt-24 pb-20 bg-white min-h-[70vh]">
    <div class="max-w-[1100px] mx-auto px-6 md:px-16">
        
        <div class="text-center mb-16">
            <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest block mb-2">
                <a href="<?= base_url('/') ?>" class="text-[#A68A64] hover:underline">HOME</a> / CART
            </span>
            <h1 class="text-4xl md:text-[44px] font-bold text-slate-900" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Cart</h1>
        </div>

        <?php if(empty($cart)): ?>
            <div class="text-center py-12">
                <span class="material-symbols-outlined text-6xl text-gray-300 mb-4">shopping_cart</span>
                <h2 class="text-2xl font-bold text-slate-700 mb-4">Keranjang Anda masih kosong.</h2>
                <a href="<?= base_url('products') ?>" class="inline-block bg-[#B49E78] text-white px-8 py-3 font-bold text-sm uppercase tracking-widest hover:bg-[#a38f6c] transition-colors">
                    Kembali Belanja
                </a>
            </div>
        <?php else: ?>

        <div class="flex flex-col lg:flex-row gap-10">
            <div class="flex-1">
                <form action="<?= base_url('cart/update') ?>" method="POST">
                <div class="hidden md:grid grid-cols-12 gap-4 pb-4 border-b border-gray-100 text-[13px] font-bold text-slate-900">
                    <div class="col-span-7">Product</div>
                    <div class="col-span-2 text-center">Quantity</div>
                    <div class="col-span-3 text-right pr-4">Subtotal</div>
                </div>

                <?php foreach($cart as $id => $item): ?>
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 py-6 border-b border-gray-200 items-center">
                    <div class="col-span-12 md:col-span-7 flex items-center gap-6">
                        <div class="w-[80px] h-[80px] bg-gray-100 flex-shrink-0">
                            <img src="<?= base_url('images/' . $item['image']) ?>" alt="<?= $item['name'] ?>" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="text-[14px] font-bold text-slate-900 mb-1 leading-snug"><?= $item['name'] ?></h3>
                            <div class="text-[13px] text-slate-600">Rp<?= number_format($item['price'], 0, ',', '.') ?></div>
                        </div>
                    </div>
                    
                    <div class="col-span-6 md:col-span-2 flex items-center justify-start md:justify-center mt-4 md:mt-0">
                        <div class="flex items-center border border-[#e5e5e5] w-[90px] h-[40px]">
                            <button type="button" onclick="this.nextElementSibling.value = Math.max(1, parseInt(this.nextElementSibling.value) - 1)" class="w-8 h-full flex items-center justify-center text-gray-500 hover:text-black hover:bg-gray-50 transition-colors">-</button>
                            <input type="text" name="qty[<?= $id ?>]" value="<?= $item['qty'] ?>" class="w-full h-full text-center text-[13px] border-none outline-none font-medium text-slate-900" readonly>
                            <button type="button" onclick="this.previousElementSibling.value = parseInt(this.previousElementSibling.value) + 1" class="w-8 h-full flex items-center justify-center text-gray-500 hover:text-black hover:bg-gray-50 transition-colors">+</button>
                        </div>
                    </div>
                    
                    <div class="col-span-6 md:col-span-3 flex items-center justify-between md:justify-end mt-4 md:mt-0 pr-0 md:pr-4">
                        <span class="md:hidden text-[13px] font-bold">Subtotal: </span>
                        <div class="flex items-center gap-6">
                            <span class="text-[14px] text-slate-600 font-semibold">Rp<?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?></span>
                            <a href="<?= base_url('cart/remove/' . $id) ?>" class="text-gray-400 hover:text-red-500 transition-colors" title="Hapus Produk">
                                <span class="material-symbols-outlined text-[18px]">delete</span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-8">
                    
                    <div class="flex items-center gap-2 w-full sm:w-auto">
                        <input type="text" name="coupon_code" value="<?= esc($applied_coupon ?? '') ?>" placeholder="Coupon code" <?= !empty($applied_coupon) ? 'readonly' : '' ?> class="w-full sm:w-[180px] h-[40px] px-4 border <?= !empty($applied_coupon) ? 'border-green-400 bg-green-50' : 'border-gray-200' ?> text-[13px] outline-none focus:border-gray-400 transition-colors uppercase">
                        
                        <?php if(!empty($applied_coupon)): ?>
                            <button type="submit" formaction="<?= base_url('cart/remove_coupon') ?>" class="bg-red-500 text-white px-6 h-[40px] text-[13px] font-bold hover:bg-red-600 transition-colors whitespace-nowrap shadow-sm">
                                Remove
                            </button>
                        <?php else: ?>
                            <button type="submit" formaction="<?= base_url('cart/apply_coupon') ?>" class="bg-[#B49E78] text-white px-6 h-[40px] text-[13px] font-bold hover:bg-[#a38f6c] transition-colors whitespace-nowrap shadow-sm">
                                Apply coupon
                            </button>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit" class="w-full sm:w-auto bg-[#e8e8e8] text-slate-500 px-6 h-[40px] text-[13px] font-bold hover:bg-[#d5d5d5] hover:text-slate-900 transition-colors whitespace-nowrap">
                        Update cart
                    </button>
                </div>
                </form>
            </div>

            <div class="w-full lg:w-[350px] flex-shrink-0">
                <div class="border border-gray-200 p-8 shadow-sm bg-[#fafafa]">
                    <h2 class="text-[16px] font-bold text-slate-900 mb-6" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Cart totals</h2>
                    
                    <div class="flex justify-between items-center py-4 border-b border-gray-200 border-dotted text-[13px]">
                        <span class="font-bold text-slate-900">Subtotal</span>
                        <span class="text-slate-600">Rp<?= number_format($subtotal ?? 0, 0, ',', '.') ?></span>
                    </div>

                    <?php if(isset($discount) && $discount > 0): ?>
                    <div class="flex justify-between items-center py-4 border-b border-gray-200 border-dotted text-[13px] text-green-600">
                        <span class="font-bold">Discount (<?= esc($applied_coupon) ?>)</span>
                        <span class="font-semibold">-Rp<?= number_format($discount, 0, ',', '.') ?></span>
                    </div>
                    <?php endif; ?>
                    
                    <div class="flex justify-between items-center py-4 text-[13px] mb-6">
                        <span class="font-bold text-slate-900">Total</span>
                        <span class="font-bold text-[#B49E78] text-[15px]">Rp<?= number_format($total ?? 0, 0, ',', '.') ?></span>
                    </div>

                    <a href="<?= base_url('cart/checkout') ?>" class="w-full flex items-center justify-center bg-[#B49E78] text-white h-[45px] text-[13px] font-bold hover:bg-[#a38f6c] transition-colors shadow-sm">
                        Proceed to checkout
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