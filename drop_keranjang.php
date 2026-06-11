<?php
$c = mysqli_connect('localhost', 'root', '', 'akademikpro_db');
$sql = "DROP TABLE IF EXISTS keranjang";
if (mysqli_query($c, $sql)) {
    echo "Table keranjang dropped successfully\n";
} else {
    echo "Error dropping table: " . mysqli_error($c) . "\n";
}
