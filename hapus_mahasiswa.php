<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    asd
<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mahasiswa";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah ada parameter id yang dikirimkan
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];

    // Query untuk menghapus data mahasiswa
    $sql = "DELETE FROM student WHERE student.ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Data mahasiswa berhasil dihapus.";
        // Redirect kembali ke halaman utama setelah beberapa detik
        header("Refresh: 2; url=tampil_mahasiswa.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}

$conn->close();
?>

</body>
</html>