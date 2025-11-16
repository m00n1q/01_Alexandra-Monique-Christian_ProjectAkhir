<?php
include 'koneksi.php';

// --- BAGIAN 1: Mengambil Data Lama untuk Ditampilkan di Form ---
$data_lama = null;
$id_wisata = '';
$error_message = '';

// 1. Cek apakah ID ada di URL (dari hsilinput.php)
if (isset($_GET['id'])) {
    $id_wisata = mysqli_real_escape_string($koneksi, $_GET['id']);
    
    // Query untuk mengambil semua data berdasarkan ID
    $query_select = "SELECT * FROM list_wisata WHERE id_wisata = '$id_wisata'";
    $result_select = mysqli_query($koneksi, $query_select);

    if (mysqli_num_rows($result_select) == 1) {
        $data_lama = mysqli_fetch_assoc($result_select);
    } else {
        $error_message = "Data wisata dengan ID tersebut tidak ditemukan.";
    }
} else {
    // Jika tidak ada ID, redirect kembali ke halaman list data
    header("Location: hsilinput.php");
    exit();
}


// --- BAGIAN 2: Memproses Pengiriman Form (Update Data) ---
if (isset($_POST['update'])) {
    // Ambil data dari form (Pastikan nama 'name' di form cocok dengan nama kolom)
    $id_update              = mysqli_real_escape_string($koneksi, $_POST['id_wisata']);
    $destinasi_update       = mysqli_real_escape_string($koneksi, $_POST['destinasi']);
    $itinerary_update       = mysqli_real_escape_string($koneksi, $_POST['itinerary']);
    $harga_update           = mysqli_real_escape_string($koneksi, $_POST['harga']);
    $tanggal_update         = mysqli_real_escape_string($koneksi, $_POST['tanggal_pelaksanaan']);
    $jumlah_maksimal_update = mysqli_real_escape_string($koneksi, $_POST['jumlah_maksimal']);
    $transportasi_update    = mysqli_real_escape_string($koneksi, $_POST['pilihan_transportasi']);
    
    // Query UPDATE
    $query_update = "UPDATE list_wisata SET
                     destinasi = '$destinasi_update',
                     itinerary = '$itinerary_update',
                     harga = '$harga_update',
                     tanggal_pelaksanaan = '$tanggal_update',
                     jumlah_maksimal = '$jumlah_maksimal_update',
                     pilihan_transportasi = '$transportasi_update'
                     WHERE id_wisata = '$id_update'";

    if (mysqli_query($koneksi, $query_update)) {
        // Jika UPDATE berhasil, redirect ke halaman List Data dengan status sukses
        header("Location: hsilinput.php?status=edit_sukses");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        $error_message = "Gagal memperbarui data: " . mysqli_error($koneksi);
        // Untuk menampilkan data terbaru di form setelah gagal update,
        // Anda mungkin perlu me-reload data_lama di sini, atau menyertakan pesan error.
    }
}

// Jika data_lama tidak ditemukan, hentikan eksekusi kode HTML
if (!$data_lama && !$error_message) {
    echo "Data tidak valid atau tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Wisata | ExploreVista</title>
    <link rel="stylesheet" href="styleedit.css"> 
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
</nav>

<div class="main-wrapper">
    <div class="container input-form-container">
        <h1>Edit Data Wisata</h1>
        <p>Ubah detail destinasi yang telah diinput.</p>
        <hr>

        <?php if ($error_message): ?>
            <div style="color: red; padding: 10px; border: 1px solid red; margin-bottom: 20px;">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <?php if ($data_lama): ?>
        <form action="" method="post" class="wisata-form">
            <input type="hidden" name="id_wisata" value="<?php echo htmlspecialchars($data_lama['id_wisata']); ?>">

            <div class="form-group">
                <label for="destinasi">Destinasi</label>
                <input type="text" id="destinasi" name="destinasi" 
                       value="<?php echo htmlspecialchars($data_lama['destinasi']); ?>" required>
            </div>

            <div class="form-group">
                <label for="itinerary">Itinerary (Rencana Perjalanan)</label>
                <input type="text" id="itinerary" name="itinerary" 
                       value="<?php echo htmlspecialchars($data_lama['itinerary']); ?>" required>
            </div>

            <div class="form-group">
                <label for="harga">Harga Tiket (Rp)</label>
                <input type="number" id="harga" name="harga" 
                       value="<?php echo htmlspecialchars($data_lama['harga']); ?>" required>
            </div>

            <div class="form-group">
                <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
                <input type="date" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" 
                       value="<?php echo htmlspecialchars($data_lama['tanggal_pelaksanaan']); ?>" required>
            </div>

            <div class="form-group">
                <label for="jumlah_maksimal">Jumlah Maksimal Peserta</label>
                <input type="number" id="jumlah_maksimal" name="jumlah_maksimal" 
                       value="<?php echo htmlspecialchars($data_lama['jumlah_maksimal']); ?>" required>
            </div>

            <div class="form-group">
                <label for="pilihan_transportasi">Pilihan Transportasi</label>
                <select id="pilihan_transportasi" name="pilihan_transportasi" required>
                    <?php 
                        $selected_transportasi = $data_lama['pilihan_transportasi'];
                    ?>
                    <option value="Pesawat" <?php echo ($selected_transportasi == 'Pesawat') ? 'selected' : ''; ?>>Pesawat</option>
                    <option value="Bus" <?php echo ($selected_transportasi == 'Bus') ? 'selected' : ''; ?>>Bus</option>
                    <option value="Kapal" <?php echo ($selected_transportasi == 'Kapal') ? 'selected' : ''; ?>>Kapal</option>
                    <option value="Kereta" <?php echo ($selected_transportasi == 'Kereta') ? 'selected' : ''; ?>>Kereta</option>
                    <option value="Lainnya" <?php echo ($selected_transportasi == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" name="update" class="btn-submit"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
            </div>
        </form>
        <?php endif; ?>

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