<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main class="pt-24 bg-white pb-20">
    <div class="max-w-[1000px] mx-auto px-6 md:px-16">
        
        <!-- Header Section -->
        <div class="text-center mb-10">
            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block mb-2">Tentang AkademikPro.id</span>
            <h1 class="text-4xl md:text-5xl font-bold text-slate-900" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">About us</h1>
        </div>

        <!-- Hero Image -->
        <div class="mb-16">
            <!-- Gunakan gambar ilustrasi sarjana seperti pada screenshot. Saya akan pakai placeholder image -->
            <div class="w-full h-auto md:h-[400px] bg-[#f8f9fa] rounded-2xl overflow-hidden flex items-center justify-center">
               <img src="https://plus.unsplash.com/premium_vector-1723628218448-061a2c85b5e6?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="About Us Graduation" class="w-full h-full object-cover grayscale-[20%]">
            </div>
        </div>

        <!-- Pengenalan Section -->
        <section class="mb-16">
            <h2 class="text-2xl font-bold text-slate-900 mb-6" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Pengenalan AkademikPro.id</h2>
            <div class="flex flex-col md:flex-row gap-8 text-[13px] text-gray-700 leading-relaxed text-justify">
                <?= $pengaturan->deskripsi_website ?: '
                <div class="flex-1">
                    <p>
                        AkademikPro.id adalah platform akademik yang fokus pada kualitas dan dedikasi. Kami menyediakan layanan profesional untuk menunjang kebutuhan civitas akademika di seluruh Indonesia. Berawal dari kepedulian terhadap tingginya kebutuhan jasa akademik yang terpercaya, kami hadir memberikan solusi terbaik yang mengedepankan nilai kejujuran, kecepatan, dan ketepatan waktu. Layanan kami dirancang khusus untuk mempermudah Anda dalam berbagai aspek akademik dengan standar hasil yang memuaskan.
                    </p>
                </div>
                <div class="flex-1">
                    <p>
                        Dengan dukungan tim ahli dan profesional di bidangnya, AkademikPro.id telah dipercaya oleh ribuan klien untuk menangani berbagai macam proyek akademik. Mulai dari pengerjaan tugas akhir, analisis statistik, pembuatan jurnal, hingga konsultasi akademik lainnya. Kami berkomitmen memberikan pengalaman layanan yang aman, rahasia, serta menjamin privasi setiap klien. Kepercayaan Anda adalah prioritas utama kami.
                    </p>
                </div>' ?>
            </div>
        </section>

        <!-- Visi dan Misi Section -->
        <section class="mb-16 text-center">
            <h2 class="text-2xl font-bold text-slate-900 mb-8" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Visi dan Misi AkademikPro.id</h2>
            
            <div class="mb-6">
                <h3 class="text-xl font-bold text-slate-900 mb-4" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Visi</h3>
                <p class="text-[13px] text-gray-700 max-w-3xl mx-auto leading-relaxed">
                    <?= $pengaturan->visi ?: 'Menjadi platform penyedia layanan jasa akademik terdepan dan terpercaya di Indonesia yang mampu memberikan solusi cerdas, inovatif, dan profesional untuk setiap kebutuhan akademik.' ?>
                </p>
            </div>

            <div>
                <h3 class="text-xl font-bold text-slate-900 mb-4" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Misi</h3>
                <ol class="text-[13px] text-gray-700 max-w-3xl mx-auto leading-relaxed text-center flex flex-col items-center">
                    <?= $pengaturan->misi ?: '
                    <li class="mb-1">1. Memberikan layanan jasa akademik yang berkualitas dan tepat waktu.</li>
                    <li class="mb-1">2. Mengedepankan kepuasan klien dengan hasil kerja yang memuaskan dan profesional.</li>
                    <li class="mb-1">3. Menjaga privasi dan kerahasiaan data setiap klien dengan tingkat keamanan tinggi.</li>' ?>
                </ol>
            </div>
        </section>

        <!-- Mengapa Memilih AkademikPro.id Section -->
        <section class="mb-20">
            <h2 class="text-2xl font-bold text-slate-900 mb-10 text-center" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Mengapa Memilih AkademikPro.id?</h2>
            
            <div class="max-w-3xl mx-auto">
                <p class="text-[13px] text-gray-700 mb-4 text-justify pl-4">
                    Pilihan yang tepat sangat menentukan kualitas hasil akhir akademik Anda. Kami hadir dengan berbagai keunggulan:
                </p>
                <ul class="text-[13px] text-gray-700 list-disc list-outside ml-10 space-y-2 mb-10 text-justify">
                    <?= $pengaturan->keunggulan ?: '
                    <li><strong>Harga Bersaing:</strong> Kami menawarkan harga yang relatif terjangkau dan sepadan dengan kualitas yang kami berikan.</li>
                    <li><strong>Kualitas Terjamin:</strong> Hasil kerja yang diberikan dikerjakan oleh tim ahli dengan standar kualitas yang tinggi dan bebas dari plagiasi.</li>
                    <li><strong>Tepat Waktu:</strong> Kami memahami pentingnya waktu dalam akademik, sehingga setiap pekerjaan diselesaikan sesuai tenggat waktu.</li>
                    <li><strong>Keamanan Data:</strong> Identitas dan kerahasiaan tugas klien menjadi prioritas utama yang kami jaga sepenuhnya.</li>
                    <li><strong>Revisi Gratis:</strong> Kami menyediakan layanan revisi untuk memastikan hasil pekerjaan benar-benar sesuai dengan permintaan dan standar Anda.</li>
                    <li><strong>Layanan Customer Service 24/7:</strong> Admin kami responsif dan siap melayani Anda kapanpun Anda butuhkan.</li>' ?>
                </ul>
                <div class="flex justify-center">
                    <a href="https://api.whatsapp.com/send?phone=<?= esc($pengaturan->kontak_phone) ?>" class="bg-[#B49E78] hover:bg-[#a38f6c] text-white px-8 py-2.5 font-bold rounded shadow transition-colors text-[13px]">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </section>

        <!-- Layanan yang Ditawarkan -->
        <section class="mb-16">
            <h2 class="text-2xl font-bold text-slate-900 mb-6 text-center" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Layanan yang Ditawarkan</h2>
            <p class="text-[13px] text-gray-700 mb-6 text-justify">
                AkademikPro.id menyediakan berbagai macam layanan akademik dengan standar kualitas profesional untuk mahasiswa, guru, dan dosen:
            </p>
            <div class="space-y-6 text-[13px] text-gray-700">
                <div>
                    <h4 class="font-bold text-slate-900 mb-1">1. Jasa Tugas Kuliah</h4>
                    <p class="text-justify pl-4">
                        Meliputi pembuatan tugas mandiri, review jurnal, penyusunan resume, translasi materi, dan berbagai bentuk tugas kuliah lainnya. Dikerjakan dengan referensi yang relevan dan metode yang tepat.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-slate-900 mb-1">2. Jasa Pembuatan Makalah, Proposal, Skripsi, Tesis, Disertasi</h4>
                    <p class="text-justify pl-4">
                        Layanan konsultasi dan bimbingan penyusunan karya ilmiah dari awal hingga akhir, membantu merumuskan bab-bab esensial secara terstruktur dan terstandarisasi.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-slate-900 mb-1">3. Jasa Olah Data Statistik & Analisis</h4>
                    <p class="text-justify pl-4">
                        Pengolahan data penelitian menggunakan program (seperti SPSS, Eviews, PLS, AMOS, dll) secara akurat. Tersedia layanan pembacaan output dan interpretasi untuk hasil statistik Anda.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-slate-900 mb-1">4. Jasa Artikel Ilmiah / Publikasi Jurnal</h4>
                    <p class="text-justify pl-4">
                        Bantuan penulisan dan penyesuaian (formatting) artikel ilmiah yang siap dipublikasikan di jurnal Nasional (SINTA) maupun Internasional (Scopus/WoS), memastikan standar selingkung terpenuhi.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-slate-900 mb-1">5. Jasa Parafrase (Turnitin)</h4>
                    <p class="text-justify pl-4">
                        Menurunkan tingkat kesamaan (plagiasi) naskah Anda agar lolos uji Turnitin. Kami merangkai ulang kalimat menggunakan padanan bahasa yang baik tanpa mengubah substansi asli.
                    </p>
                </div>
            </div>
        </section>

        <!-- Cara Memesan Layanan -->
        <section class="mb-10 p-2 md:p-8 rounded-xl">
            <h2 class="text-2xl font-bold text-slate-900 mb-6 text-center" style="font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;">Cara Memesan Layanan</h2>
            <p class="text-[13px] text-gray-700 mb-4 text-justify">
                Untuk memesan layanan di AkademikPro.id, ikuti langkah-langkah mudah berikut:
            </p>
            <ol class="text-[13px] text-gray-700 list-decimal list-outside ml-5 space-y-2 mb-6">
                <?= $pengaturan->langkah_pemesanan ?: '
                <li><strong>Konsultasi:</strong> Hubungi admin kami melalui WhatsApp di nomor ' . esc($pengaturan->kontak_phone) . ' untuk mengkonsultasikan tugas atau pesanan Anda.</li>
                <li><strong>Kesepakatan & Harga:</strong> Admin akan memberikan harga dan kesepakatan sesuai dengan tingkat kesulitan dan tenggat waktu.</li>
                <li><strong>Pembayaran DP:</strong> Lakukan pembayaran uang muka (DP) melalui rekening atau dompet digital (BCA/BRI/BNI/OVO) sesuai kesepakatan awal.</li>
                <li><strong>Proses Pengerjaan:</strong> Tim ahli kami akan langsung mengerjakan pesanan Anda.</li>
                <li><strong>Pengiriman & Revisi:</strong> Hasil pengerjaan akan kami kirim. Jika diperlukan, Anda dapat meminta revisi secara gratis.</li>' ?>
            </ol>
            <p class="text-[13px] text-gray-700 text-justify">
                Jangan ragu untuk bertanya, tim layanan kami siap melayani Anda. Kami sangat menghargai privasi dan kepercayaan Anda, sehingga setiap karya dan identitas Anda akan selalu terjamin kerahasiaannya.
            </p>
        </section>

    </div>
</main>

<?= $this->endSection() ?>