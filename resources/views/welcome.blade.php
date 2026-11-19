<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Sarana Sekolah - SMK Muhammadiyah 1 Bantul</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar (Hijau Tua sesuai tema aplikasi) -->
    <nav class="bg-[#1a6840] text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo msb.png') }}" alt="Logo" class="h-10 w-auto">
                    <div>
                        <h1 class="font-bold text-lg leading-tight">Pengaduan Sarana Sekolah</h1>
                        <p class="text-xs text-green-100">SMK Muhammadiyah 1 Bantul</p>
                    </div>
                </div>

                <!-- Menu Tengah -->
                <div class="hidden md:flex gap-8 text-sm font-medium">
                    <a href="{{ route('home') }}" class="text-white font-bold border-b-2 border-white pb-1">Beranda</a>
                    <a href="{{ route('tentang') }}" class="hover:text-green-200 transition">Tentang</a>
                    <a href="{{ route('fitur') }}" class="hover:text-green-200 transition">Fitur Layanan</a>
                    <a href="{{ route('panduan') }}" class="hover:text-green-200 transition">Panduan</a>
                </div>

                <!-- Tombol Masuk (Kuning sesuai desain login) -->
                <div>
                    <a href="{{ route('login') }}" class="bg-yellow-400 text-[#1a6840] px-6 py-2.5 rounded-lg font-bold hover:bg-yellow-300 transition shadow-sm">
                        Masuk
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative">
        <div class="absolute inset-0">
            <img src="{{ asset('images/img.jpg') }}" alt="Sekolah" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-[#1a6840]/80 mix-blend-multiply"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 py-32 flex flex-col items-center justify-center text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 leading-tight drop-shadow-lg">
                Sampaikan Aspirasi Anda<br>Untuk Sekolah yang Lebih Baik
            </h1>
            <p class="text-lg text-gray-100 max-w-2xl mb-8">
                Sistem pengaduan sarana dan prasarana sekolah yang mudah, transparan, dan terintegrasi.
            </p>
            <div class="flex gap-4">
                <a href="{{ route('login') }}" class="bg-yellow-400 text-[#1a6840] px-8 py-3 rounded-lg font-bold text-lg hover:bg-yellow-300 transition shadow-lg">
                    Mulai Lapor
                </a>
                <a href="{{ route('panduan') }}" class="bg-white/10 text-white border border-white/30 px-8 py-3 rounded-lg font-bold text-lg hover:bg-white/20 transition backdrop-blur-sm">
                    Panduan
                </a>
            </div>
        </div>
    </div>
</body>
</html>