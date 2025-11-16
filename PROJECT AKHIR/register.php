<?php
include 'koneksi.php';


if(isset($_POST['Registrasi'])){ 
    $Nama_lengkap = $_POST['Nama_Lengkap'];
    $ID = $_POST['ID'];
    $Username = $_POST['Username'];
    $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $Usia = $_POST['Usia'];

    //simpan data ke database
    $query = "INSERT INTO login (Nama_Lengkap,ID,Username,password, Usia) VALUES('$Nama_Lengkap','$ID', '$Username', '$Password', '$Usia')";
    //eksekusi query
    $result = mysqli_query($koneksi, $query);

    //cek apakah query berhasil
    if($result){
        //redirect ke halaman login setelah registrasi berhasil
        echo "<script>alert('Registrasi berhasil! Silahkan login.');
        window.location.href='login.php';</script>";
    } else{
        //tampilkan pesan error jika registrasi gagal
        echo "Registrasi gagal. Silahkan coba lagi. Error: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | ExploreVista</title>
    <link rel="stylesheet" href="styleregister.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="register-wrapper">
        <form action="" method="post" class="container">
            <h1>Registrasi Akun</h1>
            <p>Silakan isi formulir ini untuk membuat akun baru.</p>
            <hr>

            <label for="Nama_Lengkap"><b>Nama Lengkap</b></label>
            <input type="text" placeholder="Masukkan Nama Lengkap" name="Nama_Lengkap" id="Nama_lengkap" required>
            
            <label for="ID"><b>ID</b></label>
            <input type="text" placeholder="Masukkan ID" name="ID" id="ID" required>
            
            <label for="Username"><b>Username</b></label>
            <input type="text" placeholder="Masukkan Username" name="Username" id="Username" required>
            
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Masukkan Password" name="password" id="password" required>
            
            <label for="Usia"><b>Usia</b></label>
            <input type="number" placeholder="Masukkan Usia" name="Usia" id="Usia" required>
            
            <button type="submit" name="Registrasi">Registrasi</button>
            <p class="login-text">Sudah punya akun? <a href="login.php">Login di sini</a>.</p>
        </form>
    </div>
        <footer>
        <hr>
            <p><strong>ExploreVista</strong> - © 2025 Semua Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>