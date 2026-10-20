<aside class="w-full shrink-0 border-b border-gray-200 bg-white p-4 md:min-h-full md:w-64 md:border-b-0 md:border-r md:p-6">
    <nav class="flex flex-col gap-2">
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 rounded-lg px-4 py-3 font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-[#e6d8d8] text-[#6a3b3b]' : 'text-gray-700 hover:bg-gray-100' }}">
            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1z"></path>
            </svg>
            Dashboard
        </a>
        <a href="{{ route('admin.pengaduan.index') }}"
           class="flex items-center gap-3 rounded-lg px-4 py-3 font-semibold transition {{ request()->routeIs('admin.pengaduan.*') ? 'bg-[#e6d8d8] text-[#6a3b3b]' : 'text-gray-700 hover:bg-gray-100' }}">
            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"></path>
            </svg>
            Kelola Pengaduan
        </a>
    </nav>
</aside>