<footer class="footer">
    <div class="footer-inner">
        <div>
            <div class="footer-brand">
                <img src="{{ asset('images/logo msb.png') }}" alt="Logo SMK Muhammadiyah 1 Bantul">
                <strong>SMK Muhammadiyah 1 Bantul</strong>
            </div>
            <p>Wadah komunikasi siswa dan pihak sekolah terkait sarana dan prasarana.</p>
        </div>
        <div>
            <h2>Menu Cepat</h2>
            <div class="footer-links">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('tentang') }}">Tentang</a>
                <a href="{{ route('fitur') }}">Fitur Layanan</a>
                <a href="{{ route('panduan') }}">Panduan</a>
            </div>
        </div>
        <div>
            <h2>Tentang Aplikasi</h2>
            <p>Untuk bantuan lebih lanjut, hubungi pihak sekolah melalui kanal resmi yang tersedia.</p>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; {{ date('Y') }} SMK Muhammadiyah 1 Bantul. All rights reserved.
    </div>
</footer>