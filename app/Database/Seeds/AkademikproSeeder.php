<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AkademikproSeeder extends Seeder
{
    public function run()
    {
        // 1. Pengaturan Web
        $dataPengaturan = [
            'web_url' => 'https://akademikpro.id',
            'hero_title' => 'Digital Marketplace Jasa Akademik Profesional No.1 di Indonesia',
            'hero_description' => 'Akademikpro.id adalah marketplace digital jasa akademik profesional di Indonesia. Kami menyediakan layanan berkualitas seperti jasa joki tugas kuliah, pembuatan makalah, proposal, jurnal, essay, skripsi, tesis, disertasi, serta jasa olah data menggunakan SPSS, SEM-AMOS, SmartPLS, Lisrel, Stata, NVIVO, R-Studio, Eviews dan Minitab. Selain itu, tersedia jasa review dan cari jurnal, penerjemah profesional, cek dan lolos Turnitin dan masih banyak lagi. Dengan tim ahli berpengalaman, kami memastikan hasil berkualitas tinggi. Pesan layanan dengan mudah, cepat, dan aman hanya di Akademikpro.id - Solusi terbaik akademik Anda!',
            'kontak_email' => 'admin@akademikpro.id',
            'kontak_phone' => '082398122966',
            'deskripsi_pendaftaran' => '',
            'keterangan_kontak' => '',
            'url_youtube' => '',
            'gambar_testimoni' => '',
            'logo_partner' => '',
            'logo_metode_pembayaran' => '',
            'deskripsi_website' => '',
            'visi' => '',
            'misi' => '',
            'keunggulan' => '',
            'langkah_pemesanan' => ''
        ];
        $this->db->table('pengaturan_web')->insert($dataPengaturan);

        // 2. Kelebihan
        $dataKelebihan = [
            [
                'web_url' => 'https://akademikpro.id',
                'judul_kelebihan' => 'Tim Profesional',
                'deskripsi_kelebihan' => 'Tim AkademikPro.id merupakan lulusan terbaik dari berbagai jurusan perguruan tinggi negeri maupun swasta.'
            ],
            [
                'web_url' => 'https://akademikpro.id',
                'judul_kelebihan' => 'Kualitas Terbaik',
                'deskripsi_kelebihan' => 'Tim AkademikPro.id diseleksi dengan ketat agar menghasilkan hasil pengerjaan berkualitas tinggi'
            ],
            [
                'web_url' => 'https://akademikpro.id',
                'judul_kelebihan' => 'Pelayanan & Privasi',
                'deskripsi_kelebihan' => 'Kami selalu berusaha untuk memberikan pelayanan terbaik dan menjaga privasi klien dengan sangat aman.'
            ],
            [
                'web_url' => 'https://akademikpro.id',
                'judul_kelebihan' => 'Amanah & Terpercaya',
                'deskripsi_kelebihan' => 'AkademikPro.id telah beroperasi sejak 2019 dan selalu menyediakan layanan akademik yang transparan.'
            ],
            [
                'web_url' => 'https://akademikpro.id',
                'judul_kelebihan' => 'Harga Terjangkau',
                'deskripsi_kelebihan' => 'Kami selalu berusaha memberikan harga termurah tanpa mengurangi kualitas hasil pengerjaan project.'
            ],
            [
                'web_url' => 'https://akademikpro.id',
                'judul_kelebihan' => 'Bergaransi',
                'deskripsi_kelebihan' => 'Untuk menjaga kualitas, kami menyediakan layanan revisi guna memperbaiki hasil yang ingin diubah klien.'
            ]
        ];
        $this->db->table('kelebihan')->insertBatch($dataKelebihan);

        // 3. Kategori
        $dataKategori = [
            ['nama_kategori' => 'JASA PEMBUATAN APLIKASI', 'web_url' => 'https://akademikpro.id', 'gambar_kategori' => 'developer_mode', 'jumlah_produk' => 10],
            ['nama_kategori' => 'JASA OLAH DATA STATISTIK', 'web_url' => 'https://akademikpro.id', 'gambar_kategori' => 'monitoring', 'jumlah_produk' => 15],
            ['nama_kategori' => 'JASA BIMBINGAN SKRIPSI', 'web_url' => 'https://akademikpro.id', 'gambar_kategori' => 'local_library', 'jumlah_produk' => 20],
            ['nama_kategori' => 'JASA UI/UX DESIGN', 'web_url' => 'https://akademikpro.id', 'gambar_kategori' => 'design_services', 'jumlah_produk' => 5],
            ['nama_kategori' => 'Jasa Tugas Kuliah', 'web_url' => 'https://akademikpro.id', 'gambar_kategori' => '', 'jumlah_produk' => 0],
            ['nama_kategori' => 'Karya Ilmiah', 'web_url' => 'https://akademikpro.id', 'gambar_kategori' => '', 'jumlah_produk' => 0]
        ];
        $this->db->table('kategori')->insertBatch($dataKategori);

        // 4. Produk
        $dataProduk = [
            [
                'nama_produk' => 'Jasa Atlas.ti untuk Analisis dan Olah Data Kualitatif No.1 Indonesia',
                'nama_kategori' => 'JASA OLAH DATA STATISTIK',
                'gambar_produk' => 'analytics',
                'harga_normal' => '',
                'harga_jual' => 'Rp500.000',
                'discount' => '',
                'status_produk' => 'Reguler'
            ],
            [
                'nama_produk' => 'Jasa Cari Jurnal Scopus & Sinta untuk Referensi #1 Indonesia',
                'nama_kategori' => 'Karya Ilmiah',
                'gambar_produk' => 'menu_book',
                'harga_normal' => '',
                'harga_jual' => 'Rp100.000',
                'discount' => '',
                'status_produk' => 'Reguler'
            ],
            [
                'nama_produk' => 'Jasa Cek Turnitin Murah Cepat Terpercaya No.1 Indonesia',
                'nama_kategori' => 'Karya Ilmiah',
                'gambar_produk' => 'find_in_page',
                'harga_normal' => 'Rp50.000',
                'harga_jual' => 'Rp30.000',
                'discount' => '40% OFF',
                'status_produk' => 'Reguler'
            ],
            [
                'nama_produk' => 'Jasa Coding Arduino & IoT Murah dan Terpercaya!',
                'nama_kategori' => 'JASA PEMBUATAN APLIKASI',
                'gambar_produk' => 'memory',
                'harga_normal' => '',
                'harga_jual' => 'Rp500.000',
                'discount' => '',
                'status_produk' => 'Reguler'
            ],
            [
                'nama_produk' => 'Jasa Coding Python Murah & Berkualitas No.1 Indonesia',
                'nama_kategori' => 'JASA PEMBUATAN APLIKASI',
                'gambar_produk' => 'terminal',
                'harga_normal' => '',
                'harga_jual' => 'Rp500.000',
                'discount' => '',
                'status_produk' => 'Reguler'
            ],
            [
                'nama_produk' => 'Jasa Joki Tugas Kuliah Jogja Murah No.1 Yogyakarta',
                'nama_kategori' => 'Jasa Tugas Kuliah',
                'gambar_produk' => 'school',
                'harga_normal' => '',
                'harga_jual' => 'Rp50.000',
                'discount' => '',
                'status_produk' => 'Reguler'
            ],
            [
                'nama_produk' => 'Joki Tugas Farmasi Murah dan Terpercaya No.1 Indonesia',
                'nama_kategori' => 'Jasa Tugas Kuliah',
                'gambar_produk' => 'medical_services',
                'harga_normal' => '',
                'harga_jual' => 'Rp100.000',
                'discount' => '',
                'status_produk' => 'Terbaru'
            ],
            [
                'nama_produk' => 'Jasa Olah Data Statistik Murah & Terpercaya #1 Indonesia',
                'nama_kategori' => 'JASA OLAH DATA STATISTIK',
                'gambar_produk' => 'query_stats',
                'harga_normal' => '',
                'harga_jual' => 'Rp200.000',
                'discount' => '',
                'status_produk' => 'Terbaru'
            ],
            [
                'nama_produk' => 'Jasa Konversi Tesis ke Jurnal Ilmiah untuk S2 Terpercaya No.1',
                'nama_kategori' => 'Karya Ilmiah',
                'gambar_produk' => 'article',
                'harga_normal' => '',
                'harga_jual' => 'Rp300.000',
                'discount' => '',
                'status_produk' => 'Terbaru'
            ]
        ];
        $this->db->table('produk')->insertBatch($dataProduk);

        // 5. FAQ
        $dataFaq = [
            [
                'pertanyaan' => 'Apa itu AkademikPro.id?',
                'web_url' => 'https://akademikpro.id',
                'jawaban' => 'AkademikPro.id adalah marketplace digital jasa akademik profesional yang menyediakan berbagai layanan akademik berkualitas di Indonesia. Kami membantu mahasiswa, peneliti, dan profesional dalam menyelesaikan tugas akademik dengan cepat, terpercaya, dan sesuai standar ilmiah. Layanan kami mencakup joki tugas kuliah, makalah, skripsi, tesis, disertasi, olah data statistik, penerjemahan, pembuatan peta, revisi akademik, dan masih banyak lagi. Dengan tim ahli yang berpengalaman dari berbagai konsentrasi ilmu pengetahuan, kami berkomitmen untuk memberikan hasil terbaik sesuai kebutuhan klien. AkademikPro.id hadir sebagai solusi bagi siapa saja yang membutuhkan bantuan akademik secara profesional dan terpercaya dengan harga relatif terjangkau.'
            ],
            [
                'pertanyaan' => 'Apakah Layanan AkademikPro.id Terpercaya?',
                'web_url' => 'https://akademikpro.id',
                'jawaban' => 'Ya, layanan kami sangat terpercaya dengan tim profesional di bidangnya.'
            ],
            [
                'pertanyaan' => 'Layanan Jasa Apa Saja yang Ditawarkan AkademikPro.id?',
                'web_url' => 'https://akademikpro.id',
                'jawaban' => 'Kami menawarkan berbagai jasa penulisan karya ilmiah, tugas, skripsi, analisis data, dll.'
            ],
            [
                'pertanyaan' => 'Bagaimana Cara Memesan Layanan di AkademikPro.id?',
                'web_url' => 'https://akademikpro.id',
                'jawaban' => 'Pemesanan layanan jasa akademik di AkademikPro.id sangat mudah dan cepat. Ikuti langkah berikut:<br><br>1. <strong>Hubungi Kami</strong> melalui WhatsApp 082398122966 atau email admin@akademikpro.id untuk konsultasi.<br>2. <strong>Diskusikan kebutuhan Anda</strong> dan dapatkan penawaran harga terbaik.<br>3. <strong>Konfirmasi pesanan</strong> dan lakukan pembayaran melalui metode yang tersedia. Kami berlakukan sistem pembayaran DP (Down Payment).<br>4. <strong>Tim kami akan mulai mengerjakan pesanan</strong> sesuai tenggat waktu atau deadline yang disepakati.<br>5. <strong>Hasil pekerjaan dikirimkan</strong> dan Anda bisa melakukan revisi jika diperlukan.<br>6. <strong>Kami siap membantu kapan saja</strong> untuk memastikan layanan terbaik bagi Anda!'
            ],
            [
                'pertanyaan' => 'Apa Saja Keunggulan AkademikPro.id?',
                'web_url' => 'https://akademikpro.id',
                'jawaban' => 'Keunggulan kami adalah kualitas terjamin, harga terjangkau, dan pelayanan responsif 24/7.'
            ],
            [
                'pertanyaan' => 'Apakah Ada Diskon?',
                'web_url' => 'https://akademikpro.id',
                'jawaban' => 'Tentu saja, kami sering memberikan promo diskon menarik dan paket bundling. Hubungi admin untuk detail selengkapnya.'
            ]
        ];
        $this->db->table('faq')->insertBatch($dataFaq);

        // 6. Blog
        $dataBlog = [
            [
                'judul_blog' => 'Mengatasi Deadline Kuliah: Pakai Joki Tugas Kuliah AkademikPro.id Saja!',
                'kategori_produk' => 'Jasa Tugas Kuliah',
                'gambar_blog' => 'computer'
            ],
            [
                'judul_blog' => 'Joki Karil UT Berapa? Di AkademikPro.id mulai Rp.150rb Saja!',
                'kategori_produk' => 'Karya Ilmiah',
                'gambar_blog' => 'local_mall'
            ],
            [
                'judul_blog' => 'Penelitian Menggunakan Smart PLS',
                'kategori_produk' => 'JASA OLAH DATA STATISTIK',
                'gambar_blog' => 'analytics'
            ]
        ];
        $this->db->table('blog')->insertBatch($dataBlog);
    }
}
