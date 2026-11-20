<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1a6840">
    <title>Tentang Aplikasi - Pengaduan Sarana Sekolah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="public-page">
    @include('layouts.partials.public-nav')

    <main class="public-content">
        <header class="public-intro">
            <p class="public-eyebrow">Mengenal layanan</p>
            <h1>Tentang Aplikasi Pengaduan</h1>
            <p>Sarana bagi siswa untuk menyampaikan laporan fasilitas sekolah dan memantau tindak lanjutnya melalui satu aplikasi.</p>
        </header>

        <section class="public-card">
            <div class="public-card-icon" aria-hidden="true">⌂</div>
            <h2 class="purpose-heading">Tujuan Aplikasi</h2>
            <p>Aplikasi Pengaduan Sarana Sekolah membantu siswa menyampaikan kondisi fasilitas yang perlu diperhatikan. Laporan dicatat agar dapat ditinjau oleh admin sekolah, yang dapat memperbarui status serta menambahkan tanggapan.</p>
            <p>Siswa dapat membuka daftar Aktivitas untuk melihat laporan miliknya, detail status, dan tanggapan admin jika tersedia.</p>
        </section>

        <section class="public-section">
            <div class="public-section-heading">
                <h2>Siapa yang menggunakan aplikasi?</h2>
                <p>Setiap peran memiliki akses sesuai kebutuhan penanganan laporan.</p>
            </div>
            <div class="public-grid">
                <article class="public-card">
                    <div class="public-card-icon" aria-hidden="true">👩‍🎓</div>
                    <h3>Siswa</h3>
                    <p>Membuat laporan, membuka riwayat laporan sendiri, melihat status penanganan, dan membaca tanggapan admin.</p>
                </article>
                <article class="public-card">
                    <div class="public-card-icon" aria-hidden="true">🛠️</div>
                    <h3>Admin sekolah</h3>
                    <p>Meninjau laporan, mengubah status penanganan, dan menuliskan keterangan untuk siswa.</p>
                </article>
            </div>
        </section>

        <section class="public-section">
            <div class="public-section-heading">
                <h2>Alur status laporan</h2>
                <p>Status menunjukkan tahap penanganan yang terakhir dicatat admin.</p>
            </div>
            <div class="public-card status-list" aria-label="Arti status laporan">
                <div class="status-row">
                    <span class="status-badge">Aspirasi</span>
                    <p>Laporan baru tercatat dan menunggu tindak lanjut.</p>
                </div>
                <div class="status-row">
                    <span class="status-badge progress">Proses</span>
                    <p>Laporan sedang ditangani.</p>
                </div>
                <div class="status-row">
                    <span class="status-badge done">Selesai</span>
                    <p>Penanganan laporan telah ditandai selesai oleh admin.</p>
                </div>
            </div>
        </section>

        <section class="public-section">
            <div class="public-section-heading">
                <h2>Informasi dan privasi laporan</h2>
            </div>
            <div class="public-callout">
                Saat membuat laporan, siswa mengisi kategori/tempat dan uraian aspirasi. Tanggal terisi otomatis, sedangkan foto dapat dilampirkan secara opsional. Laporan siswa ditampilkan pada akun pemiliknya; admin dapat melihat laporan beserta nama dan email akun pelapor untuk menindaklanjutinya.
            </div>
        </section>

        <section class="public-section">
            <div class="public-section-heading">
                <h2>Tentang sekolah</h2>
                <p>Profil sekolah sebagai konteks layanan pengaduan sarana.</p>
            </div>
            <div class="public-card school-profile">
                <div>
                    <h3>Profil singkat</h3>
                    <p>SMK Muhammadiyah 1 Bantul berkomitmen mencetak generasi muda yang unggul di bidang teknologi dan industri. Aplikasi ini menjadi salah satu wadah komunikasi siswa dan pihak sekolah terkait kondisi fasilitas belajar.</p>
                </div>
                <div>
                    <h3>Visi</h3>
                    <blockquote>“Membentuk tamatan yang berakhlak mulia, berprestasi, mandiri, dan berdaya saing di tingkat lokal maupun nasional.”</blockquote>
                </div>
                <div>
                    <h3>Nilai layanan</h3>
                    <p>Keterbukaan, kedisiplinan, dan pelayanan yang mendukung lingkungan belajar yang lebih baik.</p>
                </div>
            </div>
        </section>

        <div class="public-actions">
            <a href="{{ route('panduan') }}" class="hero-button secondary light">Lihat Panduan</a>
            <a href="{{ route('login') }}" class="hero-button primary">Mulai Lapor</a>
        </div>
    </main>

    <div class="public-footer">
        @include('layouts.partials.footer')
    </div>
</body>
</html>
