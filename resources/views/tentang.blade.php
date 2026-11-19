<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tentang - Pengaduan Sekolah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gray-50">
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
                    <a href="{{ route('tentang') }}" class="text-white font-bold border-b-2 border-white pb-1">Tentang</a>
                  <a href="{{ route('fitur') }}" class="hover:text-green-200 transition">Fitur Layanan</a>
                    <a href="{{ route('panduan') }}" class="hover:text-green-200 transition">Panduan</a>
                </div>
                <a href="{{ route('login') }}" class="bg-yellow-400 text-[#1a6840] px-6 py-2.5 rounded-lg font-bold hover:bg-yellow-300 transition">Masuk</a>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="max-w-3xl mx-auto px-4 py-12">
        
        <!-- JUDUL (Tetap Sederhana, Tidak Diubah) -->
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-8 border-l-4 border-[#1a6840] pl-4">Tentang Sekolah</h1>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8">
            
            <!-- SEJARAH SINGKAT -->
            <h2 class="text-xl font-bold text-gray-800 mb-3">Sejarah Singkat</h2>
            <p class="text-gray-600 leading-relaxed mb-4 text-sm">
                SMK Muhammadiyah 1 Bantul didirikan sebagai wujud komitmen dalam mencetak generasi muda yang unggul di bidang teknologi dan industri. Sejak awal berdiri, sekolah ini terus berkembang pesat dengan menyediakan berbagai jurusan yang relevan dengan kebutuhan dunia kerja.
            </p>
            <p class="text-gray-600 leading-relaxed mb-8 text-sm">
                Sistem Pengaduan Sarana Sekolah ini hadir sebagai wadah komunikasi antara siswa dan pihak sekolah untuk memastikan setiap kerusakan atau kekurangan fasilitas dapat segera ditangani secara transparan.
            </p>

            <hr class="border-gray-200 mb-8">

            <!-- VISI -->
            <h2 class="text-xl font-bold text-gray-800 mb-3">Visi</h2>
            <div class="bg-gradient-to-br from-[#1a6840] to-[#238a55] text-white rounded-xl px-6 py-7 mb-8 text-center shadow-sm">
                <p class="font-semibold italic text-base md:text-lg leading-relaxed">
                    &ldquo;Membentuk tamatan yang berakhlak mulia, berprestasi, mandiri, dan berdaya saing di tingkat lokal maupun nasional.&rdquo;
                </p>
            </div>

            <!-- MISI -->
            <h2 class="text-xl font-bold text-gray-800 mb-3">Misi</h2>
            <div class="space-y-4">
                <div class="flex items-start gap-4 bg-green-50 p-5 rounded-xl border border-green-100">
                    <span class="shrink-0 w-9 h-9 rounded-lg bg-[#1a6840] text-white font-bold flex items-center justify-center">1</span>
                    <div>
                        <h3 class="text-base font-bold text-gray-800 mb-1">Religiusitas &amp; Disiplin</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Menerapkan kedisiplinan dan kejujuran yang dilandasi ketaqwaan kepada Allah SWT melalui keterbukaan, kemitraan, dan pelayanan prima.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4 bg-green-50 p-5 rounded-xl border border-green-100">
                    <span class="shrink-0 w-9 h-9 rounded-lg bg-[#1a6840] text-white font-bold flex items-center justify-center">2</span>
                    <div>
                        <h3 class="text-base font-bold text-gray-800 mb-1">Kualitas Pembelajaran</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Menyelenggarakan pendidikan dan latihan yang berkualitas dengan mengedepankan keunggulan untuk berprestasi di bidang akademik dan non-akademik.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4 bg-green-50 p-5 rounded-xl border border-green-100">
                    <span class="shrink-0 w-9 h-9 rounded-lg bg-[#1a6840] text-white font-bold flex items-center justify-center">3</span>
                    <div>
                        <h3 class="text-base font-bold text-gray-800 mb-1">Budaya Industri &amp; Mandiri</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Melaksanakan layanan sekolah yang mengacu pada sistem manajemen mutu dan penerapan budaya industri untuk membekali siswa dengan pengetahuan, keterampilan, dan kemandirian.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>