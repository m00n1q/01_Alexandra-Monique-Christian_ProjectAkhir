<?php
// 1. Sertakan file koneksi database
include 'koneksi.php';

// 2. Cek apakah parameter ID ('id') ada di URL 
if (isset($_GET['id'])) { 
    // Ambil dan bersihkan ID (nilai id_wisata)
    $id_wisata_to_delete = mysqli_real_escape_string($koneksi, $_GET['id']);

    // 3. Buat query DELETE
    // PENTING: Menggunakan kolom Primary Key: id_wisata
    $query_delete = "DELETE FROM list_wisata WHERE id_wisata = '$id_wisata_to_delete'";

    // 4. Jalankan query
    if (mysqli_query($koneksi, $query_delete)) {
        // Jika penghapusan berhasil
        header("Location: hsilinput.php?status=hapus_sukses");
        exit();
    } else {
        // Jika penghapusan gagal, ini akan menampilkan error SQL di URL (untuk debugging)
        header("Location: hsilinput.php?status=hapus_gagal&error=" . urlencode(mysqli_error($koneksi)));
        exit();
    }
} else {
    // Jika tidak ada ID yang diberikan
    header("Location: hsilinput.php?status=id_tidak_ditemukan");
    exit();
}
?>