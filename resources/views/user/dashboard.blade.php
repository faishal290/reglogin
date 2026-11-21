@extends('layouts.user')

@section('main-content')
<!-- Header Halaman -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 border-b border-gray-200 pb-4">
    <div>
        <h2 class="text-3xl font-extrabold text-gray-800 border-l-4 border-[#1a6840] pl-3">Dashboard</h2>
        <p class="text-gray-500 mt-2 text-sm">
            @php
                $hour = date('H');
                if ($hour < 11) {
                    $sapaan = 'Selamat pagi';
                } elseif ($hour < 15) {
                    $sapaan = 'Selamat siang';
                } elseif ($hour < 18) {
                    $sapaan = 'Selamat sore';
                } else {
                    $sapaan = 'Selamat malam';
                }
            @endphp
            {{ $sapaan }}, <span class="font-bold text-[#1a6840]">{{ Auth::user()->name }}</span>. Berikut ringkasan pengaduan Anda.
        </p>
    </div>
    <!-- Tombol Aksi Cepat -->
    <a href="{{ route('pengaduan.create') }}" class="bg-[#1a6840] text-white px-6 py-3 rounded-lg text-sm font-bold hover:bg-green-800 transition shadow-lg flex items-center gap-2 transform hover:-translate-y-0.5">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Buat Pengaduan Baru
    </a>
</div>

<!-- 3 Card Statistik (Gradasi + Ikon Transparan + Tombol Lihat Detail) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    
    <!-- Card Aspirasi -->
    <div class="bg-gradient-to-br from-indigo-100 to-indigo-200 p-6 rounded-2xl shadow-sm border border-indigo-200 relative overflow-hidden group hover:shadow-lg transition duration-300">
        <div class="flex items-center gap-3 mb-2 relative z-10">
            <div class="bg-white/50 backdrop-blur-sm p-2.5 rounded-xl text-indigo-700 group-hover:scale-110 transition duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
            </div>
            <span class="font-bold text-indigo-900">Aspirasi</span>
        </div>
        <div class="text-5xl font-black text-indigo-900 relative z-10">{{ $totalAspirasi }}</div>
        <a href="{{ route('pengaduan.index') }}?status=aspirasi" class="relative z-10 inline-flex items-center gap-1 mt-3 text-xs font-bold text-indigo-700 hover:text-indigo-900 transition">
            Lihat Detail 
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </a>
        <div class="absolute -right-4 -bottom-4 opacity-10 group-hover:opacity-20 transition duration-300">
            <svg class="w-28 h-28" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path></svg>
        </div>
    </div>
    
    <!-- Card Proses -->
    <div class="bg-gradient-to-br from-yellow-100 to-yellow-200 p-6 rounded-2xl shadow-sm border border-yellow-200 relative overflow-hidden group hover:shadow-lg transition duration-300">
        <div class="flex items-center gap-3 mb-2 relative z-10">
            <div class="bg-white/50 backdrop-blur-sm p-2.5 rounded-xl text-yellow-700 group-hover:scale-110 transition duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <span class="font-bold text-yellow-900">Proses</span>
        </div>
        <div class="text-5xl font-black text-yellow-900 relative z-10">{{ $totalProses }}</div>
        <a href="{{ route('pengaduan.index') }}?status=proses" class="relative z-10 inline-flex items-center gap-1 mt-3 text-xs font-bold text-yellow-700 hover:text-yellow-900 transition">
            Lihat Detail 
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </a>
        <div class="absolute -right-4 -bottom-4 opacity-10 group-hover:opacity-20 transition duration-300">
            <svg class="w-28 h-28" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
        </div>
    </div>

    <!-- Card Selesai -->
    <div class="bg-gradient-to-br from-green-100 to-green-200 p-6 rounded-2xl shadow-sm border border-green-200 relative overflow-hidden group hover:shadow-lg transition duration-300">
        <div class="flex items-center gap-3 mb-2 relative z-10">
            <div class="bg-white/50 backdrop-blur-sm p-2.5 rounded-xl text-green-700 group-hover:scale-110 transition duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <span class="font-bold text-green-900">Selesai</span>
        </div>
        <div class="text-5xl font-black text-green-900 relative z-10">{{ $totalSelesai }}</div>
        <a href="{{ route('pengaduan.index') }}?status=selesai" class="relative z-10 inline-flex items-center gap-1 mt-3 text-xs font-bold text-green-700 hover:text-green-900 transition">
            Lihat Detail 
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </a>
        <div class="absolute -right-4 -bottom-4 opacity-10 group-hover:opacity-20 transition duration-300">
            <svg class="w-28 h-28" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        </div>
    </div>
