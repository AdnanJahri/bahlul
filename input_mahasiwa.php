<?php
// Koneksi ke database MySQL
$host = 'localhost';  // Ganti dengan host MySQL kamu
$user = 'root';       // Ganti dengan username MySQL kamu
$password = '';       // Ganti dengan password MySQL kamu
$dbname = 'mahasiswa';  // Nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $sks = $_POST['sks'];

    // Query untuk menyisipkan data ke tabel mahasiswa
    $sql = "INSERT INTO student (ID, name, dept_name, tot_cred)
            VALUES ('$id','$nama', '$jurusan' , $sks);
";

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        echo "Data mahasiswa berhasil ditambahkan!";
        echo "<a href='tampil_mahasiswa.php'>Balik kehalaman awal</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>


