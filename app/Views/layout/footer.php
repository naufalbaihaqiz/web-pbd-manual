<!-- Footer -->
<footer class="bg-[#050505] py-5 px-6 md:px-16">
    <div class="max-w-[1200px] mx-auto flex flex-col md:flex-row justify-between items-center gap-4 relative z-10">
        <!-- Social Icons -->
        <div class="flex items-center gap-4">
            <a href="#" class="text-gray-400 hover:text-white transition-colors">
                <span class="text-[14px] font-bold">f</span>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors">
                <span class="text-[13px] font-bold">𝕏</span>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors">
                <span class="material-symbols-outlined text-[16px]">photo_camera</span>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors">
                <span class="material-symbols-outlined text-[16px]">play_arrow</span>
            </a>
        </div>
        
        <!-- Copyright text -->
        <div class="text-[11.5px] text-[#555] font-medium mr-16">
            Copyright &copy; 2026 - <?= esc($pengaturan->hero_title ?? 'AkademikPro.id') ?> | All Rights Reversed
        </div>
    </div>
</footer>

<!-- Floating WhatsApp Button -->
<?php 
$phoneUrl = isset($pengaturan->kontak_phone) ? 'https://api.whatsapp.com/send?phone=' . urlencode($pengaturan->kontak_phone) : '#';
?>
<a href="<?= $phoneUrl ?>" class="fixed bottom-6 right-6 z-[100] w-[56px] h-[56px] bg-[#25D366] text-white rounded-full shadow-xl flex items-center justify-center hover:bg-[#1EBE53] transition-colors hover:scale-110">
    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="currentColor">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
    </svg>
    <span class="absolute top-0 right-0 w-4 h-4 bg-red-600 border-[1.5px] border-white rounded-full flex items-center justify-center text-[9px] font-bold shadow-sm">1</span>
</a>
