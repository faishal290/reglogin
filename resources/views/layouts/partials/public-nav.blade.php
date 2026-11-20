<nav class="landing-nav" aria-label="Navigasi utama">
    <div class="landing-nav-inner">
        <a class="brand" href="{{ route('home') }}" aria-label="Beranda Pengaduan Sarana Sekolah">
            <img src="{{ asset('images/logo msb.png') }}" alt="Logo SMK Muhammadiyah 1 Bantul">
            <span class="brand-copy">
                <strong>Pengaduan Sarana Sekolah</strong>
                <span>SMK Muhammadiyah 1 Bantul</span>
            </span>
        </a>

        <div class="desktop-menu">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('tentang') }}" @class(['active' => request()->routeIs('tentang')])>Tentang</a>
            <a href="{{ route('fitur') }}" @class(['active' => request()->routeIs('fitur')])>Fitur Layanan</a>
            <a href="{{ route('panduan') }}" @class(['active' => request()->routeIs('panduan')])>Panduan</a>
        </div>

        <div class="nav-actions">
            <a href="{{ route('login') }}" class="login-button">Masuk</a>
            <button id="mobile-menu-button" class="menu-button" type="button" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="mobile-menu">
                <svg width="26" height="26" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
    <div id="mobile-menu" class="mobile-menu">
        <a href="{{ route('home') }}">Beranda</a>
        <a href="{{ route('tentang') }}" @class(['active' => request()->routeIs('tentang')])>Tentang</a>
        <a href="{{ route('fitur') }}" @class(['active' => request()->routeIs('fitur')])>Fitur Layanan</a>
        <a href="{{ route('panduan') }}" @class(['active' => request()->routeIs('panduan')])>Panduan</a>
    </div>
</nav>

<script>
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    menuButton.addEventListener('click', function () {
        const isOpen = mobileMenu.classList.toggle('open');
        menuButton.setAttribute('aria-expanded', String(isOpen));
        menuButton.setAttribute('aria-label', isOpen ? 'Tutup menu navigasi' : 'Buka menu navigasi');
    });
</script>
