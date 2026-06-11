<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main class="pt-24 pb-20 bg-white min-h-[70vh]">
    <div class="max-w-[800px] mx-auto px-6">
        
        <!-- Header -->
        <div class="text-center mb-12">
            <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest block mb-2">
                <a href="<?= base_url('/') ?>" class="text-[#A68A64] hover:underline">HOME</a> / ORDER RECEIVED
            </span>
            <h1 class="text-4xl md:text-[44px] font-bold text-slate-900" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Checkout</h1>
        </div>

        <!-- Success Message -->
        <div class="bg-[#f5f5f5] text-slate-600 px-6 py-4 mb-8 text-[13px] flex items-center gap-3">
            <span class="material-symbols-outlined text-[18px]">notifications</span>
            Thank you. Your order has been received.
        </div>

        <!-- Order Summary Grid -->
        <div class="grid grid-cols-2 gap-y-6 gap-x-8 mb-12 border-b border-gray-100 pb-8 text-[13px]">
            <div>
                <span class="block text-slate-500 mb-1">Order number:</span>
                <strong class="text-slate-900"><?= esc($order['order_number']) ?></strong>
            </div>
            <div>
                <span class="block text-slate-500 mb-1">Date:</span>
                <strong class="text-slate-900"><?= esc($order['date']) ?></strong>
            </div>
            <div>
                <span class="block text-slate-500 mb-1">Total:</span>
                <strong class="text-slate-900">Rp<?= number_format($order['total'], 0, ',', '.') ?></strong>
            </div>
            <div>
                <span class="block text-slate-500 mb-1">Payment method:</span>
                <strong class="text-slate-900"><?= esc($order['payment_method']) ?></strong>
            </div>
        </div>

        <!-- Table of Contents -->
        <div class="border border-gray-200 p-4 mb-8 bg-[#fdfdfd] inline-block pr-12 relative">
            <div class="flex items-center justify-between mb-2">
                <span class="font-bold text-slate-800 text-[14px]">Table of Contents</span>
                <div class="absolute right-4 top-4 border border-gray-300 rounded p-0.5 cursor-pointer text-gray-500 hover:text-gray-800">
                    <span class="material-symbols-outlined text-[16px]">menu_open</span>
                </div>
            </div>
            <ol class="text-[12px] text-slate-700 space-y-1">
                <li>1. Our bank details
                    <ol class="ml-4 mt-1 space-y-1 text-gray-500">
                        <li>1.1. Muhammad Rizal Fahlepy:</li>
                        <li>1.2. Muhammad Rizal Fahlepy:</li>
                        <li>1.3. Muhammad Rizal Fahlevy:</li>
                    </ol>
                </li>
                <li>2. Order details</li>
                <li>3. Billing address</li>
            </ol>
        </div>

        <!-- Bank Details -->
        <h2 class="text-[18px] font-bold text-slate-900 mb-6" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Our bank details</h2>
        
        <h3 class="text-[22px] font-bold text-slate-900 mb-4" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Muhammad Rizal Fahlepy:</h3>
        <ul class="list-disc pl-5 text-[13px] text-slate-700 mb-8 space-y-1">
            <li>Bank: <strong>BCA</strong></li>
            <li>Account number: <strong>7893014821</strong></li>
        </ul>

        <h3 class="text-[22px] font-bold text-slate-900 mb-4" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Muhammad Rizal Fahlepy:</h3>
        <ul class="list-disc pl-5 text-[13px] text-slate-700 mb-8 space-y-1">
            <li>Bank: <strong>BNI</strong></li>
            <li>Account number: <strong>0715600610</strong></li>
        </ul>

        <h3 class="text-[22px] font-bold text-slate-900 mb-4" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Muhammad Rizal Fahlevy:</h3>
        <ul class="list-disc pl-5 text-[13px] text-slate-700 mb-12 space-y-1">
            <li>Bank: <strong>BRI</strong></li>
            <li>Account number: <strong>358201033033534</strong></li>
        </ul>

        <!-- Order Details Table -->
        <h2 class="text-[18px] font-bold text-slate-900 mb-6" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Order details</h2>
        <div class="mb-12">
            <div class="flex justify-between items-center pb-4 border-b border-gray-200 text-[13px] font-bold text-slate-900 mb-4">
                <span>Product</span>
                <span>Total</span>
            </div>

            <?php foreach($order['items'] as $item): ?>
            <div class="flex justify-between items-start py-3 border-b border-gray-100 text-[13px]">
                <span class="text-slate-600 pr-4 leading-relaxed">
                    <?= esc($item['name']) ?> <strong class="text-slate-900 ml-1">× <?= $item['qty'] ?></strong>
                </span>
                <span class="text-slate-600 whitespace-nowrap">Rp<?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?></span>
            </div>
            <?php endforeach; ?>
            
            <div class="flex justify-between items-center py-4 border-b border-gray-100 text-[13px]">
                <span class="font-bold text-slate-900">Subtotal:</span>
                <span class="text-slate-600">Rp<?= number_format($order['total'], 0, ',', '.') ?></span>
            </div>
            
            <div class="flex justify-between items-center py-4 border-b border-gray-100 text-[13px]">
                <span class="font-bold text-slate-900">Payment method:</span>
                <span class="text-slate-600"><?= esc($order['payment_method']) ?></span>
            </div>

            <div class="flex justify-between items-center py-4 border-b border-gray-200 text-[13px] mb-6">
                <span class="font-bold text-slate-900">Total:</span>
                <span class="font-bold text-slate-900">Rp<?= number_format($order['total'], 0, ',', '.') ?></span>
            </div>
        </div>

        <!-- Billing Address -->
        <h2 class="text-[18px] font-bold text-slate-900 mb-6" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Billing address</h2>
        
        <div class="border border-gray-100 p-8 bg-[#fafafa] text-[13px] text-slate-600 leading-relaxed max-w-[400px]">
            <?= esc($order['billing']['first_name'] ?? '') ?> <?= esc($order['billing']['last_name'] ?? '') ?><br>
            <?php if(!empty($order['billing']['company'])): ?>
                <?= esc($order['billing']['company']) ?><br>
            <?php endif; ?>
            <?= esc($order['billing']['address_1'] ?? '') ?><br>
            <?php if(!empty($order['billing']['address_2'])): ?>
                <?= esc($order['billing']['address_2']) ?><br>
            <?php endif; ?>
            <?= esc($order['billing']['city'] ?? '') ?><br>
            <?= esc($order['billing']['province'] ?? '') ?><br>
            <?= esc($order['billing']['postcode'] ?? '') ?><br>
            <?= esc($order['billing']['phone'] ?? '') ?><br><br>
            <?= esc($order['billing']['email'] ?? '') ?>
        </div>

    </div>
</main>

<?= $this->endSection() ?>
