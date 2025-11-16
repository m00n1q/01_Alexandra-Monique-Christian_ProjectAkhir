<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ExploreVista | Discover Your Next Journey</title>
  <link rel="stylesheet" href="stylelanding.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body>

  <nav class="navbar">
    <a href="#" class="logo"><i class="fas fa-route"></i> ExploreVista</a>
    <ul class="nav-links">
      <li><a href="aboutus.php">About Us</a></li>
      <li><a href="login.php" class="login-btn">Log In</a></li>
    </ul>
    <div class="hamburger" onclick="document.querySelector('.nav-links').classList.toggle('active')">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </nav>


  <main>
    <section class="hero-section">
      <div class="hero-content">
        <h1>Petualangan Menanti, Jelajahi Sekarang!</h1>
        <p>Temukan destinasi tersembunyi dengan panduan terbaik dan itinerary terorganisir.</p>
        <a href="#start-now-section" class="main-button pulse-effect">GULIR KEBAWAH <i class="fas fa-arrow-down"></i></a>
      </div>
    </section>

    <section class="start-now-section" id="start-now-section">
      <div class="start-now-content">
        <h2>Siap Merencanakan Perjalanan Anda?</h2>
        <p>Kami percaya setiap perjalanan adalah sebuah kisah yang berharga. ExploreVista hadir sebagai jembatan yang menghubungkan Anda dengan pengalaman perjalanan otentik, jadwal yang terorganisir, dan insight lokal terbaik.</p>
        <p class="cta-text">Mulai petualangan tak terlupakan Anda sekarang!</p>
        <a href="login.php" class="explore-button glow-effect"><i class="fas fa-sign-in-alt"></i> MULAI SEKARANG</a>
      </div>
    </section>

    <section class="reviews-section">
      <h2>✨ Kisah Sukses Para Petualang Kami ✨</h2>
      <div class="reviews-grid">
        <div class="review-card">
          <div class="review-header">
            <img src="foto1.jpg" alt="Arina" class="avatar" />
            <div>
              <h4>Arina Setyawati</h4>
              <span class="rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
            </div>
          </div>
          <p>"Jadwal yang ditawarkan ExploreVista sangat rinci dan efisien. Saya berhasil mengunjungi 5 tempat dalam 3 hari tanpa merasa terburu-buru."</p>
        </div>

        <div class="review-card">
          <div class="review-header">
            <img src="fotocowo.jpg.jpg" alt="Budi" class="avatar" />
            <div>
              <h4>Budi Santoso</h4>
              <span class="rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></span>
            </div>
          </div>
          <p>"Aplikasi ini benar-benar mengubah cara saya bepergian. Rekomendasi tempat makannya otentik dan murah. Sangat recommended!"</p>
        </div>

        <div class="review-card">
          <div class="review-header">
            <img src="lbb1.jpg" alt="Citra" class="avatar" />
            <div>
              <h4>Citra Dewi</h4>
              <span class="rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
            </div>
          </div>
          <p>"Saya biasanya kesulitan menyusun itinerary. Dengan ExploreVista, semua jadi mudah. Fitur kolaborasinya juga membantu saat merencanakan perjalanan bareng teman-teman."</p>
        </div>
      </div>
    </section>
  </main>

  <footer class="main-footer">
    <hr class="footer-line" />
    <div class="website-footer">
      <p><strong>ExploreVista</strong> - © 2025 Semua Hak Cipta Dilindungi.</p>
    </div>
  </footer>

</body>
</html>