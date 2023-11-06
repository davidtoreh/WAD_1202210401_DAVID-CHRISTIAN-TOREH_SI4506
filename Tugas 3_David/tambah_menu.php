<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";  // Ganti dengan username database Anda
$password = "";  // Ganti dengan password database Anda
$dbname = "warteg_bangzek";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Inisialisasi variabel notifikasi
$notification = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $nama_menu = $_POST["nama_menu"];
    $harga = $_POST["harga"];
    $deskripsi = $_POST["deskripsi"];

    // Query untuk menambahkan data menu ke dalam database
    $sql = "INSERT INTO menu (nama_menu, harga, deskripsi) VALUES ('$nama_menu', '$harga', '$deskripsi')";

    if ($conn->query($sql) === TRUE) {
        $notification = "Menu berhasil ditambahkan.";
    } else {
        $notification = "Terjadi kesalahan: " . $conn->error;
    }
}

// Tutup koneksi database
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu - Warteg Bangzek</title>
</head>
<body>
    <h1>Tambah Menu</h1>
    <a href="index.php">Kembali ke Menu Utama</a>
    <br>
    <?php echo $notification; ?>
    <form method="post" action="tambah_menu.php">
        Nama Menu: <input type="text" name="nama_menu" required><br>
        Harga: <input type="number" name="harga" step="0.01" required><br>
        Deskripsi: <textarea name="deskripsi"></textarea><br>
        <input type="submit" value="Tambahkan Menu">
    </form>
</body>
</html>
