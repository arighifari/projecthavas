<?php

$dbhost = 'localhost';
$dbname = 'havas';
$dbuser = 'root';
$dbpass =  'arighifari23';

$conn = mysqli_connect ($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn){
    echo "<script>alert('Gagal Koneksi');</script>";
}

?>
