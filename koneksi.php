<?php
// Koneksi ke database
$servername = "localhost"; // Server database, gunakan 'localhost' untuk XAMPP
$username = "root"; // Username default untuk XAMPP adalah 'root'
$password = ""; // Biasanya kosong, jika Anda tidak mengatur kata sandi
$dbname = "law_firm"; // Nama database yang telah Anda buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error); // Menampilkan pesan jika koneksi gagal
} else {
    echo "Koneksi berhasil!"; // Pesan jika koneksi berhasil
}
?>
