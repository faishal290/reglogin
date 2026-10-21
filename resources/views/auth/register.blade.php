<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#145c42">
    <title>Daftar - Pengaduan Sekolah</title>
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
        <section class="relative flex min-h-[220px] flex-col justify-between overflow-hidden bg-[#145c42] p-7 text-white sm:p-10 md:min-h-[680px] lg:p-12" aria-label="Tentang sistem">
            <div class="pointer-events-none absolute -right-20 -top-24 h-72 w-72 rounded-full border-[40px] border-white/5"></div>
            <div class="pointer-events-none absolute -bottom-28 -left-20 h-72 w-72 rounded-full bg-[#8bc6a8]/15 blur-2xl"></div>
            <a href="{{ route('login') }}" class="relative flex w-fit items-center gap-3" aria-label="Pengaduan Sekolah">
                <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white/15 ring-1 ring-white/20">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 21h18M5 21V7l8-4v18m6 0V11l-6-4M9 9v.01M9 12v.01M9 15v.01M9 18v.01m8-4v.01m0 3v.01" />
                    </svg>
                </span>
                <span class="text-sm font-semibold tracking-wide">Pengaduan Sekolah</span>
            </a>

            <div class="relative my-8 max-w-lg">
                <span class="mb-4 inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1.5 text-xs font-medium text-emerald-50 ring-1 ring-white/15">
                    <span class="h-2 w-2 rounded-full bg-[#a9dfbd]"></span>
                    Suara Anda, perubahan bersama
                </span>
                <h1 class="text-3xl font-bold leading-tight tracking-tight sm:text-4xl lg:text-[2.7rem]">
                    Wujudkan lingkungan sekolah yang lebih baik.
                </h1>
                <p class="mt-4 max-w-md text-sm leading-6 text-emerald-50/85 sm:text-base">
                    Sampaikan aspirasi dan pengaduan terkait sarana sekolah dengan mudah melalui satu tempat.
                </p>
            </div>

            <p class="relative text-xs text-emerald-50/70">Bersama menjaga fasilitas sekolah untuk semua.</p>
        </section>

        <section class="flex items-center justify-center px-6 py-10 sm:px-10 md:px-12 lg:px-16">
            <div class="w-full max-w-md">
                <div class="mb-7">
                    <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-[#e8f3ed] text-[#145c42]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.1a7.5 7.5 0 0 1 15 0A17.9 17.9 0 0 1 12 21.75c-2.7 0-5.25-.6-7.5-1.65ZM19.5 8.25v6m3-3h-6" />
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-[#378361]">Mulai berkontribusi</p>
                    <h2 class="mt-1 text-3xl font-bold tracking-tight text-gray-900">Buat akun baru</h2>
                    <p class="mt-2 text-sm leading-6 text-gray-500">Daftar untuk menyampaikan aspirasi dan pengaduan.</p>
                </div>

                @if ($errors->any())
                    <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-700">Nama lengkap</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 hover:border-gray-300 focus:border-[#378361] focus:bg-white focus:ring-4 focus:ring-[#378361]/10" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 hover:border-gray-300 focus:border-[#378361] focus:bg-white focus:ring-4 focus:ring-[#378361]/10" placeholder="nama@email.com" required>
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" type="password" name="password" autocomplete="new-password" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 hover:border-gray-300 focus:border-[#378361] focus:bg-white focus:ring-4 focus:ring-[#378361]/10" placeholder="Minimal 8 karakter" minlength="8" required>
                    </div>

                    <div>
                        <label for="password_confirmation" class="mb-2 block text-sm font-medium text-gray-700">Konfirmasi password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 hover:border-gray-300 focus:border-[#378361] focus:bg-white focus:ring-4 focus:ring-[#378361]/10" placeholder="Ulangi password" minlength="8" required>
                    </div>

                    <button type="submit" class="w-full rounded-xl bg-[#26734f] px-5 py-3.5 text-sm font-semibold text-white shadow-lg shadow-[#145c42]/15 transition hover:bg-[#145c42] focus:outline-none focus-visible:ring-4 focus-visible:ring-[#378361]/30 active:scale-[0.99]">
                        Buat akun
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-gray-500">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="font-semibold text-[#26734f] hover:text-[#145c42] hover:underline">Login</a>
                </p>
            </div>
        </section>
    </main>
</body>
</html>
