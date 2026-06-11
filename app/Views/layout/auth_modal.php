<div class="fixed inset-0 z-[100] modal-overlay items-center justify-center p-4 hidden" id="modalOverlay">
    <div class="bg-surface-white w-full max-w-[500px] rounded-xl shadow-2xl overflow-hidden relative animate-in fade-in zoom-in duration-300">
        
        <button id="btnCloseModal" class="absolute right-4 top-4 z-10 text-secondary hover:text-primary transition-colors">
            <span class="material-symbols-outlined" style="font-size: 24px;">close</span>
        </button>
        
        <div class="flex border-b border-outline-variant">
            <button class="flex-1 py-6 text-label-md font-label-md transition-all duration-300 border-b-2 border-primary text-on-surface" id="loginTab" onclick="switchTab('login')">
                LOGIN
            </button>
            <button class="flex-1 py-6 text-label-md font-label-md transition-all duration-300 border-b-2 border-transparent text-secondary hover:text-primary" id="signupTab" onclick="switchTab('signup')">
                SIGN UP
            </button>
        </div>
        
        <div class="p-8 md:p-12">
            <?php if(session()->getFlashdata('error')): ?>
                <div class="mb-6 p-4 bg-error-container text-on-error-container rounded-lg text-sm font-semibold border border-error/20">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('success')): ?>
                <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg text-sm font-semibold border border-green-200">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('auth/login') ?>" method="POST" class="space-y-6" id="loginView">
                <div class="space-y-1.5">
                    <label class="text-label-md font-label-md text-on-surface-variant">Email Address</label>
                    <input name="email" required class="w-full border border-outline-variant rounded-lg p-3 focus:outline-none focus:ring-1 focus:ring-primary transition-all font-body-md" placeholder="Enter your email" type="email"/>
                </div>
                <div class="space-y-1.5">
                    <label class="text-label-md font-label-md text-on-surface-variant">Password</label>
                    <div class="relative">
                        <input name="password" required class="w-full border border-outline-variant rounded-lg p-3 focus:outline-none focus:ring-1 focus:ring-primary transition-all font-body-md" placeholder="••••••••" type="password"/>
                        <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-secondary">
                            <span class="material-symbols-outlined" style="font-size: 20px;">visibility</span>
                        </button>
                    </div>
                </div>
                <div class="flex items-center justify-between text-label-sm font-label-sm">
                    <label class="flex items-center gap-2 cursor-pointer text-on-surface-variant">
                        <input name="remember" class="w-4 h-4 border-outline-variant rounded text-primary focus:ring-primary" type="checkbox"/>
                        Remember Me
                    </label>
                    <a class="text-primary hover:underline transition-all" href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="w-full bg-primary-container text-on-primary-container py-4 rounded-lg font-label-md font-bold uppercase tracking-widest hover:brightness-95 active:scale-95 transition-all shadow-md">
                    Log In
                </button>
            </form>
            
            <form action="<?= base_url('auth/register') ?>" method="POST" class="space-y-6 hidden h-[400px] overflow-y-auto custom-scrollbar pr-2" id="signupView">
                <div class="space-y-1.5">
                    <label class="text-label-md font-label-md text-on-surface-variant">Email</label>
                    <input name="email" required class="w-full border border-outline-variant rounded-lg p-3 focus:outline-none focus:ring-1 focus:ring-primary transition-all font-body-md" placeholder="Enter your email" type="email"/>
                </div>
                <div class="space-y-1.5">
                    <label class="text-label-md font-label-md text-on-surface-variant">Password</label>
                    <input name="password" required class="w-full border border-outline-variant rounded-lg p-3 focus:outline-none focus:ring-1 focus:ring-primary transition-all font-body-md" placeholder="Create a password" type="password"/>
                </div>
                <div class="space-y-1.5">
                    <label class="text-label-md font-label-md text-on-surface-variant">Confirm Password</label>
                    <input name="confirm_password" required class="w-full border border-outline-variant rounded-lg p-3 focus:outline-none focus:ring-1 focus:ring-primary transition-all font-body-md" placeholder="Repeat password" type="password"/>
                </div>
                <div class="p-4 bg-surface-muted rounded border border-outline-variant">
                    <p class="text-label-sm font-label-sm text-secondary leading-relaxed">
                        Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our 
                        <a class="text-primary font-bold hover:underline" href="#">privacy policy</a>.
                    </p>
                </div>
                <button type="submit" class="w-full bg-primary-container text-on-primary-container py-4 rounded-lg font-label-md font-bold uppercase tracking-widest hover:brightness-95 active:scale-95 transition-all shadow-md">
                    Register
                </button>
            </form>
        </div>
    </div>
</div>

<?php if(session()->getFlashdata('error') || session()->getFlashdata('success')): ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('modalOverlay');
        if(modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            // Buka tab Register jika error/success berasal dari Register
            <?php if(strpos(session()->getFlashdata('error'), 'mendaftar') !== false || session()->getFlashdata('success')): ?>
                if(typeof switchTab === 'function') switchTab('signup');
            <?php endif; ?>
        }
    });
</script>
<?php endif; ?>

<?php if(session()->getFlashdata('login_success')): ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Karena login berhasil, kita pastikan modal tertutup (jika sempat terbuka)
        const modal = document.getElementById('modalOverlay');
        if(modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
        
        // Memunculkan alert bawaan browser agar user tahu login berhasil
        alert('<?= session()->getFlashdata('login_success') ?>');
    });
</script>
<?php endif; ?>