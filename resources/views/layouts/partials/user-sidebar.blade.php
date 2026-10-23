<aside class="w-64 min-h-screen border-r border-gray-200 bg-white flex-shrink-0 flex flex-col justify-between pb-6 pt-6 mt-4">
    <nav class="flex flex-col gap-2 px-4">
        
        <!-- Menu Beranda -->
        <a href="{{ route('dashboard') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200 
                  {{ request()->routeIs('dashboard') ? 'bg-green-50 text-[#1a6840] border-l-4 border-[#1a6840] shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            Beranda
        </a>

        <!-- Menu Tambah Pengaduan -->
        <a href="{{ route('pengaduan.create') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200 
                  {{ request()->routeIs('pengaduan.create') ? 'bg-green-50 text-[#1a6840] border-l-4 border-[#1a6840] shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Pengaduan
        </a>

        <!-- Menu Aktivitas -->
        <a href="{{ route('pengaduan.index') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200 
                  {{ request()->routeIs('pengaduan.index') ? 'bg-green-50 text-[#1a6840] border-l-4 border-[#1a6840] shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
            </svg>
            Aktivitas
        </a>
    </nav>

    <!-- Tombol Logout -->
    <div class="px-4 mt-auto">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-red-500 hover:bg-red-50 hover:text-red-700 transition-all duration-200 border border-transparent hover:border-red-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>