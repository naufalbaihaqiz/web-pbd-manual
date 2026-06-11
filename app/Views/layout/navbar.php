<header class="bg-white border-b border-gray-200 fixed top-0 left-0 right-0 z-50">
    <nav class="flex justify-between items-center w-full px-6 md:px-12 py-4 max-w-[1400px] mx-auto">
        <div class="flex items-center gap-2 text-xl font-bold text-[#333333]">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#A68A64]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="3 17 12 8 21 17"></polyline>
                <polyline points="3 22 12 13 21 22"></polyline>
            </svg>
            AkademikPro.id
        </div>
        <div class="hidden md:flex items-center space-x-10 text-[15px]">
            <a class="text-[#A68A64] font-medium" href="<?= base_url('/') ?>">Home</a>
            <a class="text-gray-600 font-medium hover:text-[#A68A64] transition-colors" href="<?= base_url('products') ?>">Products</a>
            <a class="text-gray-600 font-medium hover:text-[#A68A64] transition-colors" href="<?= base_url('about') ?>">About</a>
            <a class="text-gray-600 font-medium hover:text-[#A68A64] transition-colors" href="<?= base_url('blog') ?>">Blog</a>
            <a class="text-gray-600 font-medium hover:text-[#A68A64] transition-colors" href="<?= base_url('contact') ?>">Contact</a>
            <a class="text-gray-600 font-medium hover:text-[#A68A64] transition-colors" href="<?= base_url('freelance') ?>">Daftar Freelance</a>
        </div>
        <div class="flex items-center gap-6 text-gray-700">
            
            <button class="trigger-search hover:text-[#A68A64] transition-colors flex items-center">
                <span class="material-symbols-outlined text-[24px]">search</span>
            </button>
            
            <?php if(session()->get('isLoggedIn')): ?>
            <div class="relative group py-2">
                <a href="<?= base_url('my-account') ?>" class="hover:text-[#A68A64] transition-colors flex items-center cursor-pointer">
                    <span class="material-symbols-outlined text-[24px]">person</span>
                </a>
                
                <!-- Profile Dropdown -->
                <div class="absolute right-0 top-full w-[260px] bg-white border border-gray-100 shadow-[0_4px_15px_-3px_rgba(0,0,0,0.1)] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 -mt-1">
                    <div class="p-5 flex items-center gap-4 border-b border-gray-100">
                        <div class="w-[45px] h-[45px] bg-[#d1d5db] rounded-full flex items-center justify-center text-white flex-shrink-0">
                            <span class="material-symbols-outlined text-[28px]">person</span>
                        </div>
                        <div class="flex flex-col overflow-hidden">
                            <?php 
                                $email = session()->get('email_pengguna');
                                $name = explode('@', $email)[0];
                            ?>
                            <span class="text-[14px] font-bold text-[#333333] leading-snug truncate"><?= esc($name) ?></span>
                            <span class="text-[12.5px] text-[#555555] truncate"><?= esc($email) ?></span>
                        </div>
                    </div>
                    <div class="p-2">
                        <a href="<?= base_url('auth/logout') ?>" class="block px-4 py-2.5 text-[14px] text-[#555555] hover:text-[#333333] hover:bg-[#f9f9f9] transition-colors">Log Out</a>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <button class="trigger-login hover:text-[#A68A64] transition-colors flex items-center">
                <span class="material-symbols-outlined text-[24px]">person</span>
            </button>
            <?php endif; ?>
            
            <a href="<?= base_url('cart') ?>" class="relative hover:text-[#A68A64] transition-colors flex items-center">
                <span class="material-symbols-outlined text-[24px]">shopping_bag</span>
                
                <?php 
                    $cartCount = 0;
                    if (session()->get('isLoggedIn')) {
                        $detailCartModel = new \App\Models\DetailCartModel();
                        $cartModel = new \App\Models\CartModel();
                        $cart = $cartModel->where('email_pengguna', session()->get('email_pengguna'))->first();
                        if ($cart) {
                            $cartCount = $detailCartModel->where('id_cart', $cart['id_cart'])->countAllResults();
                        }
                    }
                ?>
                <?php if($cartCount > 0): ?>
                    <span class="absolute -top-1.5 -right-1.5 bg-red-600 text-white text-[10px] w-4 h-4 flex items-center justify-center rounded-full font-bold shadow-sm">
                        <?= $cartCount ?>
                    </span>
                <?php endif; ?>
            </a>
            
        </div>
    </nav>
</header>