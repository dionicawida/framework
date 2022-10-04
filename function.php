<?php
$conn = mysqli_connect("localhost", "root", "", "db_web2022");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function template_header($title)
{
echo <<<EOT
<!DOCTYPE html>
    <html lang="en">
    <head>
    <title>$title</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <nav class="navtop">
    <div>
            <h1>Akademik Mahasiswa</h1>
            <a href="index.php">Home</a></li>
            <a href="logout.php">Log out</a></li>
    </div>
</nav>
EOT;
}
//fungsi untuk tampilan footer
function template_footer()
{
echo <<<EOT
<footer class="footer">
<div>
    <h1>Copyright &copy; 2022 - Universitas Muhammadiyah Surakarta</h1>
</div>
</footer>
</body>
</html>
EOT;
}
function tambah($data)
{
global $conn;
//ambil semua data yang dikirimkan oleh form
$nama = htmlspecialchars($data["nama"]);
$nim = htmlspecialchars($data["nim"]);
$email = htmlspecialchars($data["email"]);
$jurusan = htmlspecialchars($data["jurusan"]);
$gambar = upload();
if (!$gambar) {
return false;
}
//insert data ke dalam database
$query = "INSERT INTO mahasiswa VALUES
('', '$nama', '$nim', '$email', '$jurusan', '$gambar' )";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}
function upload()
{
$namaFile = $_FILES['gambar']['name'];
$ukuranFile = $_FILES['gambar']['size'];
$error = $_FILES['gambar']['error'];
$tmpName = $_FILES['gambar']['tmp_name'];
//cek apakah gambar sudah diupload
if ($error === 4) {
echo "<script>
alert('gambar belum diupload');
</script>";
return false;
}
//cek apakah benar ekstensi gambar yang diupload
$ekstensiGambarValid = ['jpeg', 'jpg', 'png'];
$ekstensiGambar = explode('.', $namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));
if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
echo "<script>
alert('ekstensi gambar yang diperbolehkan adalah jpeg, jpg, png');
</script>";
return false;
}
//cek jika size melebihi yang diperbolehkan
if ($ukuranFile > 500000) {
echo "<script>
alert('gambar melebihi ukuran yang diperbolehkan');
</script>";
return false;
}
//lolos pengecekan, file dimasukkan ke dalam database
//buat nama file menjadi unik
$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar;
move_uploaded_file($tmpName, 'photo/' . $namaFileBaru);
return $namaFileBaru;
}

?>