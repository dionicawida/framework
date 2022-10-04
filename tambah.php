<?php
require 'function.php';
echo template_header('Tambah Data');

//cek tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    //cek jika data berhasil ditambahkan
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan');
                    document.location.href = 'index.php';
            </script>
        ";
} else {
    echo "
        <script>
            alert('data gagal ditambahkan');
            document.location.href = 'index.php';
        </script>
    ";
    }
}
?>
<div class="content update">
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" required />
        
        <label for="nim">NIM</label>
        <input type="text" name="nim" id="nim" required />

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required />

        <label for="jurusan">Jurusan</label>
        <input type="text" name="jurusan" id="jurusan" required />

        <label for="gambar">Gambar</label>
        <input type="file" name="gambar" id="gambar" />

        <input type="submit" name="submit" value="Tambah Data">
    </form>
</div>