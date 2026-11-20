<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1a6840">
    <title>Panduan - Pengaduan Sarana Sekolah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="public-page">
    @include('layouts.partials.public-nav')

    <main class="public-content">
        <header class="public-intro">
            <p class="public-eyebrow">Langkah demi langkah</p>
            <h1>Panduan Penggunaan</h1>
            <p>Ikuti panduan berikut untuk membuat laporan dan melihat tindak lanjutnya.</p>
        </header>

        <section class="public-section">
            <div class="public-section-heading">
                <h2>Untuk siswa</h2>
                <p>Siapkan akun dan informasi lokasi fasilitas sebelum mengirim laporan.</p>
            </div>
            <div class="public-card guide-steps">
                <article class="guide-step">
                    <span class="guide-step-number">1</span>
                    <div>
                        <h3>Daftar atau masuk</h3>
                        <p>Gunakan akun siswa. Jika mendaftar, lengkapi nama dan email serta buat password minimal 8 karakter.</p>
                    </div>
                </article>
                <article class="guide-step">
                    <span class="guide-step-number">2</span>
                    <div>
                        <h3>Buka Tambah Pengaduan</h3>
                        <p>Pilih menu Tambah Pengaduan pada dashboard siswa.</p>
                    </div>
                </article>
                <article class="guide-step">
                    <span class="guide-step-number">3</span>
                    <div>
                        <h3>Isi detail laporan</h3>
                        <p>Tuliskan kategori/tempat dan uraian masalah dengan jelas. Tanggal laporan diisi otomatis oleh formulir.</p>
                    </div>
                </article>
                <article class="guide-step">
                    <span class="guide-step-number">4</span>
                    <div>
                        <h3>Lampirkan foto bila perlu</h3>
                        <p>Foto bersifat opsional. Jika melampirkan, gunakan format JPG atau PNG dengan ukuran maksimal 2 MB.</p>
                    </div>
                </article>
                <article class="guide-step">
                    <span class="guide-step-number">5</span>
                    <div>
                        <h3>Kirim dan pantau laporan</h3>
                        <p>Tekan Kirim, lalu buka menu Aktivitas untuk melihat daftar laporan milik Anda. Pilih Detail untuk memeriksa status dan tanggapan admin.</p>
                    </div>
                </article>
            </div>
        </section>

        <section class="public-section">
            <div class="public-section-heading">
                <h2>Memahami status laporan</h2>
                <p>Status diperbarui admin dan ditampilkan pada daftar serta detail laporan.</p>
            </div>
            <div class="public-card status-list">
                <div class="status-row">
                    <span class="status-badge">Aspirasi</span>
                    <p>Laporan sudah tercatat dan menunggu tindak lanjut.</p>
                </div>
                <div class="status-row">
                    <span class="status-badge progress">Proses</span>
                    <p>Laporan sedang ditangani oleh pihak sekolah.</p>
                </div>
                <div class="status-row">
                    <span class="status-badge done">Selesai</span>
                    <p>Admin telah menandai penanganan laporan selesai.</p>
                </div>
            </div>
        </section>

        <section class="public-section">
            <div class="public-section-heading">
                <h2>Untuk admin</h2>
            </div>
            <div class="public-card">
                <p>Masuk menggunakan akun admin, lalu buka daftar Pengaduan. Cari laporan berdasarkan kategori/tempat atau nama pelapor, atau gunakan filter status. Buka detail untuk meninjau isi laporan, kemudian perbarui status dan tambahkan tanggapan sebelum menyimpan perubahan.</p>
            </div>
        </section>

        <section class="public-section public-callout">
            <strong>Privasi:</strong> laporan siswa dapat dilihat oleh pemilik akun dan admin. Nama serta email akun pelapor ditampilkan kepada admin untuk membantu proses tindak lanjut.
        </section>

        <div class="public-actions">
            <a href="{{ route('fitur') }}" class="hero-button secondary light">Lihat Fitur</a>
            <a href="{{ route('login') }}" class="hero-button primary">Masuk dan mulai</a>
        </div>
    </main>

    <div class="public-footer">
        @include('layouts.partials.footer')
    </div>
</body>
</html>
