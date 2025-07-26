<?php
$servername = "localhost";     // XAMPP default
$username   = "root";          // Default XAMPP
$password   = "";              // Default XAMPP (kosong)
$dbname     = "db_perusahaan"; // Sesuaikan dengan database kamu

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
