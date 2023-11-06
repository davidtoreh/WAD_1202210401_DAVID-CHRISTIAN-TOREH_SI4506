<!DOCTYPE html>
<html>
<head>
    <title>Hapus Menu - Warteg Bangzek</title>
</head>
<body>
    <h1>Hapus Menu</h1>

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

    // Periksa apakah parameter "id" telah diterima
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        // Query untuk menghapus menu berdasarkan ID
        $sql = "DELETE FROM menu WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Menu berhasil dihapus.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "ID menu tidak valid.";
    }

    // Tutup koneksi database
    $conn->close();
    ?>

    <br><br>
    <a href="index.php">Kembali ke Daftar Menu</a> <!-- Ganti 'index.php' dengan halaman yang menampilkan daftar menu -->
</body>
</html>
