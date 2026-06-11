<?php
$c = mysqli_connect('localhost', 'root', '', 'akademikpro_db');
if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "ALTER TABLE pesanan
ADD COLUMN nama_depan VARCHAR(255) NULL,
ADD COLUMN nama_belakang VARCHAR(255) NULL,
ADD COLUMN company VARCHAR(255) NULL,
ADD COLUMN jalan VARCHAR(255) NULL,
ADD COLUMN detail_alamat VARCHAR(255) NULL,
ADD COLUMN kota VARCHAR(255) NULL,
ADD COLUMN provinsi VARCHAR(255) NULL,
ADD COLUMN kode_pos VARCHAR(50) NULL,
ADD COLUMN country VARCHAR(255) NULL,
ADD COLUMN no_telp VARCHAR(50) NULL;";

if (mysqli_query($c, $sql)) {
    echo "Columns added successfully";
} else {
    echo "Error adding columns: " . mysqli_error($c);
}

mysqli_close($c);
