<aside class="w-full shrink-0 border-b border-gray-200 bg-white p-4 md:min-h-full md:w-64 md:border-b-0 md:border-r md:p-6">
    <nav class="space-y-4">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg font-semibold transition {{ request()->routeIs('dashboard') ? 'bg-[#e6d8d8] text-[#6a3b3b]' : 'text-gray-700 hover:bg-gray-100' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            Beranda
        </a>
        <a href="{{ route('pengaduan.create') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg font-semibold transition {{ request()->routeIs('pengaduan.create') ? 'bg-[#e6d8d8] text-[#6a3b3b]' : 'text-gray-700 hover:bg-gray-100' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah pengaduan
        </a>
        <a href="{{ route('pengaduan.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg font-semibold transition {{ request()->routeIs('pengaduan.index') ? 'bg-[#e6d8d8] text-[#6a3b3b]' : 'text-gray-700 hover:bg-gray-100' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            Aktivitas
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex w-full items-center gap-3 px-4 py-3 rounded-lg font-semibold text-red-700 transition hover:bg-red-50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Logout
            </button>
        </form>
    </nav>
</aside>