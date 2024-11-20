<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Data mahasiswa</h1>
    <div class="tambah">
        <p>Tambah Data :</p>
        <a href="input_mahasiswa.html">Tambah</a>
    </div>
<?php
// Konfigurasi database
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "mahasiswa"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel mahasiswa
$sql = "SELECT * FROM student";
$result = $conn->query($sql);

// Menampilkan data dalam bentuk tabel
if ($result->num_rows > 0) {
    // Tabel untuk menampilkan data
    echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse; width: 80%; margin: 20px auto;'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jurusan</th>
                    <th>SKS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>";
    
    // Output data dari setiap baris
    $no = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $no++ . "</td>
                <td>" . $row["ID"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["dept_name"] . "</td>
                <td>" . $row["tot_cred"] . "</td>
                <td>
                    <a href='edit_mahasiswa.php?ID=" . $row["ID"] . "'>Edit</a> |
                    <a href='hapus_mahasiswa.php?ID=" . $row["ID"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Hapus</a>
                </td>
              </tr>";
    }
    
    echo "</tbody></table>";
} else {
    echo "Tidak ada data ditemukan";
}

// Menutup koneksi
$conn->close();
?>

</body>
</html>