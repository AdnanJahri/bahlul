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

// Cek apakah ada parameter id yang dikirimkan
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];

    // Ambil data mahasiswa berdasarkan id
    $sql = "SELECT * FROM student WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Jika data ditemukan, tampilkan form dengan data mahasiswa
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <h2>Edit Data Mahasiswa</h2>
        <form action="update_mahasiswa.php" method="POST">
            <label for="id">ID</label>
            <input type="text" name="ID" value="<?php echo $row['ID']; ?>"><br><br>
            <label>Nama: </label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>

            <label>Jurusan: </label>
            <input type="text" name="dept_name" value="<?php echo $row['dept_name']; ?>" required><br><br>

            <label>SKS: </label>
            <input type="text" name="tot_cred" value="<?php echo $row['tot_cred']; ?>" required><br><br>

            <input type="submit" value="Update Data">
        </form>
        <?php
    } else {
        echo "Data mahasiswa tidak ditemukan.";
    }
} else {
    echo "ID mahasiswa tidak ditemukan.";
}

$conn->close();
?>

</body>
</html>