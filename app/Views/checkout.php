<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main class="pt-24 pb-32 bg-white min-h-[70vh]">
    <div class="max-w-[1200px] mx-auto px-6 md:px-16">
        
        <div class="text-center mb-16">
            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] block mb-4" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                <a href="<?= base_url('/') ?>" class="text-black hover:underline">HOME</a> / CHECKOUT
            </span>
            <h1 class="text-5xl md:text-[64px] font-bold text-black uppercase tracking-widest" style="font-family: 'Merriweather', Georgia, serif;">Checkout</h1>
            <div class="w-12 h-[2px] bg-black mt-6 mx-auto"></div>
        </div>

        <div class="flex flex-col lg:flex-row gap-16">
            <div class="flex-1">
                <div class="border-2 border-black p-6 mb-12 bg-white inline-block pr-16 relative rounded-none">
                    <div class="flex items-center justify-between mb-4 border-b border-black pb-2">
                        <span class="font-bold text-black uppercase tracking-widest text-[11px]" style="font-family: 'Plus Jakarta Sans', sans-serif;">Table of Contents</span>
                        <div class="absolute right-4 top-5 text-black">
                            <span class="material-symbols-outlined text-[20px]">menu_open</span>
                        </div>
                    </div>
                    <ol class="text-[12px] text-gray-500 space-y-2 font-bold uppercase tracking-wider" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <li class="hover:text-black cursor-pointer">1. Billing details</li>
                        <li class="hover:text-black cursor-pointer">2. Additional information</li>
                        <li class="hover:text-black cursor-pointer">3. Your order</li>
                    </ol>
                </div>

                <form action="<?= base_url('checkout/process') ?>" method="POST" id="checkout-form">
                    
                    <h2 class="text-[18px] font-bold text-black mb-8 uppercase tracking-widest border-b-2 border-black pb-4" style="font-family: 'Merriweather', Georgia, serif;">Billing details</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                        <div>
                            <label class="block text-[11px] font-bold text-black uppercase tracking-widest mb-3" style="font-family: 'Plus Jakarta Sans', sans-serif;">First name <span class="text-black">*</span></label>
                            <input type="text" name="first_name" required class="w-full h-[45px] px-4 border border-black outline-none focus:ring-0 focus:border-2 focus:border-black rounded-none bg-transparent text-[13px] font-bold text-black transition-none" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-black uppercase tracking-widest mb-3" style="font-family: 'Plus Jakarta Sans', sans-serif;">Last name <span class="text-black">*</span></label>
                            <input type="text" name="last_name" required class="w-full h-[45px] px-4 border border-black outline-none focus:ring-0 focus:border-2 focus:border-black rounded-none bg-transparent text-[13px] font-bold text-black transition-none" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[11px] font-bold text-black uppercase tracking-widest mb-3" style="font-family: 'Plus Jakarta Sans', sans-serif;">Company name <span class="text-gray-400 font-normal tracking-normal normal-case">(optional)</span></label>
                        <input type="text" name="company" class="w-full h-[45px] px-4 border border-black outline-none focus:ring-0 focus:border-2 focus:border-black rounded-none bg-transparent text-[13px] font-bold text-black transition-none" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    </div>

                    <div class="mb-5">
                        <label class="block text-[11px] font-bold text-black uppercase tracking-widest mb-3" style="font-family: 'Plus Jakarta Sans', sans-serif;">Country / Region <span class="text-black">*</span></label>
                        <div class="relative">
                            <select name="country" required class="w-full h-[45px] px-4 border border-black outline-none focus:ring-0 focus:border-2 focus:border-black rounded-none bg-transparent text-[13px] font-bold text-black uppercase tracking-widest appearance-none transition-none cursor-pointer" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                <option value="Indonesia">Indonesia</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-black pointer-events-none">expand_more</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[11px] font-bold text-black uppercase tracking-widest mb-3" style="font-family: 'Plus Jakarta Sans', sans-serif;">Street address <span class="text-black">*</span></label>
                        <input type="text" name="address_1" placeholder="HOUSE NUMBER AND STREET NAME" required class="w-full h-[45px] px-4 border border-black outline-none focus:ring-0 focus:border-2 focus:border-black rounded-none bg-transparent text-[11px] font-bold text-black uppercase tracking-widest placeholder-gray-400 transition-none mb-4" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <input type="text" name="address_2" placeholder="APARTMENT, SUITE, UNIT, ETC. (OPTIONAL)" class="w-full h-[45px] px-4 border border-black outline-none focus:ring-0 focus:border-2 focus:border-black rounded-none bg-transparent text-[11px] font-bold text-black uppercase tracking-widest placeholder-gray-400 transition-none" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    </div>

                    <div class="mb-5">
                        <label class="block text-[11px] font-bold text-black uppercase tracking-widest mb-3" style="font-family: 'Plus Jakarta Sans', sans-serif;">Town / City <span class="text-black">*</span></label>
                        <input type="text" name="city" required class="w-full h-[45px] px-4 border border-black outline-none focus:ring-0 focus:border-2 focus:border-black rounded-none bg-transparent text-[13px] font-bold text-black transition-none" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    </div>

                    <div class="mb-5">
                        <label class="block text-[11px] font-bold text-black uppercase tracking-widest mb-3" style="font-family: 'Plus Jakarta Sans', sans-serif;">Province <span class="text-black">*</span></label>
                        <div class="relative">
                            <select name="province" required class="w-full h-[45px] px-4 border border-black outline-none focus:ring-0 focus:border-2 focus:border-black rounded-none bg-transparent text-[11px] font-bold text-black uppercase tracking-widest appearance-none transition-none cursor-pointer" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                                <option value="DKI Jakarta">DKI Jakarta</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-black pointer-events-none">expand_more</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[11px] font-bold text-black uppercase tracking-widest mb-3" style="font-family: 'Plus Jakarta Sans', sans-serif;">Postcode / ZIP <span class="text-black">*</span></label>
                        <input type="text" name="postcode" required class="w-full h-[45px] px-4 border border-black outline-none focus:ring-0 focus:border-2 focus:border-black rounded-none bg-transparent text-[13px] font-bold text-black transition-none" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    </div>

                    <div class="mb-5">
                        <label class="block text-[11px] font-bold text-black uppercase tracking-widest mb-3" style="font-family: 'Plus Jakarta Sans', sans-serif;">Phone <span class="text-black">*</span></label>
                        <input type="text" name="phone" required class="w-full h-[45px] px-4 border border-black outline-none focus:ring-0 focus:border-2 focus:border-black rounded-none bg-transparent text-[13px] font-bold text-black transition-none" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    </div>

                    <div class="mb-8">
                        <label class="block text-[11px] font-bold text-black uppercase tracking-widest mb-3" style="font-family: 'Plus Jakarta Sans', sans-serif;">Email address <span class="text-black">*</span></label>
                        <input type="email" name="email" required class="w-full h-[45px] px-4 border border-black outline-none focus:ring-0 focus:border-2 focus:border-black rounded-none bg-transparent text-[13px] font-bold text-black transition-none" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    </div>

                    <div class="mb-14 flex items-center gap-3">
                        <input type="checkbox" id="create_account" name="create_account" class="w-4 h-4 border-black text-black focus:ring-0 rounded-none bg-transparent transition-none">
                        <label for="create_account" class="text-[11px] font-bold text-black uppercase tracking-widest cursor-pointer" style="font-family: 'Plus Jakarta Sans', sans-serif;">Create an account?</label>
                    </div>

                    <h2 class="text-[18px] font-bold text-black mb-8 uppercase tracking-widest border-b-2 border-black pb-4" style="font-family: 'Merriweather', Georgia, serif;">Additional information</h2>
                    
                    <div class="mb-4">
                        <label class="block text-[11px] font-bold text-black uppercase tracking-widest mb-3" style="font-family: 'Plus Jakarta Sans', sans-serif;">Order notes <span class="text-gray-400 font-normal tracking-normal normal-case">(optional)</span></label>
                        <textarea name="order_notes" placeholder="NOTES ABOUT YOUR ORDER, E.G. SPECIAL NOTES FOR DELIVERY." class="w-full h-[120px] p-4 border border-black outline-none focus:ring-0 focus:border-2 focus:border-black rounded-none bg-transparent text-[11px] font-bold text-black uppercase tracking-widest placeholder-gray-400 transition-none resize-y" style="font-family: 'Plus Jakarta Sans', sans-serif;"></textarea>
                    </div>

                </form>
            </div>

            <div class="w-full lg:w-[450px] flex-shrink-0">
                <div class="border-2 border-black p-8 bg-white rounded-none">
                    <h2 class="text-[18px] font-bold text-black mb-8 uppercase tracking-widest border-b-2 border-black pb-4" style="font-family: 'Merriweather', Georgia, serif;">Your order</h2>
                    
                    <div class="flex justify-between items-center pb-4 border-b-2 border-black text-[11px] font-bold text-black uppercase tracking-widest mb-4" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <span>Product</span>
                        <span>Subtotal</span>
                    </div>

                    <?php foreach($cart as $item): ?>
                    <div class="flex justify-between items-start py-4 border-b border-gray-200 text-[13px]" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <span class="text-gray-600 pr-4 leading-relaxed font-medium">
                            <?= esc($item['name']) ?> <strong class="text-black ml-2">× <?= $item['qty'] ?></strong>
                        </span>
                        <span class="text-black font-bold whitespace-nowrap">Rp<?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?></span>
                    </div>
                    <?php endforeach; ?>
                    
                    <div class="flex justify-between items-center py-5 border-b border-gray-200 text-[13px]" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <span class="font-bold text-black uppercase tracking-wider text-[11px]">Subtotal</span>
                        <span class="text-gray-600 font-bold">Rp<?= number_format($total, 0, ',', '.') ?></span>
                    </div>
                    
                    <div class="flex justify-between items-center py-6 text-[13px] mb-8" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <span class="font-bold text-black uppercase tracking-wider text-[12px]">Total</span>
                        <span class="font-black text-black text-[18px]">Rp<?= number_format($total, 0, ',', '.') ?></span>
                    </div>

                    <div class="border border-black p-5 mb-8 text-[13px] rounded-none bg-gray-50">
                        <div class="flex items-center gap-3 mb-4">
                            <input type="radio" id="bank_transfer" name="payment_method" value="bank_transfer" checked class="text-black focus:ring-0 border-black bg-transparent transition-none">
                            <label for="bank_transfer" class="font-bold text-black uppercase tracking-widest text-[11px] cursor-pointer" style="font-family: 'Plus Jakarta Sans', sans-serif;">Direct bank transfer</label>
                        </div>
                        <div class="text-gray-500 bg-white border border-gray-200 p-4 text-[12px] leading-relaxed relative rounded-none" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            <span class="relative z-10 font-medium">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</span>
                        </div>
                    </div>

                    <div class="text-[11px] font-bold text-gray-500 leading-relaxed mb-8 uppercase tracking-wider" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#" class="text-black hover:underline border-b border-black pb-0.5">privacy policy</a>.
                    </div>

                    <button type="submit" form="checkout-form" class="w-full bg-black text-white h-[50px] text-[11px] font-bold hover:bg-white hover:text-black transition-none shadow-none uppercase tracking-widest border-2 border-black rounded-none" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        Place order
                    </button>
                </div>
            </div>
        </div>
        
    </div>
</main>

<?= $this->endSection() ?>