<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMKD - Aplikasi Manajemen Kendaraan Dinas Polibatam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS Lokal -->
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">

</head>

<body>
    <!-- Navbar -->
    @include('partials.header')

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center hero-content">
                    <h1>Aplikasi Manajemen Kendaraan Dinas</h1>
                    <p>Sistem terintegrasi untuk pengelolaan peminjaman kendaraan dinas di Politeknik Negeri Batam</p>
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <a href="#features" class="btn btn-primary btn-hero">Jelajahi Fitur</a>
                        <a href="{{ route('auth.login') }}" class="btn btn-light btn-hero">Login Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="section bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Fitur Unggulan</h2>
                <p>Solusi digital untuk manajemen kendaraan dinas yang efisien</p>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="card feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="fas fa-car-alt"></i>
                            </div>
                            <h4 class="card-title">Manajemen Kendaraan</h4>
                            <p class="card-text">Kelola data kendaraan dinas termasuk plat nomor, tipe, status
                                ketersediaan, dan lokasi dengan mudah.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <h4 class="card-title">Peminjaman Online</h4>
                            <p class="card-text">Ajukan peminjaman kendaraan secara online dengan proses yang cepat dan
                                transparan.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h4 class="card-title">Validasi & Persetujuan</h4>
                            <p class="card-text">Proses validasi dan persetujuan peminjaman yang efisien oleh Kepala
                                Unit.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <h4 class="card-title">Pengembalian Kendaraan</h4>
                            <p class="card-text">Proses pengembalian kendaraan yang terstruktur dengan validasi kondisi
                                kendaraan.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="fas fa-bell"></i>
                            </div>
                            <h4 class="card-title">Notifikasi Real-time</h4>
                            <p class="card-text">Dapatkan pemberitahuan status peminjaman dan pengembalian secara
                                real-time.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <h4 class="card-title">Rekapitulasi Data</h4>
                            <p class="card-text">Laporan lengkap dan analisis penggunaan kendaraan dinas untuk evaluasi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section">
        <div class="container">
            <div class="section-title">
                <h2>Tentang AMKD</h2>
                <p>Mengenal lebih dalam tentang aplikasi kami</p>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0 about-content">
                    <h3 class="mb-4">Solusi Digital untuk Manajemen Kendaraan Dinas</h3>
                    <p class="mb-4">AMKD (Aplikasi Manajemen Kendaraan Dinas) adalah sistem informasi berbasis web
                        yang dikembangkan untuk menggantikan proses manual dalam pengelolaan peminjaman kendaraan dinas
                        di lingkungan Politeknik Negeri Batam.</p>
                    <p class="mb-5">Aplikasi ini bertujuan untuk mempermudah proses peminjaman, persetujuan, serta
                        monitoring status kendaraan oleh berbagai pihak yang terlibat termasuk Dosen/Tendik, Kepala
                        Unit, dan Admin.</p>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="stat-box">
                                <h3>3</h3>
                                <p class="mb-0">Role Pengguna</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="stat-box">
                                <h3>12+</h3>
                                <p class="mb-0">Fitur Utama</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="stat-box">
                                <h3>24/7</h3>
                                <p class="mb-0">Akses Sistem</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="{{ asset('img/7197526.jpg') }}"
                            alt="Tentang AMKD" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- User Roles Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Role Pengguna</h2>
                <p>Sistem dirancang untuk berbagai jenis pengguna dengan hak akses berbeda</p>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card role-card h-100">
                        <div class="card-body p-4">
                            <div class="role-icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <h4 class="card-title text-center mb-4">Dosen/Tendik</h4>
                            <ul>
                                <li>Login ke sistem</li>
                                <li>Mengajukan peminjaman kendaraan</li>
                                <li>Melihat status pengajuan</li>
                                <li>Melakukan pengembalian kendaraan</li>
                                <li>Melihat riwayat peminjaman</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card role-card h-100">
                        <div class="card-body p-4">
                            <div class="role-icon">
                                <i class="fas fa-user-cog"></i>
                            </div>
                            <h4 class="card-title text-center mb-4">Admin</h4>
                            <ul>
                                <li>Menambahkan akun pengguna</li>
                                <li>Mengelola data pengguna</li>
                                <li>Memantau pemakaian kendaraan</li>
                                <li>Melakukan validasi data</li>
                                <li>Membuat laporan bulanan</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card role-card h-100">
                        <div class="card-body p-4">
                            <div class="role-icon">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <h4 class="card-title text-center mb-4">Kepala Unit</h4>
                            <ul>
                                <li>Menambahkan kendaraan dinas</li>
                                <li>Mengelola data kendaraan</li>
                                <li>Memberikan persetujuan peminjaman</li>
                                <li>Validasi pengembalian kendaraan</li>
                                <li>Memantau ketersediaan kendaraan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="section">
        <div class="container">
            <div class="section-title">
                <h2>Tim Pengembang</h2>
                <p>Mahasiswa Program Studi Teknologi Rekayasa Perangkat Lunak Polibatam</p>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="team-card">
                        <img src="{{ asset('img/Picture1.png') }}"
                            class="team-img" alt="Chris Jericho Sembiring">
                        <div class="team-info">
                            <h5>Chris Jericho Sembiring</h5>
                            <p class="text-muted">4342411084</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="team-card">
                        <img src="{{ asset('img/Picture2.png') }}"
                            class="team-img" alt="Andi Hardiansya Permana">
                        <div class="team-info">
                            <h5>Andi Hardiansya Permana</h5>
                            <p class="text-muted">4342411068</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="team-card">
                        <img src="{{ asset('img/Picture3.png') }}"
                            class="team-img" alt="Dicky Dwi Hardana Putra">
                        <div class="team-info">
                            <h5>Dicky Dwi Hardana Putra</h5>
                            <p class="text-muted">4342411087</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="team-card">
                        <img src="{{ asset('img/Picture4.png') }}"
                            class="team-img" alt="Yetro Zipora Elkana Sitohang">
                        <div class="team-info">
                            <h5>Yetro Zipora Elkana Sitohang</h5>
                            <p class="text-muted">4342411064</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="team-card">
                        <img src="{{ asset('img/Picture5.png') }}"
                            class="team-img" alt="Andryan Marcellino Simarmata">
                        <div class="team-info">
                            <h5>Andryan Marcellino Simarmata</h5>
                            <p class="text-muted">4342411080</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="team-card">
                        <img src="{{ asset('img/Picture6.png') }}"
                            class="team-img" alt="Aditya Abrar">
                        <div class="team-info">
                            <h5>Aditya Abrar</h5>
                            <p class="text-muted">4342411089</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section contact-section">
        <div class="contact-overlay"></div>
        <div class="container contact-content">
            <div class="section-title text-white">
                <h2>Kontak Kami</h2>
                <p>Jika Anda memiliki pertanyaan atau membutuhkan bantuan terkait aplikasi ini, silakan hubungi kami.
                </p>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="contact-info">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h5>Lokasi</h5>
                                <p>Jl. Ahmad Yani, Batam 29461</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h5>Email</h5>
                                <p>amkd@polibatam.ac.id</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h5>Telepon</h5>
                                <p>(0778) 469858</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h5>Jam Operasional</h5>
                                <p>Senin - Jumat: 08:00 - 16:00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0730002595243!2d104.01881797496489!3d1.1148322622517605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da3a21d8f14c7f%3A0x727b55c63b5cfef!2sPoliteknik%20Negeri%20Batam!5e0!3m2!1sid!2sid!4v1682990273839!5m2!1sid!2sid"
                            allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <a href="#" class="footer-logo text-white"><i class="fas fa-car me-2"></i>AMKD</a>
                    <p>Aplikasi Manajemen Kendaraan Dinas Politeknik Negeri Batam</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-5 mb-md-0 footer-links">
                    <h5>Tautan Cepat</h5>
                    <ul>
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#features">Fitur</a></li>
                        <li><a href="#about">Tentang</a></li>
                        <li><a href="#team">Tim</a></li>
                        <li><a href="#">Login</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-links">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Bantuan</a></li>
                        <li><a href="#">Kebijakan Cookie</a></li>
                    </ul>
                </div>
            </div>

            <div class="copyright">
                <p>&copy; 2025 AMKD - Politeknik Negeri Batam. Seluruh hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Smooth Scroll -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 70,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
                navbar.style.padding = '10px 0';
            } else {
                navbar.classList.remove('navbar-scrolled');
                navbar.style.padding = '15px 0';
            }
        });
    </script>
</body>

</html>
