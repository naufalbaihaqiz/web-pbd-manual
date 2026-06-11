<?php
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);
require FCPATH . '../app/Config/Paths.php';
$paths = new Config\Paths();
require rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';
require_once SYSTEMPATH . 'Config/DotEnv.php';
(new CodeIgniter\Config\DotEnv(ROOTPATH))->load();
$app = \Config\Services::codeigniter();
$app->initialize();

$db = \Config\Database::connect();
$db->table('pengaturan_web')->where('web_url', 'https://akademikpro.id')->update([
    'deskripsi_website' => '<div class="flex-1"><p>AkademikPro.id adalah platform akademik yang fokus pada kualitas dan dedikasi. Kami menyediakan layanan profesional untuk menunjang kebutuhan civitas akademika di seluruh Indonesia. Berawal dari kepedulian terhadap tingginya kebutuhan jasa akademik yang terpercaya, kami hadir memberikan solusi terbaik yang mengedepankan nilai kejujuran, kecepatan, dan ketepatan waktu. Layanan kami dirancang khusus untuk mempermudah Anda dalam berbagai aspek akademik dengan standar hasil yang memuaskan.</p></div><div class="flex-1"><p>Dengan dukungan tim ahli dan profesional di bidangnya, AkademikPro.id telah dipercaya oleh ribuan klien untuk menangani berbagai macam proyek akademik. Mulai dari pengerjaan tugas akhir, analisis statistik, pembuatan jurnal, hingga konsultasi akademik lainnya. Kami berkomitmen memberikan pengalaman layanan yang aman, rahasia, serta menjamin privasi setiap klien. Kepercayaan Anda adalah prioritas utama kami.</p></div>',
    'visi' => 'Menjadi platform penyedia layanan jasa akademik terdepan dan terpercaya di Indonesia yang mampu memberikan solusi cerdas, inovatif, dan profesional untuk setiap kebutuhan akademik.',
    'misi' => '<li class="mb-1">1. Memberikan layanan jasa akademik yang berkualitas dan tepat waktu.</li><li class="mb-1">2. Mengedepankan kepuasan klien dengan hasil kerja yang memuaskan dan profesional.</li><li class="mb-1">3. Menjaga privasi dan kerahasiaan data setiap klien dengan tingkat keamanan tinggi.</li>',
    'keunggulan' => '<li><strong>Harga Bersaing:</strong> Kami menawarkan harga yang relatif terjangkau dan sepadan dengan kualitas yang kami berikan.</li><li><strong>Kualitas Terjamin:</strong> Hasil kerja yang diberikan dikerjakan oleh tim ahli dengan standar kualitas yang tinggi dan bebas dari plagiasi.</li><li><strong>Tepat Waktu:</strong> Kami memahami pentingnya waktu dalam akademik, sehingga setiap pekerjaan diselesaikan sesuai tenggat waktu.</li><li><strong>Keamanan Data:</strong> Identitas dan kerahasiaan tugas klien menjadi prioritas utama yang kami jaga sepenuhnya.</li><li><strong>Revisi Gratis:</strong> Kami menyediakan layanan revisi untuk memastikan hasil pekerjaan benar-benar sesuai dengan permintaan dan standar Anda.</li><li><strong>Layanan Customer Service 24/7:</strong> Admin kami responsif dan siap melayani Anda kapanpun Anda butuhkan.</li>',
    'langkah_pemesanan' => '<li><strong>Konsultasi:</strong> Hubungi admin kami melalui WhatsApp di nomor 082398122966 untuk mengkonsultasikan tugas atau pesanan Anda.</li><li><strong>Kesepakatan & Harga:</strong> Admin akan memberikan harga dan kesepakatan sesuai dengan tingkat kesulitan dan tenggat waktu.</li><li><strong>Pembayaran DP:</strong> Lakukan pembayaran uang muka (DP) melalui rekening atau dompet digital (BCA/BRI/BNI/OVO) sesuai kesepakatan awal.</li><li><strong>Proses Pengerjaan:</strong> Tim ahli kami akan langsung mengerjakan pesanan Anda.</li><li><strong>Pengiriman & Revisi:</strong> Hasil pengerjaan akan kami kirim. Jika diperlukan, Anda dapat meminta revisi secara gratis.</li>'
]);
echo "Updated\\n";
