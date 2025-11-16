<?php
session_start();
include 'koneksi.php';

$error_message = ""; // Inisialisasi variabel pesan error

if (isset($_POST['login'])) {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    $query = "SELECT * FROM login WHERE Username ='$Username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($Password, $row['Password'])) {
            $_SESSION['Username'] = $row['Username'];
            header('Location: inputdata.php');
            exit();
        } else {
            // Mengganti echo dengan mengisi variabel pesan error
            $error_message = "Password yang Anda masukkan salah. Silakan coba lagi.";
        }
    } else {
        // Mengganti echo dengan mengisi variabel pesan error
        $error_message = "Username tidak ditemukan. Silakan cek kembali.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page | ExploreVista</title>
    <link rel="stylesheet" href="stylelogen.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<nav class="navbar">
    <a href="landingpage.php" class="logo"><i class="fas fa-route"></i> ExploreVista</a>
    <ul class="nav-links">
        <li><a href="landingpage.php">Home</a></li>
        <li><a href="aboutus.php">About us</a></li>
    </ul>
</nav>
    
    <div class="login-wrapper"> 
        <?php if (!empty($error_message)): ?>
            <div id="error-alert" class="error-alert">
                <i class="fas fa-exclamation-triangle"></i> <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form action="" method="post" class="container">
        <div>
            <h2>Login ke Akun Anda</h2>
            
            <label for="Username"><b>Username</b></label>
            <input type="text" placeholder="Masukkan Username" name="Username" required>
            
            <label for="Password"><b>Masukkan Password</b></label>
            <input type="password" placeholder="Masukkan Password" name="Password" id="Password" required>
            
            <button type="submit" name="login">Login</button>
            <p class="register-text">Belum punya akun? <a href="register.php">Registrasi di sini</a>.</p>
        </div>
        </form>
    </div>
<footer class="website-footer-wrapper">
        <hr class="footer-line">
        <div class="website-footer">
            <p><strong>ExploreVista</strong> - © 2025 Semua Hak Cipta Dilindungi.</p>
        </div>
    </footer>
</body>
</html>