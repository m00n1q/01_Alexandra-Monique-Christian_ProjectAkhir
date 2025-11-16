<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | ExploreVista</title>
    <link rel="stylesheet" href="styleaaboutus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <nav class="navbar">
        <a href="landingpage.php" class="logo"><i class="fas fa-route"></i> ExploreVista</a>
        <ul class="nav-links">
            <li><a href="landingpage.php">Home</a></li>
            <li><a href="login.php" class="login-btn">Log In</a></li>
        </ul>
        <div class="hamburger" onclick="document.querySelector('.nav-links').classList.toggle('active')">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <main>
        <section class="full-screen vision-section" id="vision-section">
            <div class="content-box">
                <i class="fas fa-mountain-sun icon-large"></i>
                <h2>Visi Kami: Mewujudkan Petualangan Tanpa Batas</h2>
                <hr>
                <p>Kami percaya bahwa setiap orang berhak mengalami keindahan dunia. ExploreVista hadir sebagai platform terdepan yang mendemokratisasikan pariwisata, menyediakan panduan, jadwal, dan wawasan lokal yang otentik dan mudah diakses, membebaskan Anda dari kerumitan perencanaan perjalanan.</p>
                <p class="mission-text">Misi Kami: Menghubungkan pelancong dengan destinasi tersembunyi, mendukung pariwisata berkelanjutan, dan mempromosikan eksplorasi yang bertanggung jawab.</p>
                <a href="#team-section" class="next-button">Selanjutnya: Kenalan dengan Tim <i class="fas fa-arrow-down"></i></a>
            </div>
        </section>

        <section class="full-screen team-section" id="team-section">
            <div class="content-box">
                <i class="fas fa-users-viewfinder icon-large"></i>
                <h2>Tim di Balik ExploreVista</h2>
                <hr>
                <p>Kami adalah tim kecil pengembang dan traveler sejati yang percaya bahwa petualangan harusnya mudah. Kami tahu betapa rumitnya perencanaan perjalanan, dan itulah mengapa kami membangun ExploreVista. Setiap fitur lahir dari pengalaman kami sendiri di jalan, memastikan Anda mendapatkan solusi yang tidak hanya cerdas secara teknologi, tetapi juga tulus dan benar-benar membantu Anda menikmati setiap perjalanan, dari awal hingga akhir.</p>
                
                <div class="team-grid">
                    <div class="member-card">
                        <img src="abus.png" alt="" class="member-photo">
                        <h4>Halim</h4>
                        <p>Founder & Lead Developer</p>
                    </div>
                    <div class="member-card">
                        <img src="ceo.jpeg" alt="" class="member-photo">
                        <h4>Alexandra</h4>
                        <p>Chief Technology Officer</p>
                    </div>
                </div>
                <a href="landingpage.php" class="back-button"><i class="fas fa-home"></i> Kembali ke Beranda</a>
            </div>
        </section>
    </main>
    
    <footer>
        <hr>
            <p><strong>ExploreVista</strong> - © 2025 Semua Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>