</div>

<!-- Tabel Aktivitas Terbaru (dengan Pencarian & Filter) -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4 mt-8 gap-4">
    <h3 class="text-xl font-bold text-gray-800 border-l-4 border-[#1a6840] pl-3">Aktivitas Terbaru</h3>
    
    <div class="flex flex-col sm:flex-row gap-2 w-full md:w-auto">
        <!-- Kolom Pencarian -->
        <div class="relative w-full sm:w-64">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="text" id="searchInput" class="bg-white border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-[#1a6840] focus:border-[#1a6840] block w-full pl-9 p-2" placeholder="Cari laporan...">
        </div>
        <!-- Filter Status -->
        <select id="statusFilter" class="bg-white border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-[#1a6840] focus:border-[#1a6840] block p-2">
            <option value="">Semua Status</option>
            <option value="aspirasi">Aspirasi</option>
            <option value="proses">Proses</option>
            <option value="selesai">Selesai</option>
        </select>
        <a href="{{ route('pengaduan.index') }}" class="bg-[#1a6840] text-white px-4 py-2 rounded-lg text-xs font-bold hover:bg-green-800 transition flex items-center justify-center gap-1 whitespace-nowrap">
            Lihat Semua
        </a>
    </div>
</div>

<div class="w-full overflow-x-auto bg-white rounded-2xl shadow-sm border border-gray-200 mb-8">
    <table class="w-full text-center border-collapse" id="activityTable">
        <thead>
            <tr class="bg-gray-50/80 border-b border-gray-200 text-gray-500 text-xs uppercase tracking-wider">
                <th class="py-4 px-3 font-bold w-16">No</th>
                <th class="py-4 px-3 font-bold">Kategori/Tempat</th>
                <th class="py-4 px-3 font-bold text-left">Aspirasi</th>
                <th class="py-4 px-3 font-bold">Tanggal</th>
                <th class="py-4 px-3 font-bold">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($pengaduans as $index => $item)
            <tr class="hover:bg-gray-50 transition duration-150 ease-in-out activity-row" data-status="{{ $item->status }}">
                <td class="py-4 px-3 text-gray-500 font-medium">{{ $index + 1 }}</td>
                <td class="py-4 px-3 text-gray-800 font-bold">{{ $item->kategori }}</td>
                <td class="py-4 px-3 text-gray-600 text-sm text-left truncate max-w-xs" title="{{ $item->aspirasi }}">
                    {{ $item->aspirasi }}
                </td>
                <td class="py-4 px-3 text-gray-600 whitespace-nowrap">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                <td class="py-4 px-3">
                    <div class="flex flex-col items-center gap-1">
                        @if($item->status == 'aspirasi')
                            <span class="bg-gray-100 text-gray-700 border border-gray-300 py-1 px-3 rounded-full text-[10px] font-bold uppercase tracking-wide">Aspirasi</span>
                        @elseif($item->status == 'proses')
                            <span class="bg-yellow-50 text-yellow-700 border border-yellow-300 py-1 px-3 rounded-full text-[10px] font-bold uppercase tracking-wide">Proses</span>
                        @else
                            <span class="bg-green-50 text-green-700 border border-green-300 py-1 px-3 rounded-full text-[10px] font-bold uppercase tracking-wide">Selesai</span>
                        @endif
                        
                        <!-- Progress Bar Kecil -->
                        <div class="w-16 h-1.5 bg-gray-200 rounded-full overflow-hidden mt-1">
                            @if($item->status == 'aspirasi')
                                <div class="h-full bg-gray-400 w-1/3"></div>
                            @elseif($item->status == 'proses')
                                <div class="h-full bg-yellow-400 w-2/3"></div>
                            @else
                                <div class="h-full bg-green-500 w-full"></div>
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="py-12 text-center text-gray-400">
                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <p class="text-sm font-medium">Belum ada aktivitas pengaduan terbaru.</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Script untuk Pencarian & Filter -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const rows = document.querySelectorAll('.activity-row');

        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusTerm = statusFilter.value.toLowerCase();

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const status = row.getAttribute('data-status');
                
                const matchesSearch = text.includes(searchTerm);
                const matchesStatus = statusTerm === '' || status === statusTerm;

                if (matchesSearch && matchesStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('keyup', filterTable);
        statusFilter.addEventListener('change', filterTable);
    });
</script>
@endsection