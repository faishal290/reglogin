<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fitur Layanan - Pengaduan Sekolah</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg: #f8f9fa;
      --card: #ffffff;
      --border: #e3e6ea;
      --heading: #14213d;
      --text: #4a5260;
      --accent: #0b6b4a;
      --accent-soft: #e6f2ed;
    }

    * { box-sizing: border-box; }

    body {
      margin: 0;
      font-family: "Poppins", system-ui, sans-serif;
      background: var(--bg);
      color: var(--text);
    }

    .fitur {
      max-width: 920px;
      margin: 0 auto;
      padding: 32px 24px 48px;
    }

    .fitur-judul {
      margin: 0 0 28px;
      padding-left: 18px;
      border-left: 5px solid var(--accent);
      font-size: 2rem;
      font-weight: 700;
      line-height: 1.2;
      color: var(--heading);
    }

    .fitur-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 24px;
    }

    .kartu {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      padding: 24px;
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(20, 33, 61, 0.08);
    }

    .ikon {
      display: grid;
      place-items: center;
      width: 44px;
      height: 44px;
      margin-bottom: 16px;
      border-radius: 10px;
      background: var(--accent-soft);
      color: var(--accent);
    }

    .ikon svg {
      width: 22px;
      height: 22px;
      fill: none;
      stroke: currentColor;
      stroke-width: 2;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .kartu h3 {
      margin: 0 0 8px;
      font-size: 1.1rem;
      font-weight: 600;
      color: var(--heading);
    }

    .kartu p {
      margin: 0;
      font-size: 0.9rem;
      line-height: 1.6;
    }

    /* Alur status */
    .alur {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 6px;
      margin: 14px 0 0;
      padding: 0;
      list-style: none;
    }

    .alur li {
      padding: 4px 12px;
      border-radius: 999px;
      background: var(--accent-soft);
      color: var(--accent);
      font-size: 0.8rem;
      font-weight: 500;
    }

    .alur li:last-child {
      background: var(--accent);
      color: #fff;
    }

    /* Garis penghubung berada di luar label, di antara dua label */
    .alur li { position: relative; }

    .alur li + li { margin-left: 16px; }

    .alur li + li::before {
      content: "";
      position: absolute;
      left: -13px;
      top: 50%;
      width: 10px;
      height: 2px;
      background: #b7d4c6;
    }

    /* Tombol / tautan aksi */
    .aksi {
      margin-top: auto;
      padding-top: 18px;
      font-size: 0.9rem;
      font-weight: 600;
      color: var(--accent);
      text-decoration: none;
      border-bottom: 2px solid transparent;
    }

    .aksi:hover { border-bottom-color: var(--accent); }

    .aksi:focus-visible {
      outline: 3px solid var(--accent);
      outline-offset: 3px;
      border-radius: 4px;
    }

    @media (max-width: 640px) {
      .fitur-grid { grid-template-columns: 1fr; }
      .fitur-judul { font-size: 1.6rem; }
    }
  </style>
</head>
<body>
  <!-- Navbar Hijau -->
  <nav class="bg-[#1a6840] text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-20 items-center">
        <div class="flex items-center gap-3">
          <img src="{{ asset('images/logo msb.png') }}" alt="Logo" class="h-10 w-auto">
          <h1 class="font-bold text-lg">Pengaduan Sarana Sekolah</h1>
        </div>
        <div class="hidden md:flex gap-8 text-sm font-medium">
          <a href="{{ route('home') }}" class="hover:text-green-200 transition">Beranda</a>
          <a href="{{ route('tentang') }}" class="hover:text-green-200 transition">Tentang</a>
          <a href="{{ route('fitur') }}" class="text-white font-bold border-b-2 border-white pb-1">Fitur Layanan</a>
          <a href="{{ route('panduan') }}" class="hover:text-green-200 transition">Panduan</a>
        </div>
        <a href="{{ route('login') }}" class="bg-yellow-400 text-[#1a6840] px-6 py-2.5 rounded-lg font-bold hover:bg-yellow-300 transition">Masuk</a>
      </div>
    </div>
  </nav>

  <section class="fitur">
    <h2 class="fitur-judul">Fitur Layanan</h2>

    <div class="fitur-grid">
      <article class="kartu">
        <span class="ikon" aria-hidden="true">
          <svg viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        </span>
        <h3>Lapor Cepat</h3>
        <p>Sampaikan laporan kerusakan dengan mengunggah foto bukti secara langsung.</p>
        <a class="aksi" href="{{ route('login') }}">Buat laporan</a>
      </article>

      <article class="kartu">
        <span class="ikon" aria-hidden="true">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </span>
        <h3>Pantau Status</h3>
        <p>Lihat progres perbaikan secara real-time.</p>
        <ol class="alur" aria-label="Tahap laporan: Aspirasi, Proses, Selesai">
          <li>Aspirasi</li>
          <li>Proses</li>
          <li>Selesai</li>
        </ol>
      </article>

      <article class="kartu">
        <span class="ikon" aria-hidden="true">
          <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </span>
        <h3>Tanggapan Admin</h3>
        <p>Dapatkan balasan dan keterangan langsung dari petugas sekolah.</p>
      </article>

      <article class="kartu">
        <span class="ikon" aria-hidden="true">
          <svg viewBox="0 0 24 24"><polyline points="21 8 21 21 3 21 3 8"/><rect x="1" y="3" width="22" height="5"/><line x1="10" y1="12" x2="14" y2="12"/></svg>
        </span>
        <h3>Riwayat Laporan</h3>
        <p>Semua laporan Anda tersimpan rapi dan dapat dilihat kapan saja.</p>
        <a class="aksi" href="{{ route('login') }}">Lihat riwayat</a>
      </article>
    </div>
  </section>
</body>
</html>