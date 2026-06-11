<?php
$c = mysqli_connect('localhost', 'root', '', 'akademikpro_db');
$res = mysqli_query($c, 'SELECT * FROM produk');
while($r = mysqli_fetch_assoc($res)) {
    echo $r['nama_produk'] . ' | ' . $r['harga_jual'] . "\n";
}
