<?php
// Pastikan koneksi.php sudah terhubung
include 'koneksi.php';

$message = '';

if (isset($_POST['simpan'])) {
    // Pastikan Anda membersihkan input sebelum memasukkannya ke database
    $destinasi = mysqli_real_escape_string($koneksi, $_POST['destinasi']);
    $itinerary = mysqli_real_escape_string($koneksi, $_POST['itinerary']);
    $harga = (int)$_POST['harga']; // Pastikan harga adalah integer
    $tanggal_pelaksanaan = mysqli_real_escape_string($koneksi, $_POST['tanggal_pelaksanaan']);
    $jumlah_maksimal = (int)$_POST['jumlah_maksimal']; // Pastikan jumlah_maksimal adalah integer
    $pilihan_transportasi = mysqli_real_escape_string($koneksi, $_POST['pilihan_transportasi']);
    
    // Query untuk memasukkan data
    // Pastikan urutan kolom sesuai dengan struktur database Anda
    $query = "INSERT INTO list_wisata (destinasi, itinerary, harga, tanggal_pelaksanaan, jumlah_maksimal, pilihan_transportasi) 
              VALUES ('$destinasi', '$itinerary', '$harga', '$tanggal_pelaksanaan', '$jumlah_maksimal', '$pilihan_transportasi')";
    
    if (mysqli_query($koneksi, $query)) {
        $message = "Data wisata berhasil disimpan!";
        // Redirect ke halaman hasil input setelah berhasil
        header("Location: hsilinput.php?status=success");
        exit();
    } else {
        $message = "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Data | ExploreVista</title>
  <link rel="stylesheet" href="styleinputdata.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

  <nav class="navbar">
    <a href="landingpage.php" class="logo"><i class="fas fa-route"></i> ExploreVista</a>
    <ul class="nav-links">
      <li><a href="inputdata.php" class="active-link">Input Data</a></li>
      <li><a href="hsilinput.php">List Data</a></li>
      <li><a href="landingpage.php" class="logout-btn">Log Out</a></li>
      <link rel="stylesheet" href="styleinput.css">
    </ul>
    <div class="hamburger" onclick="document.querySelector('.nav-links').classList.toggle('active')">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </nav>

  <div class="main-wrapper">
    <div class="container form-container">
      <h1>Input Data Wisata Baru</h1>
      <p>Masukkan semua detail destinasi wisata untuk ditampilkan.</p>
      <hr>

      <?php if ($message): ?>
        <div class="alert <?= strpos($message, 'Error') !== false ? 'alert-error' : 'alert-success' ?>">
            <?= $message ?>
        </div>
      <?php endif; ?>

      <form action="" method="post" class="input-form">
          <div class="form-grid">
              <div class="form-group">
                  <label for="destinasi">Destinasi</label>
                  <input type="text" id="destinasi" name="destinasi" placeholder="Masukkan Destinasi" required>
              </div>

              <div class="form-group">
                  <label for="itinerary">Itinerary (Rencana Perjalanan)</label>
                  <input type="text" id="itinerary" name="itinerary" placeholder="Masukkan Itinerary (Contoh: Kawah Ijen, Bromo)" required>
              </div>

              <div class="form-group">
                  <label for="harga">Harga Tiket (Rp)</label>
                  <input type="number" id="harga" name="harga" placeholder="Masukkan Harga Tiket" required>
              </div>

              <div class="form-group">
                  <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
                  <input type="date" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" placeholder="dd/mm/yyyy" required>
              </div>

              <div class="form-group">
                  <label for="jumlah_maksimal">Jumlah Maksimal Peserta</label>
                  <input type="number" id="jumlah_maksimal" name="jumlah_maksimal" placeholder="Masukkan Jumlah Maksimal" required>
              </div>

              <div class="form-group">
                  <label for="pilihan_transportasi">Pilihan Transportasi</label>
                  <select id="pilihan_transportasi" name="pilihan_transportasi" required>
                      <option value="">Pilih Transportasi</option>
                      <option value="Pesawat">Pesawat</option>
                      <option value="Bus">Bus</option>
                  </select>
              </div>
          </div>
          
          <button type="submit" name="simpan" class="simpan-btn">
              <i class="fas fa-save"></i> SIMPAN DATA
          </button>
      </form>
      
      <p class="back-link">
        <i class="fas fa-arrow-left"></i> Kembali ke <a href="hsilinput.php">Daftar Wisata</a>.
      </p>
    </div>
  </div>

  <footer class="website-footer-wrapper">
    <hr class="footer-line">
    <div class="website-footer">
      <p><strong>ExploreVista</strong> - © 2025 Semua Hak Cipta Dilindungi.</p>
    </div>
  </footer>
</body>
</html>