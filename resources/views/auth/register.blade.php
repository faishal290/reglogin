<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#145c42">
    <title>Daftar Akun - Pengaduan Sekolah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="flex min-h-screen items-center justify-center bg-[#f1f5f2] px-4 py-8 sm:px-6">
    <main class="grid w-full max-w-6xl overflow-hidden rounded-[2rem] bg-white shadow-[0_24px_80px_-24px_rgba(20,92,66,0.28)] ring-1 ring-gray-200 md:grid-cols-2">
        
        <!-- ========================================== -->
        <!-- SISI KIRI: FOTO DENGAN TEKS (SAMA SEPERTI LOGIN) -->
        <!-- ========================================== -->
        <section class="relative flex min-h-[220px] flex-col justify-between overflow-hidden md:min-h-[640px] p-7 text-white sm:p-10 lg:p-12" aria-label="Tentang sistem">
            
            <!-- 1. Gambar Latar Belakang -->
            <img src="{{ asset('images/img.jpg') }}" alt="Gedung Sekolah" class="absolute inset-0 h-full w-full object-cover">

            <!-- 2. Overlay Gelap -->
            <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(20, 92, 66, 0.95), rgba(20, 92, 66, 0.7));"></div>

            <!-- 3. Konten Teks -->
            <div class="relative z-10 flex h-full w-full flex-col justify-between">
                
                <!-- Logo & Nama Aplikasi -->
                <a href="{{ route('login') }}" class="flex w-fit items-center gap-3" aria-label="Pengaduan Sekolah">
                    <img src="{{ asset('images/logo msb.png') }}" alt="Logo Sekolah" class="h-11 w-auto object-contain drop-shadow-md">
                    <span class="text-sm font-semibold tracking-wide text-white">Pengaduan Sekolah</span>
                </a>

                <!-- Teks Utama -->
                <div class="my-8 max-w-lg">
                    <span class="mb-4 inline-flex items-center gap-2 rounded-full bg-white/20 px-3 py-1.5 text-xs font-medium text-white backdrop-blur-md ring-1 ring-white/30">
                        <span class="h-2 w-2 rounded-full bg-[#a9dfbd]"></span>
                        Suara Anda, perubahan bersama
                    </span>
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-white sm:text-4xl lg:text-[2.7rem]" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">
                        Bergabunglah membangun sekolah yang lebih baik.
                    </h1>
                    <p class="mt-4 max-w-md text-sm leading-6 text-gray-100 sm:text-base" style="text-shadow: 1px 1px 4px rgba(0,0,0,0.5);">
                        Buat akun Anda sekarang dan mulai sampaikan aspirasi untuk fasilitas sekolah yang lebih memadai.
                    </p>
                </div>

                <!-- Teks Footer -->
                <p class="text-xs text-gray-200">Bersama menjaga fasilitas sekolah untuk semua.</p>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- SISI KANAN: FORM REGISTER                  -->
        <!-- ========================================== -->
        <section class="flex items-center justify-center px-6 py-10 sm:px-10 md:px-12 lg:px-16">
            <div class="w-full max-w-md">
                <div class="mb-8">
                    <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-2xl bg-[#e8f3ed] text-[#145c42]">
                        <!-- Ikon User + Tambah -->
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-[#378361]">Mulai langkah pertama</p>
                    <h2 class="mt-1 text-3xl font-bold tracking-tight text-gray-900">Buat Akun Baru</h2>
                    <p class="mt-2 text-sm leading-6 text-gray-500">Lengkapi data diri Anda untuk mendaftar.</p>
                </div>

                @if ($errors->any())
                    <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <!-- Nama Lengkap -->
                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" class="w-full rounded-xl border border-gray-200 bg-gray-50 py-3.5 pl-12 pr-4 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 hover:border-gray-300 focus:border-[#378361] focus:bg-white focus:ring-4 focus:ring-[#378361]/10" placeholder="Masukkan nama lengkap" required autofocus>
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-gray-700">Email</label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0-9.75 6.75L2.25 6.75" />
                                </svg>
                            </span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" class="w-full rounded-xl border border-gray-200 bg-gray-50 py-3.5 pl-12 pr-4 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 hover:border-gray-300 focus:border-[#378361] focus:bg-white focus:ring-4 focus:ring-[#378361]/10" placeholder="nama@email.com" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="mb-2 block text-sm font-medium text-gray-700">Password</label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16.5 10.5V6.75a4.5 4.5 0 0 0-9 0v3.75m-.75 0h10.5c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125H6.75c-.621 0-1.125-.504-1.125-1.125v-8.25c0-.621.504-1.125 1.125-1.125Z" />
                                </svg>
                            </span>
                            <input id="password" type="password" name="password" autocomplete="new-password" class="w-full rounded-xl border border-gray-200 bg-gray-50 py-3.5 pl-12 pr-4 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 hover:border-gray-300 focus:border-[#378361] focus:bg-white focus:ring-4 focus:ring-[#378361]/10" placeholder="Minimal 8 karakter" minlength="8" required>
                        </div>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div>
                        <label for="password_confirmation" class="mb-2 block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </span>
                            <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" class="w-full rounded-xl border border-gray-200 bg-gray-50 py-3.5 pl-12 pr-4 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 hover:border-gray-300 focus:border-[#378361] focus:bg-white focus:ring-4 focus:ring-[#378361]/10" placeholder="Ulangi password" minlength="8" required>
                        </div>
                    </div>

                    <button type="submit" class="mt-2 w-full rounded-xl bg-[#26734f] px-5 py-3.5 text-sm font-semibold text-white shadow-lg shadow-[#145c42]/15 transition hover:bg-[#145c42] focus:outline-none focus-visible:ring-4 focus-visible:ring-[#378361]/30 active:scale-[0.99]">
                        Daftar Sekarang
                    </button>
                </form>

                <p class="mt-7 text-center text-sm text-gray-500">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="font-semibold text-[#26734f] hover:text-[#145c42] hover:underline">Masuk di sini</a>
                </p>
            </div>
        </section>
    </main>
</body>
</html>