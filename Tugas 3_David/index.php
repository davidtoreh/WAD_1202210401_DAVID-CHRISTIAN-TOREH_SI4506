<!DOCTYPE html>
<html>
<head>
    <title>Menu Warteg Bangzek</title>
</head>
<body>
    <h1>Menu Warteg Bangzek</h1>
    <a href="tambah_menu.php">
        <button>Tambah Menu</button>
    </a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
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

            // Query untuk mengambil data dari tabel "menu"
            $sql = "SELECT * FROM menu";
            $result = $conn->query($sql);

            // Tampilkan data dalam tabel
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nama_menu"] . "</td>";
                    echo "<td>" . $row["harga"] . "</td>";
                    echo "<td>" . $row["deskripsi"] . "</td>";
                    echo "<td><a href='hapus_menu.php?id=" . $row["id"] . "'>Hapus Menu</a></td>"; // Tambahkan tombol aksi Hapus Menu
                    echo "</tr>";
                }
            } else {
                echo "Tidak ada data dalam tabel.";
            }

            // Tutup koneksi database
            $conn->close();
        ?>
    </table>
</body>
</html>
