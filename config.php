<?php

$dbhost = 'localhost';
$dbname = 'video';
$dbuser = 'root';
$dbpass =  '';

$conn = mysqli_connect ($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn){
    echo "<script>alert('Gagal Koneksi');</script>";
}

?>
