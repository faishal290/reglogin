<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1a6840">
    <title>Fitur Layanan - Pengaduan Sarana Sekolah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="public-page">
    @include('layouts.partials.public-nav')

    <main class="public-content">
        <header class="public-intro">
            <p class="public-eyebrow">Layanan yang tersedia</p>
            <h1>Fitur Pengaduan Sarana</h1>
            <p>Fitur untuk mengirim laporan, melihat tindak lanjut, dan membantu admin mengelola laporan sekolah.</p>
        </header>

        <section class="public-grid" aria-label="Fitur siswa">
            <article class="public-card">
                <div class="public-card-icon" aria-hidden="true">✍️</div>
                <h2>Buat laporan</h2>
                <p>Isi kategori/tempat dan uraian kondisi fasilitas yang perlu ditangani. Kolom kategori/tempat berupa isian teks, jadi tuliskan lokasi yang jelas.</p>
                <div class="public-actions align-start">
                    <a href="{{ route('login') }}" class="hero-button primary">Buat laporan</a>
                </div>
            </article>

            <article class="public-card">
                <div class="public-card-icon" aria-hidden="true">📷</div>
                <h2>Lampiran foto opsional</h2>
                <p>Foto dapat membantu menjelaskan kondisi fasilitas. Lampiran tidak wajib; format yang diterima JPG atau PNG dengan ukuran maksimal 2 MB.</p>
            </article>

            <article class="public-card">
                <div class="public-card-icon" aria-hidden="true">📍</div>
                <h2>Pantau status laporan</h2>
                <p>Buka Aktivitas dan pilih detail laporan untuk melihat status terakhir yang dicatat admin.</p>
                <div class="status-list compact">
                    <div class="status-row"><span class="status-badge">Aspirasi</span><p>Laporan baru.</p></div>
                    <div class="status-row"><span class="status-badge progress">Proses</span><p>Sedang ditangani.</p></div>
                    <div class="status-row"><span class="status-badge done">Selesai</span><p>Ditandai selesai oleh admin.</p></div>
                </div>
            </article>

            <article class="public-card">
                <div class="public-card-icon" aria-hidden="true">💬</div>
                <h2>Tanggapan admin</h2>
                <p>Admin dapat menambahkan keterangan pada laporan. Tanggapan dapat dibaca siswa di halaman detail laporan jika sudah tersedia.</p>
            </article>

            <article class="public-card">
                <div class="public-card-icon" aria-hidden="true">🗂️</div>
                <h2>Riwayat pribadi</h2>
                <p>Halaman Aktivitas menampilkan laporan milik akun siswa yang sedang masuk. Dari sana, siswa dapat membuka detail atau menghapus laporan.</p>
            </article>

            <article class="public-card">
                <div class="public-card-icon" aria-hidden="true">⚙️</div>
                <h2>Pengelolaan admin</h2>
                <p>Panel admin menyediakan pencarian berdasarkan kategori/tempat atau nama pelapor, filter status, serta aksi untuk memperbarui status dan tanggapan.</p>
            </article>
        </section>

        <section class="public-section public-callout">
            <strong>Catatan:</strong> status ditampilkan berdasarkan pembaruan yang disimpan admin. Muat ulang halaman Aktivitas atau detail laporan untuk melihat perubahan terbaru.
        </section>

        <div class="public-actions">
            <a href="{{ route('panduan') }}" class="hero-button secondary light">Baca Panduan</a>
            <a href="{{ route('login') }}" class="hero-button primary">Masuk ke aplikasi</a>
        </div>
    </main>

    <div class="public-footer">
        @include('layouts.partials.footer')
    </div>
</body>
</html>
