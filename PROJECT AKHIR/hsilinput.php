<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasil Data Wisata | ExploreVista</title>
  <link rel="stylesheet" href="stylelistdata.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    

  <nav class="navbar">
    <a href="landingpage.php" class="logo"><i class="fas fa-route"></i> ExploreVista</a>
    <ul class="nav-links">
      <li><a href="inputdata.php">Input Data</a></li>
      <li><a href="hsilinput.php">List Data</a></li>
      <li><a href="landingpage.php" class="logout-btn">Log Out</a></li>
    </ul>
    <div class="hamburger" onclick="document.querySelector('.nav-links').classList.toggle('active')">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </nav>

  <div class="main-wrapper">
    <div class="container data-container">
      <h1>Daftar Wisata yang Telah Diinput</h1>
      <p>Berikut adalah data wisata yang telah dimasukkan ke sistem ExploreVista.</p>
      <hr>

      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>Destinasi</th>
              <th>Itinerary</th>
              <th>Harga (Rp)</th>
              <th>Tanggal</th>
              <th>Max Peserta</th>
              <th>Transportasi</th>
              <th class="action-column">Aksi</th> </tr>
          </thead>
          <tbody>
            <?php
            // Asumsi tabel list_wisata memiliki kolom ID sebagai primary key (misalnya: 'id_wisata')
            $query = "SELECT * FROM list_wisata ORDER BY tanggal_pelaksanaan ASC";
            $result = mysqli_query($koneksi, $query);

            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){
                // Mengambil ID Primary Key
                $id = $row['id_wisata'] ?? 0;
                
                echo "<tr>";
                // Menghilangkan htmlspecialchars() sesuai permintaan sebelumnya
                echo "<td>" . $row['destinasi'] . "</td>";
                echo "<td>" . $row['itinerary'] . "</td>";
                echo "<td class='price-cell'>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>";
                echo "<td>" . $row['tanggal_pelaksanaan'] . "</td>";
                echo "<td>" . $row['jumlah_maksimal'] . "</td>";
                echo "<td>" . $row['pilihan_transportasi'] . "</td>";
                echo "<td class='action-buttons'>";
                
                // Tombol Edit/Ganti - TAUTAN DIPERBAIKI
                echo "<a href='editdata.php?id=" . $id . "' class='btn-action btn-edit' title='Edit Data'><i class='fas fa-edit'></i> Edit</a>";
                
                // Tombol Hapus - TAUTAN DIPERBAIKI (Inilah yang mengirim ID)
                echo "<a href='hapusdata.php?id=" . $id . "' class='btn-action btn-delete' title='Hapus Data' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><i class='fas fa-trash-alt'></i> Hapus</a>";
                
                echo "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='7' class='no-data'>Belum ada data wisata yang dimasukkan.</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>

      <p class="back-link">
        <i class="fas fa-arrow-left"></i> Kembali ke <a href="inputdata.php">Form Input</a>.
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