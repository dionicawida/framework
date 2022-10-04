<?php

require 'function.php';
$mahasiswa = query('select*from mahasiswa');

echo template_header('Home');
?>
<html>
<body>
<div class="content">
 
<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <a href='tambah.php'>+ Tambah Data Baru</a>
    <br><br>

    <table border='1' cellpadding='10' cellspacing='0'>
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Gambar</th>
</tr>
<?php $i = 1; ?>
<?php foreach($mahasiswa as $row) : ?>

    <tr>
        <td><?= $i ?></td>
        <td><a href='edit.php'>edit</a>
            <a href='delete.php'>delete</a>
        </td>
        <td><?= $row['nim']; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['jurusan']; ?></td>
        <td><img src='photo/<?= $row['gambar']?>' width='50'></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</table>
</body>
</html>
</div>
</html>
<?= template_footer() ?>