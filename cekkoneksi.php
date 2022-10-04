<?php

require 'koneksi.php';
$query = 'select*from mahasiswa';
$mahasiswa = mysqli_query($conn, $query);

?>
