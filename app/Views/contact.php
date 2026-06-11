<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<nav class="pt-32 pb-4 text-center">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
        <p class="text-[10px] tracking-[0.2em] text-secondary uppercase font-bold">
            <a class="hover:text-primary transition-colors" href="<?= base_url('/') ?>">Home</a>
            <span class="mx-2 text-outline-variant">/</span>
            <span class="text-on-background">Kontak Kami</span>
        </p>
    </div>
</nav>
<header class="pb-16 text-center">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
        <h1 class="font-display-lg text-4xl md:text-6xl text-on-background">Kontak Kami</h1>
    </div>
</header>
<main class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop mb-24 min-h-[50vh]">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
        
        <div class="lg:col-span-4 space-y-10 py-4">
            <div class="flex items-start gap-5">
                <div class="text-[#a8977b] mt-1">
                    <span class="material-symbols-outlined" style="font-size: 36px; font-variation-settings: 'FILL' 1;">language</span>
                </div>
                <div>
                    <h3 class="font-bold text-lg mb-1 text-on-background">Website</h3>
                    <p class="text-secondary text-body-md">www.akademikpro.id</p>
                </div>
            </div>
            
            <div class="flex items-start gap-5">
                <div class="text-[#a8977b] mt-1">
                    <span class="material-symbols-outlined" style="font-size: 36px; font-variation-settings: 'FILL' 1;">mail</span>
                </div>
                <div>
                    <h3 class="font-bold text-lg mb-1 text-on-background">Email</h3>
                    <p class="text-secondary text-body-md">admin@akademikpro.id</p>
                    <p class="text-secondary text-body-md">akademikproid@gmail.com</p>
                </div>
            </div>
            
            <div class="flex items-start gap-5">
                <div class="text-[#a8977b] mt-1">
                    <span class="material-symbols-outlined" style="font-size: 36px; font-variation-settings: 'FILL' 1;">call</span>
                </div>
                <div>
                    <h3 class="font-bold text-lg mb-1 text-on-background">No. Whatsapp</h3>
                    <p class="text-secondary text-body-md font-medium">0823-9812-2966</p>
                </div>
            </div>
        </div>
        <div class="lg:col-span-8 bg-surface-white p-2 md:p-10 rounded-sm">
            <h2 class="font-headline-md text-3xl text-on-background mb-10">Kirim Pesan Anda</h2>
            <form action="#" class="space-y-6" method="POST">
                <div class="grid grid-cols-1 gap-6">
                    <input class="w-full border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary py-3 px-4 text-on-surface placeholder-secondary font-body-md bg-transparent rounded-sm transition-colors" placeholder="Name *" required type="text"/>
                    <input class="w-full border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary py-3 px-4 text-on-surface placeholder-secondary font-body-md bg-transparent rounded-sm transition-colors" placeholder="Email Address *" required type="email"/>
                    <input class="w-full border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary py-3 px-4 text-on-surface placeholder-secondary font-body-md bg-transparent rounded-sm transition-colors" placeholder="Subject" type="text"/>
                    <textarea class="w-full border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary py-3 px-4 text-on-surface placeholder-secondary font-body-md bg-transparent rounded-sm resize-none transition-colors" placeholder="Comment or Message *" required rows="6"></textarea>
                </div>
                <div class="pt-2">
                    <button class="bg-[#a8977b] text-white font-label-md py-4 px-10 hover:opacity-90 active:scale-95 transition-all duration-300 uppercase tracking-widest text-sm w-full md:w-auto" type="submit">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
        </div>
</main>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('js/contact.js') ?>"></script>
<?= $this->endSection() ?>