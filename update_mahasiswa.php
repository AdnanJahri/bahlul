<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "mahasiswa"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah data dikirimkan melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    // $id = $_POST['ID'];
    $nama = $_POST['name'];
    $dept = $_POST['dept_name'];
    $sks = $_POST['tot_cred'];

    // Query untuk memperbarui data mahasiswa
    $sql = "UPDATE student SET name = ?, dept_name = ?, tot_cred = ? WHERE student.ID = ?";

    // Menyiapkan statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $id, $name, $dept, $sks);

    // Menjalankan query
    if ($stmt->execute()) {
        echo "Data mahasiswa berhasil diperbarui.";
        // Redirect kembali ke halaman utama setelah beberapa detik
        header("Refresh: 2; url=tampil_mahasiswa.php");
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }
}

$conn->close();
?>

</body>
</html>