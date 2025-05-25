<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMKD - Aplikasi Manajemen Kendaraan Dinas Polibatam</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- File CSS lokal -->
    <link rel="stylesheet" href="css/landing.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/landing">
                <i class="fas fa-car me-2"></i>AMKD
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Tim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light ms-2" href="{{ url('/login') }}">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-overlay"></div>
        <div class="container text-center hero-content">
            <h1 class="display-4 fw-bold mb-4">Aplikasi Manajemen Kendaraan Dinas</h1>
            <p class="lead mb-5">Sistem terintegrasi untuk pengelolaan peminjaman kendaraan dinas di Politeknik Negeri
                Batam</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#features" class="btn btn-primary btn-lg px-4">Jelajahi Fitur</a>
                <a href="{{ url('/login') }}" class="btn btn-outline-light btn-lg px-4">Login Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Fitur Unggulan</h2>
                <p class="text-muted">Solusi digital untuk manajemen kendaraan dinas yang efisien</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-car-alt"></i>
                            </div>
                            <h4 class="card-title">Manajemen Kendaraan</h4>
                            <p class="card-text">Kelola data kendaraan dinas termasuk plat nomor, tipe, status
                                ketersediaan, dan lokasi dengan mudah.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <h4 class="card-title">Peminjaman Online</h4>
                            <p class="card-text">Ajukan peminjaman kendaraan secara online dengan proses yang cepat dan
                                transparan.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h4 class="card-title">Validasi & Persetujuan</h4>
                            <p class="card-text">Proses validasi dan persetujuan peminjaman yang efisien oleh Kepala
                                Unit.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <h4 class="card-title">Pengembalian Kendaraan</h4>
                            <p class="card-text">Proses pengembalian kendaraan yang terstruktur dengan validasi kondisi
                                kendaraan.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-bell"></i>
                            </div>
                            <h4 class="card-title">Notifikasi Real-time</h4>
                            <p class="card-text">Dapatkan pemberitahuan status peminjaman dan pengembalian secara
                                real-time.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3">
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
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="fw-bold mb-4">Tentang AMKD</h2>
                    <p>AMKD (Aplikasi Manajemen Kendaraan Dinas) adalah sistem informasi berbasis web yang dikembangkan
                        untuk menggantikan proses manual dalam pengelolaan peminjaman kendaraan dinas di lingkungan
                        Politeknik Negeri Batam.</p>
                    <p>Aplikasi ini bertujuan untuk mempermudah proses peminjaman, persetujuan, serta monitoring status
                        kendaraan oleh berbagai pihak yang terlibat termasuk Dosen/Tendik, Kepala Unit, dan Admin.</p>
                    <div class="d-flex gap-3 mt-4">
                        <div class="about-stat">
                            <h3 class="fw-bold">3</h3>
                            <p class="text-muted">Role Pengguna</p>
                        </div>
                        <div class="about-stat">
                            <h3 class="fw-bold">12+</h3>
                            <p class="text-muted">Fitur Utama</p>
                        </div>
                        <div class="about-stat">
                            <h3 class="fw-bold">24/7</h3>
                            <p class="text-muted">Akses Sistem</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="img/7197526.jpg" alt="Tentang AMKD" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- User Roles Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Role Pengguna</h2>
                <p class="text-muted">Sistem dirancang untuk berbagai jenis pengguna dengan hak akses berbeda</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 role-card">
                        <div class="card-body text-center p-4">
                            <div class="role-icon mb-3 bg-primary">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <h4 class="card-title">Dosen/Tendik</h4>
                            <ul class="text-start">
                                <li>Login ke sistem</li>
                                <li>Mengajukan peminjaman kendaraan</li>
                                <li>Melihat status pengajuan</li>
                                <li>Melakukan pengembalian kendaraan</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 role-card">
                        <div class="card-body text-center p-4">
                            <div class="role-icon mb-3 bg-success">
                                <i class="fas fa-user-cog"></i>
                            </div>
                            <h4 class="card-title">Admin</h4>
                            <ul class="text-start">
                                <li>Menambahkan akun pengguna</li>
                                <li>Mengelola data pengguna</li>
                                <li>Memantau pemakaian kendaraan</li>
                                <li>Melakukan validasi data</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 role-card">
                        <div class="card-body text-center p-4">
                            <div class="role-icon mb-3 bg-warning">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <h4 class="card-title">Kepala Unit</h4>
                            <ul class="text-start">
                                <li>Menambahkan kendaraan dinas</li>
                                <li>Mengelola data kendaraan</li>
                                <li>Memberikan persetujuan peminjaman</li>
                                <li>Validasi pengembalian kendaraan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <!-- Team Section -->
    <section id="team" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Tim Pengembang</h2>
                <p class="text-muted">Mahasiswa Program Studi Teknologi Rekayasa Perangkat Lunak Polibatam</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-md-4 col-lg-3">
                    <div class="card team-card">
                        <img src="img/Picture1.png" class="card-img-top" alt="Team Member">
                        <div class="card-body text-center">
                            <h5 class="card-title">Chris Jericho Sembiring</h5>
                            <p class="card-text text-muted">4342411084</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3">
                    <div class="card team-card">
                        <img src="img/Picture2.png" class="card-img-top" alt="Team Member">
                        <div class="card-body text-center">
                            <h5 class="card-title">Andi Hardiansya Permana</h5>
                            <p class="card-text text-muted">4342411068</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3">
                    <div class="card team-card">
                        <img src="img/Picture3.png" class="card-img-top" alt="Team Member">
                        <div class="card-body text-center">
                            <h5 class="card-title">Dicky Dwi Hardana Putra</h5>
                            <p class="card-text text-muted">4342411087</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3">
                    <div class="card team-card">
                        <img src="img/Picture4.png" class="card-img-top" alt="Team Member">
                        <div class="card-body text-center">
                            <h5 class="card-title">Yetro Zipora Elkana Sitohang</h5>
                            <p class="card-text text-muted">4342411064</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3">
                    <div class="card team-card">
                        <img src="img/Picture5.png" class="card-img-top" alt="Team Member">
                        <div class="card-body text-center">
                            <h5 class="card-title">Andryan Marcellino Simarmata</h5>
                            <p class="card-text text-muted">4342411080</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3">
                    <div class="card team-card">
                        <img src="img/Picture6.png" class="card-img-top" alt="Team Member">
                        <div class="card-body text-center">
                            <h5 class="card-title">Nama Anggota Baru</h5>
                            <p class="card-text text-muted">NIM Anggota Baru</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="fw-bold mb-4">Kontak Kami</h2>
                    <p>Jika Anda memiliki pertanyaan atau membutuhkan bantuan terkait aplikasi ini, silakan hubungi
                        kami.</p>
                    <div class="contact-info mt-4">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-map-marker-alt me-3"></i>
                            <div>
                                <h5 class="mb-0">Lokasi</h5>
                                <p class="mb-0">Jl. Ahmad Yani, Batam 29461</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-envelope me-3"></i>
                            <div>
                                <h5 class="mb-0">Email</h5>
                                <p class="mb-0">amkd@polibatam.ac.id</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-phone me-3"></i>
                            <div>
                                <h5 class="mb-0">Telepon</h5>
                                <p class="mb-0">(0778) 469858</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0730002595243!2d104.01881797496489!3d1.1148322622517605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da3a21d8f14c7f%3A0x727b55c63b5cfef!2sPoliteknik%20Negeri%20Batam!5e0!3m2!1sid!2sid!4v1682990273839!5m2!1sid!2sid"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <h5 class="fw-bold mb-3"><i class="fas fa-car me-2"></i>AMKD</h5>
                    <p>Aplikasi Manajemen Kendaraan Dinas Politeknik Negeri Batam</p>
                    <div class="social-icons">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <h5 class="fw-bold mb-3">Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#home" class="text-white">Beranda</a></li>
                        <li class="mb-2"><a href="#features" class="text-white">Fitur</a></li>
                        <li class="mb-2"><a href="#about" class="text-white">Tentang</a></li>
                        <li><a href="#team" class="text-white">Tim</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3">Legal</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white">Kebijakan Privasi</a></li>
                        <li class="mb-2"><a href="#" class="text-white">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="text-white">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 AMKD - Politeknik Negeri Batam. Seluruh hak cipta dilindungi.</p>
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
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>
