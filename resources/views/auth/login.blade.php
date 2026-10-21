<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#145c42">
    <title>Login - Pengaduan Sekolah</title>
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
        <section class="relative flex min-h-[220px] flex-col justify-between overflow-hidden bg-[#145c42] p-7 text-white sm:p-10 md:min-h-[640px] lg:p-12" aria-label="Tentang sistem">
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
                <div class="mb-8">
                    <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-2xl bg-[#e8f3ed] text-[#145c42]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.1a7.5 7.5 0 0 1 15 0A17.9 17.9 0 0 1 12 21.75c-2.7 0-5.25-.6-7.5-1.65Z" />
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-[#378361]">Selamat datang kembali</p>
                    <h2 class="mt-1 text-3xl font-bold tracking-tight text-gray-900">Login</h2>
                    <p class="mt-2 text-sm leading-6 text-gray-500">Masuk untuk mengakses dashboard pengaduan Anda.</p>
                </div>

                @if (session('success'))
                    <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800" role="status">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-gray-700">Email</label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0-9.75 6.75L2.25 6.75" />
                                </svg>
                            </span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" class="w-full rounded-xl border border-gray-200 bg-gray-50 py-3.5 pl-12 pr-4 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 hover:border-gray-300 focus:border-[#378361] focus:bg-white focus:ring-4 focus:ring-[#378361]/10" placeholder="nama@email.com" required autofocus>
                        </div>
                    </div>

                    <div>
                        <label for="password-field" class="mb-2 block text-sm font-medium text-gray-700">Password</label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16.5 10.5V6.75a4.5 4.5 0 0 0-9 0v3.75m-.75 0h10.5c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125H6.75c-.621 0-1.125-.504-1.125-1.125v-8.25c0-.621.504-1.125 1.125-1.125Z" />
                                </svg>
                            </span>
                            <input id="password-field" type="password" name="password" autocomplete="current-password" class="w-full rounded-xl border border-gray-200 bg-gray-50 py-3.5 pl-12 pr-12 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 hover:border-gray-300 focus:border-[#378361] focus:bg-white focus:ring-4 focus:ring-[#378361]/10" placeholder="Masukkan password" required>
                            <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-400 transition hover:text-[#145c42] focus:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-[#378361]" aria-label="Tampilkan password" aria-pressed="false">
                                <svg id="eye-icon" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.25 12s3.5-6.75 9.75-6.75S21.75 12 21.75 12 18.25 18.75 12 18.75 2.25 12 2.25 12Z" />
                                    <circle cx="12" cy="12" r="2.5" stroke-width="1.8" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="w-full rounded-xl bg-[#26734f] px-5 py-3.5 text-sm font-semibold text-white shadow-lg shadow-[#145c42]/15 transition hover:bg-[#145c42] focus:outline-none focus-visible:ring-4 focus-visible:ring-[#378361]/30 active:scale-[0.99]">
                        Masuk ke akun
                    </button>
                </form>

                <p class="mt-7 text-center text-sm text-gray-500">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="font-semibold text-[#26734f] hover:text-[#145c42] hover:underline">Daftar sekarang</a>
                </p>
            </div>
        </section>
    </main>

    <script>
        const passwordField = document.getElementById('password-field');
        const togglePasswordButton = document.getElementById('toggle-password');

        togglePasswordButton.addEventListener('click', () => {
            const isPasswordHidden = passwordField.type === 'password';
            passwordField.type = isPasswordHidden ? 'text' : 'password';
            togglePasswordButton.setAttribute('aria-pressed', String(isPasswordHidden));
            togglePasswordButton.setAttribute('aria-label', isPasswordHidden ? 'Sembunyikan password' : 'Tampilkan password');
        });
    </script>
</body>
</html>
