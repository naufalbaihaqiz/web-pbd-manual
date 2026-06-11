<?php
$mysqli = new mysqli("localhost", "root", "", "akademikpro_db");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM kategori");
while ($row = $result->fetch_assoc()) {
    print_r($row);
}
