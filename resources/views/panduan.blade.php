<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Panduan - Pengaduan Sekolah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar (Sama seperti sebelumnya) -->
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
                    <a href="{{ route('fitur') }}" class="hover:text-green-200 transition">Fitur layanan</a>
                    <a href="{{ route('panduan') }}" class="text-white font-bold border-b-2 border-white pb-1">Panduan</a>
                </div>
                <a href="{{ route('login') }}" class="bg-yellow-400 text-[#1a6840] px-6 py-2.5 rounded-lg font-bold hover:bg-yellow-300 transition">Masuk</a>
            </div>
        </div>
    </nav>

    <!-- Konten Panduan -->
    <div class="max-w-3xl mx-auto px-4 py-12">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-8 border-l-4 border-[#1a6840] pl-4">Panduan Penggunaan</h1>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8">
            <div class="space-y-6">
                
                <!-- Langkah 1 -->
                <div class="flex items-start gap-4">
                    <div class="bg-green-100 text-[#1a6840] font-bold w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0">1</div>
                    <p class="text-gray-600 text-sm leading-relaxed pt-1"><strong>Login</strong> menggunakan akun siswa yang sudah didaftarkan.</p>
                </div>

                <!-- Langkah 2 -->
                <div class="flex items-start gap-4">
                    <div class="bg-green-100 text-[#1a6840] font-bold w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0">2</div>
                    <p class="text-gray-600 text-sm leading-relaxed pt-1">Buka menu <strong>"Tambah Pengaduan"</strong> di sidebar.</p>
                </div>

                <!-- Langkah 3 -->
                <div class="flex items-start gap-4">
                    <div class="bg-green-100 text-[#1a6840] font-bold w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0">3</div>
                    <p class="text-gray-600 text-sm leading-relaxed pt-1">Isi kategori, aspirasi, tanggal, dan unggah foto bukti kerusakan.</p>
                </div>

                <!-- Langkah 4 -->
                <div class="flex items-start gap-4">
                    <div class="bg-green-100 text-[#1a6840] font-bold w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0">4</div>
                    <p class="text-gray-600 text-sm leading-relaxed pt-1">Klik <strong>"Kirim"</strong> dan pantau statusnya di menu "Aktivitas".</p>
                </div>

                <!-- Langkah 5 -->
                <div class="flex items-start gap-4">
                    <div class="bg-green-100 text-[#1a6840] font-bold w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0">5</div>
                    <p class="text-gray-600 text-sm leading-relaxed pt-1">Tunggu tanggapan dari Admin dan lihat progres perbaikannya.</p>
                </div>

            </div>

            <!-- Tombol Mulai -->
            <div class="mt-10 text-center border-t border-gray-100 pt-6">
                <a href="{{ route('login') }}" class="inline-block bg-[#1a6840] text-white px-8 py-3 rounded-lg font-bold text-sm hover:bg-green-800 transition shadow-md">
                    Saya Mengerti, Mulai Lapor &rarr;
                </a>
            </div>
        </div>
    </div>
</body>
</html>