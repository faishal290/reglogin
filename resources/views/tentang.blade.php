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
            <!-- Ikon Rumah / Bangunan (Menggantikan ⌂) -->
            <div class="public-card-icon text-[#1a6840] mb-4" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </div>
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
                    <!-- Ikon Siswa / User (Menggantikan 👩‍🎓) -->
                    <div class="public-card-icon text-[#1a6840] mb-4" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                    </div>
                    <h3>Siswa</h3>
                    <p>Membuat laporan, membuka riwayat laporan sendiri, melihat status penanganan, dan membaca tanggapan admin.</p>
                </article>
                <article class="public-card">
                    <!-- Ikon Admin / Perbaikan (Menggantikan 🛠️) -->
                    <div class="public-card-icon text-[#1a6840] mb-4" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
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