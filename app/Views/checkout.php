<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main class="pt-24 pb-20 bg-white min-h-[70vh]">
    <div class="max-w-[1200px] mx-auto px-6 md:px-16">
        
        <!-- Header -->
        <div class="text-center mb-16">
            <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest block mb-2">
                <a href="<?= base_url('/') ?>" class="text-[#A68A64] hover:underline">HOME</a> / CHECKOUT
            </span>
            <h1 class="text-4xl md:text-[44px] font-bold text-slate-900" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Checkout</h1>
        </div>

        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Left Column: Billing Details -->
            <div class="flex-1">
                <!-- Table of Contents -->
                <div class="border border-gray-200 p-4 mb-8 bg-[#fdfdfd] inline-block pr-12 relative">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-bold text-slate-800 text-[14px]">Table of Contents</span>
                        <div class="absolute right-4 top-4 border border-gray-300 rounded p-0.5 cursor-pointer text-gray-500 hover:text-gray-800">
                            <span class="material-symbols-outlined text-[16px]">menu_open</span>
                        </div>
                    </div>
                    <ol class="text-[12px] text-slate-700 space-y-1">
                        <li>1. Billing details</li>
                        <li>2. Additional information</li>
                        <li>3. Your order</li>
                    </ol>
                </div>

                <form action="<?= base_url('checkout/process') ?>" method="POST" id="checkout-form">
                    
                    <h2 class="text-[18px] font-bold text-slate-900 mb-6" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Billing details</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                        <div>
                            <label class="block text-[13px] font-medium text-slate-700 mb-2">First name <span class="text-red-500">*</span></label>
                            <input type="text" name="first_name" required class="w-full h-[45px] px-4 border border-gray-200 outline-none focus:border-gray-400 transition-colors">
                        </div>
                        <div>
                            <label class="block text-[13px] font-medium text-slate-700 mb-2">Last name <span class="text-red-500">*</span></label>
                            <input type="text" name="last_name" required class="w-full h-[45px] px-4 border border-gray-200 outline-none focus:border-gray-400 transition-colors">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-[13px] font-medium text-slate-700 mb-2">Company name (optional)</label>
                        <input type="text" name="company" class="w-full h-[45px] px-4 border border-gray-200 outline-none focus:border-gray-400 transition-colors">
                    </div>

                    <div class="mb-4">
                        <label class="block text-[13px] font-medium text-slate-700 mb-2">Country / Region <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <select name="country" required class="w-full h-[45px] px-4 border border-gray-200 outline-none focus:border-gray-400 transition-colors appearance-none bg-transparent">
                                <option value="Indonesia">Indonesia</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">expand_more</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-[13px] font-medium text-slate-700 mb-2">Street address <span class="text-red-500">*</span></label>
                        <input type="text" name="address_1" placeholder="House number and street name" required class="w-full h-[45px] px-4 border border-gray-200 outline-none focus:border-gray-400 transition-colors mb-3">
                        <input type="text" name="address_2" placeholder="Apartment, suite, unit, etc. (optional)" class="w-full h-[45px] px-4 border border-gray-200 outline-none focus:border-gray-400 transition-colors">
                    </div>

                    <div class="mb-4">
                        <label class="block text-[13px] font-medium text-slate-700 mb-2">Town / City <span class="text-red-500">*</span></label>
                        <input type="text" name="city" required class="w-full h-[45px] px-4 border border-gray-200 outline-none focus:border-gray-400 transition-colors">
                    </div>

                    <div class="mb-4">
                        <label class="block text-[13px] font-medium text-slate-700 mb-2">Province <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <select name="province" required class="w-full h-[45px] px-4 border border-gray-200 outline-none focus:border-gray-400 transition-colors appearance-none bg-transparent">
                                <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                                <option value="DKI Jakarta">DKI Jakarta</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">expand_more</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-[13px] font-medium text-slate-700 mb-2">Postcode / ZIP <span class="text-red-500">*</span></label>
                        <input type="text" name="postcode" required class="w-full h-[45px] px-4 border border-gray-200 outline-none focus:border-gray-400 transition-colors">
                    </div>

                    <div class="mb-4">
                        <label class="block text-[13px] font-medium text-slate-700 mb-2">Phone <span class="text-red-500">*</span></label>
                        <input type="text" name="phone" required class="w-full h-[45px] px-4 border border-gray-200 outline-none focus:border-gray-400 transition-colors">
                    </div>

                    <div class="mb-6">
                        <label class="block text-[13px] font-medium text-slate-700 mb-2">Email address <span class="text-red-500">*</span></label>
                        <input type="email" name="email" required class="w-full h-[45px] px-4 border border-gray-200 outline-none focus:border-gray-400 transition-colors">
                    </div>

                    <div class="mb-10 flex items-center gap-2">
                        <input type="checkbox" id="create_account" name="create_account" class="w-4 h-4 border-gray-300 text-[#B49E78] focus:ring-[#B49E78]">
                        <label for="create_account" class="text-[13px] text-slate-700 cursor-pointer">Create an account?</label>
                    </div>

                    <h2 class="text-[18px] font-bold text-slate-900 mb-6" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Additional information</h2>
                    
                    <div class="mb-4">
                        <label class="block text-[13px] font-medium text-slate-700 mb-2">Order notes (optional)</label>
                        <textarea name="order_notes" placeholder="Notes about your order, e.g. special notes for delivery." class="w-full h-[120px] p-4 border border-gray-200 outline-none focus:border-gray-400 transition-colors resize-y"></textarea>
                    </div>

                </form>
            </div>

            <!-- Right Column: Your Order -->
            <div class="w-full lg:w-[450px] flex-shrink-0">
                <div class="border border-gray-200 p-8 shadow-sm bg-[#fafafa]">
                    <h2 class="text-[18px] font-bold text-slate-900 mb-6" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Your order</h2>
                    
                    <div class="flex justify-between items-center pb-4 border-b border-gray-200 text-[13px] font-bold text-slate-900 mb-4">
                        <span>Product</span>
                        <span>Subtotal</span>
                    </div>

                    <?php foreach($cart as $item): ?>
                    <div class="flex justify-between items-start py-3 border-b border-gray-100 text-[13px]">
                        <span class="text-slate-600 pr-4 leading-relaxed">
                            <?= esc($item['name']) ?> <strong class="text-slate-900 ml-1">× <?= $item['qty'] ?></strong>
                        </span>
                        <span class="text-slate-600 whitespace-nowrap">Rp<?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?></span>
                    </div>
                    <?php endforeach; ?>
                    
                    <div class="flex justify-between items-center py-4 border-b border-gray-100 text-[13px]">
                        <span class="font-bold text-slate-900">Subtotal</span>
                        <span class="text-slate-600">Rp<?= number_format($total, 0, ',', '.') ?></span>
                    </div>
                    
                    <div class="flex justify-between items-center py-4 border-b border-gray-200 text-[13px] mb-6">
                        <span class="font-bold text-slate-900">Total</span>
                        <span class="font-bold text-slate-900 text-[14px]">Rp<?= number_format($total, 0, ',', '.') ?></span>
                    </div>

                    <div class="bg-white border border-gray-200 p-5 mb-6 text-[13px]">
                        <div class="flex items-center gap-2 mb-3">
                            <input type="radio" id="bank_transfer" name="payment_method" value="bank_transfer" checked class="text-[#B49E78] focus:ring-[#B49E78]">
                            <label for="bank_transfer" class="font-bold text-slate-900 cursor-pointer">Direct bank transfer</label>
                        </div>
                        <div class="text-slate-500 bg-[#f9f9f9] p-4 text-[12px] leading-relaxed relative">
                            <!-- A subtle top arrow pointing to the radio button -->
                            <div class="absolute -top-2 left-4 w-4 h-4 bg-[#f9f9f9] transform rotate-45"></div>
                            <span class="relative z-10">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</span>
                        </div>
                    </div>

                    <div class="text-[12.5px] text-slate-500 leading-relaxed mb-6">
                        Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#" class="text-[#A68A64] hover:underline">privacy policy</a>.
                    </div>

                    <button type="submit" form="checkout-form" class="w-full bg-[#B49E78] text-white h-[48px] text-[14px] font-bold hover:bg-[#a38f6c] transition-colors shadow-sm">
                        Place order
                    </button>
                </div>
            </div>
        </div>
        
    </div>
</main>

<?= $this->endSection() ?>
