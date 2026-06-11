<?php
$c = mysqli_connect('localhost', 'root', '', 'akademikpro_db');

$sql = "CREATE TABLE IF NOT EXISTS keranjang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email_pengguna VARCHAR(255) NOT NULL,
    nama_produk VARCHAR(255) NOT NULL,
    qty INT NOT NULL DEFAULT 1,
    harga VARCHAR(50) NOT NULL,
    gambar_produk VARCHAR(255) NOT NULL,
    FOREIGN KEY (email_pengguna) REFERENCES pengguna(email_pengguna) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (nama_produk) REFERENCES produk(nama_produk) ON DELETE CASCADE ON UPDATE CASCADE
)";

if (mysqli_query($c, $sql)) {
    echo "Table keranjang created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($c) . "\n";
}
