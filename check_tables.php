<?php
$c = mysqli_connect('localhost', 'root', '', 'akademikpro_db');
$res = mysqli_query($c, 'SHOW TABLES');
while($r = mysqli_fetch_array($res)){
    echo $r[0] . "\n";
}
