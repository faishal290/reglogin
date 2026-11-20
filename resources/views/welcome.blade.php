<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Sarana Sekolah - SMK Muhammadiyah 1 Bantul</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="landing-page">
    <!-- Navbar Hijau -->
    <nav class="landing-nav" aria-label="Navigasi utama">
        <div class="landing-nav-inner">
            <a class="brand" href="{{ route('home') }}" aria-label="Beranda Pengaduan Sarana Sekolah">
                <img src="{{ asset('images/logo msb.png') }}" alt="Logo">
                <div class="brand-copy">
                    <strong>Pengaduan Sarana Sekolah</strong>
                    <span>SMK Muhammadiyah 1 Bantul</span>
                </div>
            </a>

            <div class="desktop-menu">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'active' : '' }}">Tentang</a>
                <a href="{{ route('fitur') }}" class="{{ request()->routeIs('fitur') ? 'active' : '' }}">Fitur Layanan</a>
                <a href="{{ route('panduan') }}" class="{{ request()->routeIs('panduan') ? 'active' : '' }}">Panduan</a>
            </div>

            <div class="nav-actions">
                <a href="{{ route('login') }}" class="login-button">Masuk</a>
                <button id="mobile-menu-button" class="menu-button" type="button" aria-label="Buka menu navigasi">
                    <svg width="26" height="26" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="mobile-menu">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'active' : '' }}">Tentang</a>
            <a href="{{ route('fitur') }}" class="{{ request()->routeIs('fitur') ? 'active' : '' }}">Fitur Layanan</a>
            <a href="{{ route('panduan') }}" class="{{ request()->routeIs('panduan') ? 'active' : '' }}">Panduan</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="hero">
        <img src="{{ asset('images/img.jpg') }}" alt="Gedung SMK Muhammadiyah 1 Bantul" class="hero-image">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h2>Sampaikan Aspirasi Anda<br>Untuk Sekolah yang Lebih Baik</h2>
            <p>Sistem pengaduan sarana dan prasarana sekolah yang mudah, transparan, dan terintegrasi.</p>
            <div class="hero-actions">
                <a href="{{ route('login') }}" class="hero-button primary">Mulai Lapor</a>
                <a href="{{ route('panduan') }}" class="hero-button secondary">Panduan</a>
            </div>
        </div>
    </main>

    <!-- Section: Fitur Unggulan -->
    <section class="section">
        <div class="section-inner">
            <div class="section-title">
                <h3>Mengapa Menggunakan Aplikasi Ini?</h3>
                <p>Dirancang untuk memudahkan siswa dan pihak sekolah dalam menangani laporan sarana secara cepat dan transparan.</p>
            </div>
            <div class="features-grid">
                <!-- Fitur 1: Lapor Cepat -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h4>Lapor Cepat</h4>
                    <p>Sampaikan keluhan atau kerusakan sarana hanya dalam hitungan detik melalui formulir online.</p>
                </div>
                <!-- Fitur 2: Bukti Foto -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h4>Bukti Foto</h4>
                    <p>Lampirkan foto kerusakan agar laporan lebih akurat dan memudahkan petugas dalam penanganan.</p>
                </div>
                <!-- Fitur 3: Pantau Progres -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h4>Pantau Progres</h4>
                    <p>Lihat status laporan Anda secara real-time: dari Aspirasi, diproses, hingga selesai diperbaiki.</p>
                </div>
                <!-- Fitur 4: Aman & Transparan -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h4>Aman & Transparan</h4>
                    <p>Data Anda terlindungi. Tanggapan dari Admin dapat dilihat langsung melalui dashboard siswa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Alur Pengaduan -->
    <section class="section section-white">
        <div class="section-inner">
            <div class="section-title">
                <h3>Alur Pengaduan</h3>
                <p>Hanya butuh 3 langkah mudah untuk menyampaikan aspirasi Anda.</p>
            </div>
            <div class="steps-grid">
                <div class="step-item">
                    <div class="step-number">1</div>
                    <h4>Login / Daftar</h4>
                    <p>Masuk menggunakan akun siswa yang sudah terdaftar atau daftar terlebih dahulu.</p>
                </div>
                <div class="step-item">
                    <div class="step-number">2</div>
                    <h4>Isi Formulir</h4>
                    <p>Isi kategori, deskripsi aspirasi, tanggal, dan unggah foto bukti kerusakan.</p>
                </div>
                <div class="step-item">
                    <div class="step-number">3</div>
                    <h4>Tunggu Tanggapan</h4>
                    <p>Pantau status perbaikan di dashboard. Admin akan segera menindaklanjuti laporan Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Statistik Singkat -->
    <section class="stats-section">
        <div class="stats-grid">
            <div>
                <div class="stat-number">150+</div>
                <div class="stat-label">Laporan Masuk</div>
            </div>
            <div>
                <div class="stat-number">120+</div>
                <div class="stat-label">Laporan Selesai</div>
            </div>
            <div>
                <div class="stat-number">500+</div>
                <div class="stat-label">Siswa Terdaftar</div>
            </div>
        </div>
    </section>

    @include('layouts.partials.footer')

    <!-- Script Mobile Menu -->
    <script>
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        menuButton.addEventListener('click', function() {
            const isOpen = mobileMenu.classList.toggle('open');
            menuButton.setAttribute('aria-expanded', String(isOpen));
        });
    </script>
</body>
</html>