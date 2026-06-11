<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main class="pt-24 pb-20 bg-white min-h-[70vh]">
    <div class="max-w-[1100px] mx-auto px-6 md:px-16">
        
        <div class="text-center mb-16">
            <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest block mb-2">
                <a href="<?= base_url('/') ?>" class="text-[#A68A64] hover:underline">HOME</a> / <?= strtoupper(str_replace('_', ' ', $tab == 'details' ? 'ACCOUNT DETAILS' : $tab)) ?>
            </span>
            <h1 class="text-4xl md:text-[44px] font-bold text-slate-900" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">My account</h1>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-sm">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 text-sm">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="flex flex-col md:flex-row gap-10">
            <!-- Sidebar -->
            <div class="w-full md:w-[250px] flex-shrink-0">
                <ul class="flex flex-col border border-gray-100 rounded-sm overflow-hidden text-[14px]">
                    <li>
                        <a href="<?= base_url('my-account') ?>" class="flex items-center gap-3 px-5 py-4 border-b border-gray-100 transition-colors <?= $tab == 'dashboard' ? 'bg-[#B49E78] text-white font-bold' : 'bg-white text-slate-700 hover:bg-gray-50' ?>">
                            <span class="material-symbols-outlined text-[20px]">grid_view</span>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('my-account/orders') ?>" class="flex items-center gap-3 px-5 py-4 border-b border-gray-100 transition-colors <?= $tab == 'orders' ? 'bg-[#B49E78] text-white font-bold' : 'bg-white text-slate-700 hover:bg-gray-50' ?>">
                            <span class="material-symbols-outlined text-[20px]">local_mall</span>
                            Orders
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('my-account/downloads') ?>" class="flex items-center gap-3 px-5 py-4 border-b border-gray-100 transition-colors <?= $tab == 'downloads' ? 'bg-[#B49E78] text-white font-bold' : 'bg-white text-slate-700 hover:bg-gray-50' ?>">
                            <span class="material-symbols-outlined text-[20px]">download</span>
                            Downloads
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('my-account/addresses') ?>" class="flex items-center gap-3 px-5 py-4 border-b border-gray-100 transition-colors <?= $tab == 'addresses' ? 'bg-[#B49E78] text-white font-bold' : 'bg-white text-slate-700 hover:bg-gray-50' ?>">
                            <span class="material-symbols-outlined text-[20px]">home</span>
                            Addresses
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('my-account/details') ?>" class="flex items-center gap-3 px-5 py-4 border-b border-gray-100 transition-colors <?= $tab == 'details' ? 'bg-[#B49E78] text-white font-bold' : 'bg-white text-slate-700 hover:bg-gray-50' ?>">
                            <span class="material-symbols-outlined text-[20px]">person</span>
                            Account details
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('auth/logout') ?>" class="flex items-center gap-3 px-5 py-4 transition-colors bg-white text-slate-700 hover:bg-gray-50">
                            <span class="material-symbols-outlined text-[20px]">logout</span>
                            Log out
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Content Area -->
            <div class="flex-1 text-[14px] text-slate-700">
                <?php if ($tab == 'dashboard'): ?>
                    <p class="mb-4">
                        Hello <strong><?= esc($name) ?></strong> (not <strong><?= esc($name) ?></strong>? <a href="<?= base_url('auth/logout') ?>" class="text-[#A68A64] hover:underline">Log out</a>)
                    </p>
                    <p class="leading-relaxed">
                        From your account dashboard you can view your <a href="<?= base_url('my-account/orders') ?>" class="text-[#A68A64] hover:underline">recent orders</a>, manage your <a href="<?= base_url('my-account/addresses') ?>" class="text-[#A68A64] hover:underline">shipping and billing addresses</a>, and <a href="<?= base_url('my-account/details') ?>" class="text-[#A68A64] hover:underline">edit your password and account details</a>.
                    </p>

                <?php elseif ($tab == 'orders'): ?>
                    <?php if (empty($orders)): ?>
                        <div class="bg-[#F8F9FA] border-t-2 border-[#A68A64] p-4 flex justify-between items-center text-[13px]">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-[#A68A64] text-[18px]">info</span>
                                No order has been made yet.
                            </div>
                            <a href="<?= base_url('products') ?>" class="bg-[#B49E78] text-white px-4 py-2 font-bold hover:bg-[#a38f6c] transition-colors">
                                Browse products
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="py-4 px-2 font-bold text-slate-900 w-[15%]">Order</th>
                                        <th class="py-4 px-2 font-bold text-slate-900 w-[25%]">Date</th>
                                        <th class="py-4 px-2 font-bold text-slate-900 w-[20%]">Status</th>
                                        <th class="py-4 px-2 font-bold text-slate-900 w-[25%]">Total</th>
                                        <th class="py-4 px-2 font-bold text-slate-900 w-[15%]">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $order): ?>
                                    <tr class="border-b border-dotted border-gray-300 text-[13px]">
                                        <td class="py-5 px-2 font-medium text-slate-700">#<?= esc($order['nomor_order']) ?></td>
                                        <td class="py-5 px-2 text-slate-600"><?= date('F j, Y', strtotime($order['tanggal_pembelian'])) ?></td>
                                        <td class="py-5 px-2 text-slate-600">On hold</td> <!-- Default text based on screenshot -->
                                        <td class="py-5 px-2 text-slate-600">Rp<?= number_format($order['total'], 0, ',', '.') ?> for <?= $order['item_count'] ?> item<?= $order['item_count'] > 1 ? 's' : '' ?></td>
                                        <td class="py-5 px-2">
                                            <a href="<?= base_url('my-account/view-order/' . esc($order['nomor_order'])) ?>" class="inline-block text-center w-full bg-[#B49E78] text-white px-4 py-2 font-bold hover:bg-[#a38f6c] transition-colors rounded-sm shadow-sm">View</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>

                <?php elseif ($tab == 'view_order'): ?>
                    <p class="mb-8 text-[14px]">
                        Order #<mark class="bg-transparent font-medium text-slate-800"><?= esc($order['nomor_order']) ?></mark> was placed on <mark class="bg-transparent font-medium text-slate-800"><?= date('F j, Y', strtotime($order['tanggal_pembelian'])) ?></mark> and is currently <mark class="bg-transparent font-medium text-slate-800">On hold</mark>.
                    </p>

                    <div class="border border-gray-200 rounded-sm p-4 w-fit mb-8 bg-gray-50/50">
                        <div class="flex items-center justify-between gap-4 mb-2">
                            <h3 class="font-bold text-slate-800 text-[15px]">Table of Contents</h3>
                            <span class="material-symbols-outlined text-gray-400 text-[18px]">list</span>
                        </div>
                        <ul class="text-[13px] text-slate-600 space-y-1">
                            <li>1. <a href="#order-details" class="hover:text-[#A68A64] hover:underline transition-colors">Order details</a></li>
                            <li>2. <a href="#billing-address" class="hover:text-[#A68A64] hover:underline transition-colors">Billing address</a></li>
                        </ul>
                    </div>

                    <h2 id="order-details" class="text-2xl font-bold text-slate-900 mb-4" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Order details</h2>
                    
                    <div class="mb-10">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th class="py-3 font-bold text-slate-900 w-[70%]">Product</th>
                                    <th class="py-3 font-bold text-slate-900 w-[30%]">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($details as $item): ?>
                                <tr class="border-b border-dotted border-gray-300 text-[13px]">
                                    <td class="py-4 text-slate-600 pr-4">
                                        <a href="#" class="text-[#A68A64] hover:underline"><?= esc($item['nama_produk']) ?></a>
                                        <strong class="text-slate-800 font-bold ml-1">× <?= esc($item['jumlah']) ?></strong>
                                    </td>
                                    <td class="py-4 text-slate-600">Rp<?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot class="text-[13px] text-slate-600 font-medium">
                                <tr class="border-b border-dotted border-gray-300">
                                    <td class="py-4 font-bold text-slate-800">Subtotal:</td>
                                    <td class="py-4">Rp<?= number_format($order['subtotal'], 0, ',', '.') ?></td>
                                </tr>
                                <tr class="border-b border-dotted border-gray-300">
                                    <td class="py-4 font-bold text-slate-800">Payment method:</td>
                                    <td class="py-4"><?= esc(ucwords(str_replace('_', ' ', $order['metode_pembayaran']))) ?></td>
                                </tr>
                                <tr>
                                    <td class="py-4 font-bold text-slate-800">Total:</td>
                                    <td class="py-4 text-slate-800 font-bold">Rp<?= number_format($order['total'], 0, ',', '.') ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <h2 id="billing-address" class="text-2xl font-bold text-slate-900 mb-6" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Billing address</h2>
                    
                    <div class="border border-gray-100 p-6 rounded-sm max-w-sm">
                        <?php if(!empty($order['jalan']) || !empty($order['kota'])): ?>
                            <address class="not-italic text-[13px] leading-relaxed text-gray-600">
                                <?php if(!empty($order['nama_depan'])): ?><?= esc($order['nama_depan'] . ' ' . $order['nama_belakang']) ?><br><?php endif; ?>
                                <?php if(!empty($order['company'])): ?><?= esc($order['company']) ?><br><?php endif; ?>
                                <?php if(!empty($order['jalan'])): ?><?= esc($order['jalan']) ?><br><?php endif; ?>
                                <?php if(!empty($order['detail_alamat'])): ?><?= esc($order['detail_alamat']) ?><br><?php endif; ?>
                                <?php if(!empty($order['kota'])): ?><?= esc($order['kota']) ?><br><?php endif; ?>
                                <?php if(!empty($order['provinsi'])): ?><?= esc($order['provinsi']) ?><br><?php endif; ?>
                                <?php if(!empty($order['kode_pos'])): ?><?= esc($order['kode_pos']) ?><br><?php endif; ?>
                                <?php if(!empty($order['country'])): ?><?= esc($order['country']) ?><br><?php endif; ?>
                                <?php if(!empty($order['no_telp'])): ?><?= esc($order['no_telp']) ?><br><?php endif; ?>
                                <br><?= esc($order['email_pengguna']) ?>
                            </address>
                        <?php else: ?>
                            <p class="text-[13px] italic text-gray-500">Billing address not set or recorded for this order.</p>
                        <?php endif; ?>
                    </div>

                <?php elseif ($tab == 'downloads'): ?>
                    <div class="bg-[#F8F9FA] border-t-2 border-[#A68A64] p-4 flex justify-between items-center text-[13px]">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-[#A68A64] text-[18px]">info</span>
                            No downloads available yet.
                        </div>
                        <a href="<?= base_url('products') ?>" class="bg-[#B49E78] text-white px-4 py-2 font-bold hover:bg-[#a38f6c] transition-colors">
                            Browse products
                        </a>
                    </div>

                <?php elseif ($tab == 'addresses'): ?>
                    <p class="mb-8">The following addresses will be used on the checkout page by default.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <!-- Billing Address -->
                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-xl font-bold text-slate-900" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Billing address</h3>
                                <a href="<?= base_url('my-account/edit-address/billing') ?>" class="text-[#A68A64] hover:underline text-[13px]"><?= empty($user['jalan']) ? 'Add' : 'Edit' ?></a>
                            </div>
                            
                            <?php if(!empty($user['jalan']) || !empty($user['kota'])): ?>
                                <address class="not-italic text-[13px] leading-relaxed text-gray-600">
                                    <?php if(!empty($user['nama_depan'])): ?><?= esc($user['nama_depan'] . ' ' . $user['nama_belakang']) ?><br><?php endif; ?>
                                    <?php if(!empty($user['company'])): ?><?= esc($user['company']) ?><br><?php endif; ?>
                                    <?php if(!empty($user['jalan'])): ?><?= esc($user['jalan']) ?><br><?php endif; ?>
                                    <?php if(!empty($user['detail_alamat'])): ?><?= esc($user['detail_alamat']) ?><br><?php endif; ?>
                                    <?php if(!empty($user['kota'])): ?><?= esc($user['kota']) ?>, <?= esc($user['provinsi']) ?> <?= esc($user['kode_pos']) ?><br><?php endif; ?>
                                    <?php if(!empty($user['country'])): ?><?= esc($user['country']) ?><br><?php endif; ?>
                                    <?php if(!empty($user['no_telp'])): ?><br><?= esc($user['no_telp']) ?><?php endif; ?>
                                </address>
                            <?php else: ?>
                                <p class="text-[13px] italic text-gray-500">You have not set up this type of address yet.</p>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Shipping Address -->
                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-xl font-bold text-slate-900" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Shipping address</h3>
                                <a href="<?= base_url('my-account/edit-address/shipping') ?>" class="text-[#A68A64] hover:underline text-[13px]"><?= empty($user['jalan']) ? 'Add' : 'Edit' ?></a>
                            </div>
                            <?php if(!empty($user['jalan']) || !empty($user['kota'])): ?>
                                <address class="not-italic text-[13px] leading-relaxed text-gray-600">
                                    <?php if(!empty($user['nama_depan'])): ?><?= esc($user['nama_depan'] . ' ' . $user['nama_belakang']) ?><br><?php endif; ?>
                                    <?php if(!empty($user['company'])): ?><?= esc($user['company']) ?><br><?php endif; ?>
                                    <?php if(!empty($user['jalan'])): ?><?= esc($user['jalan']) ?><br><?php endif; ?>
                                    <?php if(!empty($user['detail_alamat'])): ?><?= esc($user['detail_alamat']) ?><br><?php endif; ?>
                                    <?php if(!empty($user['kota'])): ?><?= esc($user['kota']) ?>, <?= esc($user['provinsi']) ?> <?= esc($user['kode_pos']) ?><br><?php endif; ?>
                                    <?php if(!empty($user['country'])): ?><?= esc($user['country']) ?><br><?php endif; ?>
                                    <?php if(!empty($user['no_telp'])): ?><br><?= esc($user['no_telp']) ?><?php endif; ?>
                                </address>
                            <?php else: ?>
                                <p class="text-[13px] italic text-gray-500">You have not set up this type of address yet.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php elseif ($tab == 'edit_address'): ?>
                    <h2 class="text-2xl font-bold text-slate-900 mb-6" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;"><?= ucfirst($type) ?> address</h2>
                    <form action="<?= base_url('my-account/save-address/' . $type) ?>" method="POST" class="max-w-3xl">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-[13px] font-bold text-slate-700 mb-2">First name <span class="text-red-500">*</span></label>
                                <input type="text" name="first_name" value="<?= esc($user['nama_depan']) ?>" class="w-full border border-gray-200 px-4 py-2.5 outline-none focus:border-gray-400 transition-colors text-[13px]" required>
                            </div>
                            <div>
                                <label class="block text-[13px] font-bold text-slate-700 mb-2">Last name <span class="text-red-500">*</span></label>
                                <input type="text" name="last_name" value="<?= esc($user['nama_belakang']) ?>" class="w-full border border-gray-200 px-4 py-2.5 outline-none focus:border-gray-400 transition-colors text-[13px]" required>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-[13px] font-bold text-slate-700 mb-2">Company name (optional)</label>
                            <input type="text" name="company" value="<?= esc($user['company']) ?>" class="w-full border border-gray-200 px-4 py-2.5 outline-none focus:border-gray-400 transition-colors text-[13px]">
                        </div>

                        <div class="mb-6">
                            <label class="block text-[13px] font-bold text-slate-700 mb-2">Country / Region <span class="text-red-500">*</span></label>
                            <select name="country" class="w-full border border-gray-200 px-4 py-2.5 outline-none focus:border-gray-400 transition-colors text-[13px] bg-white appearance-none" required>
                                <option value="">Select a country / region...</option>
                                <option value="Indonesia" <?= $user['country'] == 'Indonesia' ? 'selected' : '' ?>>Indonesia</option>
                                <option value="Malaysia" <?= $user['country'] == 'Malaysia' ? 'selected' : '' ?>>Malaysia</option>
                                <option value="Singapore" <?= $user['country'] == 'Singapore' ? 'selected' : '' ?>>Singapore</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label class="block text-[13px] font-bold text-slate-700 mb-2">Street address <span class="text-red-500">*</span></label>
                            <input type="text" name="address_1" value="<?= esc($user['jalan']) ?>" placeholder="House number and street name" class="w-full border border-gray-200 px-4 py-2.5 outline-none focus:border-gray-400 transition-colors text-[13px] mb-3" required>
                            <input type="text" name="address_2" value="<?= esc($user['detail_alamat']) ?>" placeholder="Apartment, suite, unit, etc. (optional)" class="w-full border border-gray-200 px-4 py-2.5 outline-none focus:border-gray-400 transition-colors text-[13px]">
                        </div>

                        <div class="mb-6">
                            <label class="block text-[13px] font-bold text-slate-700 mb-2">Town / City <span class="text-red-500">*</span></label>
                            <input type="text" name="city" value="<?= esc($user['kota']) ?>" class="w-full border border-gray-200 px-4 py-2.5 outline-none focus:border-gray-400 transition-colors text-[13px]" required>
                        </div>

                        <div class="mb-6">
                            <label class="block text-[13px] font-bold text-slate-700 mb-2">Province <span class="text-red-500">*</span></label>
                            <select name="province" class="w-full border border-gray-200 px-4 py-2.5 outline-none focus:border-gray-400 transition-colors text-[13px] bg-white appearance-none" required>
                                <option value="">Select an option...</option>
                                <option value="Jawa Barat" <?= $user['provinsi'] == 'Jawa Barat' ? 'selected' : '' ?>>Jawa Barat</option>
                                <option value="DKI Jakarta" <?= $user['provinsi'] == 'DKI Jakarta' ? 'selected' : '' ?>>DKI Jakarta</option>
                                <option value="Banten" <?= $user['provinsi'] == 'Banten' ? 'selected' : '' ?>>Banten</option>
                                <option value="Jawa Tengah" <?= $user['provinsi'] == 'Jawa Tengah' ? 'selected' : '' ?>>Jawa Tengah</option>
                                <option value="Jawa Timur" <?= $user['provinsi'] == 'Jawa Timur' ? 'selected' : '' ?>>Jawa Timur</option>
                                <option value="DI Yogyakarta" <?= $user['provinsi'] == 'DI Yogyakarta' ? 'selected' : '' ?>>DI Yogyakarta</option>
                            </select>
                        </div>

                        <div class="mb-8">
                            <label class="block text-[13px] font-bold text-slate-700 mb-2">Postcode / ZIP <span class="text-red-500">*</span></label>
                            <input type="text" name="postcode" value="<?= esc($user['kode_pos']) ?>" class="w-full border border-gray-200 px-4 py-2.5 outline-none focus:border-gray-400 transition-colors text-[13px]" required>
                        </div>

                        <button type="submit" class="bg-[#B49E78] text-white px-8 py-3 text-[13px] font-bold hover:bg-[#a38f6c] transition-colors rounded-sm shadow-sm">
                            Save address
                        </button>
                    </form>

                <?php elseif ($tab == 'details'): ?>
                    <form action="<?= base_url('my-account/update-details') ?>" method="POST" class="max-w-2xl">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-[13px] font-bold text-slate-700 mb-2">First name <span class="text-red-500">*</span></label>
                                <input type="text" name="first_name" value="<?= esc($user['nama_depan']) ?>" class="w-full border border-gray-200 px-4 py-2.5 outline-none focus:border-gray-400 transition-colors text-[13px]" required>
                            </div>
                            <div>
                                <label class="block text-[13px] font-bold text-slate-700 mb-2">Last name <span class="text-red-500">*</span></label>
                                <input type="text" name="last_name" value="<?= esc($user['nama_belakang']) ?>" class="w-full border border-gray-200 px-4 py-2.5 outline-none focus:border-gray-400 transition-colors text-[13px]" required>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-[13px] font-bold text-slate-700 mb-2">Display name <span class="text-red-500">*</span></label>
                            <input type="text" value="<?= esc($displayName) ?>" class="w-full border border-gray-200 px-4 py-2.5 outline-none focus:border-gray-400 transition-colors text-[13px] bg-gray-50" readonly>
                            <p class="text-[12px] italic text-gray-500 mt-2">This will be how your name will be displayed in the account section and in reviews</p>
                        </div>

                        <div class="mb-10">
                            <label class="block text-[13px] font-bold text-slate-700 mb-2">Email address <span class="text-red-500">*</span></label>
                            <input type="email" value="<?= esc($user['email_pengguna']) ?>" class="w-full border border-gray-200 px-4 py-2.5 outline-none focus:border-gray-400 transition-colors text-[13px] bg-gray-50" readonly>
                        </div>

                        <fieldset class="border border-gray-200 p-6 rounded-sm">
                            <legend class="px-2 text-[16px] font-bold text-slate-900" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Password change</legend>
                            
                            <div class="mb-4">
                                <label class="block text-[13px] font-bold text-slate-700 mb-2">Current password (leave blank to leave unchanged)</label>
                                <input type="password" name="current_password" class="w-full border border-gray-200 px-4 py-2.5 outline-none focus:border-gray-400 transition-colors text-[13px]">
                            </div>

                            <div class="mb-4">
                                <label class="block text-[13px] font-bold text-slate-700 mb-2">New password (leave blank to leave unchanged)</label>
                                <input type="password" name="new_password" class="w-full border border-gray-200 px-4 py-2.5 outline-none focus:border-gray-400 transition-colors text-[13px]">
                            </div>

                            <div class="mb-2">
                                <label class="block text-[13px] font-bold text-slate-700 mb-2">Confirm new password</label>
                                <input type="password" name="confirm_password" class="w-full border border-gray-200 px-4 py-2.5 outline-none focus:border-gray-400 transition-colors text-[13px]">
                            </div>
                        </fieldset>

                        <div class="mt-8">
                            <button type="submit" class="bg-[#B49E78] text-white px-8 py-3 text-[13px] font-bold hover:bg-[#a38f6c] transition-colors rounded-sm shadow-sm">
                                Save changes
                            </button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>

    </div>
</main>

<?= $this->endSection() ?>
