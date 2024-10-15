<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Konsultasi</title>

    <!-- Link to CSS -->
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <nav class="navbar">
      <a href="#" class="navbar-logo">
        <img
          src="img/logo-from-figma.png"
          alt="Logo Kantor Hukum"
          style="width: 40px; vertical-align: middle; margin-right: 10px"
        />
        Law Firm<span> Aneng Winengsih & Partners</span>
      </a>
      <div class="navbar-nav">
        <a href="index.html">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#layanan">Layanan</a>
        <a href="#contact">Kontak</a>
        <a href="konsultasi.php" class="btn-konsultasi">Konsultasi</a>
      </div>
    </nav>

    <div class="container">
        <h2>Form Konsultasi</h2>
        <form action="" method="post">
            <input type="text" name="nik" placeholder="NIK" required />
            <input type="text" name="nama" placeholder="Nama" required />
            <input type="email" name="email" placeholder="Email" required />
            <button type="submit" class="btn">Mulai Konsultasi</button>
        </form>

        <?php
        // Koneksi ke database
$servername = "localhost"; // atau "localhost:3306" jika Anda menggunakan port yang berbeda
$username = "root"; // Username
$password = ""; // Password
$dbname = "law_firm"; // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error); // Tampilkan pesan kesalahan
}

// Jika berhasil, Anda dapat melanjutkan dengan operasi database
echo "Koneksi berhasil!";


        // Proses form saat di-submit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nik = htmlspecialchars($_POST['nik']);
            $nama = htmlspecialchars($_POST['nama']);
            $email = htmlspecialchars($_POST['email']);

            // Validasi sederhana untuk memastikan data tidak kosong
            if (empty($nik) || empty($nama) || empty($email)) {
                echo "<p style='color: red;'>Semua bidang harus diisi.</p>";
            } else {
                // Siapkan dan jalankan pernyataan SQL
                $stmt = $conn->prepare("INSERT INTO konsultasi (nik, nama, email) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $nik, $nama, $email);

                if ($stmt->execute()) {
                    echo "<p style='color: green;'>Terima kasih $nama, permintaan konsultasi Anda telah kami terima dan disimpan.</p>";
                } else {
                    echo "<p style='color: red;'>Terjadi kesalahan: " . $stmt->error . "</p>";
                }

                $stmt->close();
            }
        }

        $conn->close(); // Tutup koneksi database
        ?>
    </div>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-container"></div>
        <div class="footer-bottom">
            <p>&copy; 2024 Your Website | Designed by Ikhsan Alfiansyah</p>
        </div>
    </footer>

    <!-- Link to JS -->
    <script src="js/script.js"></script>
</body>
</html>
