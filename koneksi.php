<?php
$sesver = 'localhost';
$user = 'root';
$password = '';
$nama_database = 'db_web2022';

$conn = mysqli_connect ($server, $user, $password, $nama_database);

id (!$conn) {
    die('gagal terhubung dengan database :' .mysqli_connect_error()) ; 
}
?>
