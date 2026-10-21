@extends('layouts.user')

@section('main-content')
<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
    <p class="text-gray-500 text-sm mt-1">Selamat datang, {{ Auth::user()->name }}. Berikut ringkasan pengaduan Anda.</p>
</div>

<!-- 3 Card Statistik -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    
    <!-- Card Aspirasi (Masuk) -->
    <div class="bg-[#dcdcf9] p-6 rounded-xl shadow-sm border border-indigo-100">
        <div class="flex items-center gap-3 mb-4">
            <div class="bg-indigo-200 p-2 rounded-lg text-indigo-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
            </div>
            <span class="font-bold text-gray-800">Aspirasi</span>
        </div>
        <div class="text-4xl font-extrabold text-gray-800 text-center">{{ $totalAspirasi }}</div>
    </div>
    
    <!-- Card Proses -->
    <div class="bg-[#fcfca6] p-6 rounded-xl shadow-sm border border-yellow-100">
        <div class="flex items-center gap-3 mb-4">
            <div class="bg-yellow-200 p-2 rounded-lg text-yellow-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <span class="font-bold text-gray-800">Proses</span>
        </div>
        <div class="text-4xl font-extrabold text-gray-800 text-center">{{ $totalProses }}</div>
    </div>

    <!-- Card Selesai -->
    <div class="bg-[#d4fcc7] p-6 rounded-xl shadow-sm border border-green-100">
        <div class="flex items-center gap-3 mb-4">
            <div class="bg-green-200 p-2 rounded-lg text-green-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <span class="font-bold text-gray-800">Selesai</span>
        </div>
        <div class="text-4xl font-extrabold text-gray-800 text-center">{{ $totalSelesai }}</div>
    </div>
</div>

<!-- Tabel Aktivitas Terbaru -->
<div class="flex justify-between items-end mb-4">
    <h3 class="text-lg font-bold text-gray-800">Aktivitas Terbaru</h3>
    <a href="{{ route('pengaduan.index') }}" class="text-sm font-semibold text-[#e57373] hover:text-red-600 transition flex items-center gap-1">
        Lihat semua &rarr;
    </a>
</div>

<div class="w-full overflow-x-auto bg-white rounded-lg shadow-sm border border-gray-200">
    <table class="w-full text-center border-collapse">
        <thead>
            <tr class="bg-gray-100 border-b border-gray-300">
                <th class="p-3 font-semibold text-gray-700 text-sm w-16 border-r border-gray-200">NO</th>
                <th class="p-3 font-semibold text-gray-700 text-sm border-r border-gray-200">Kategori/Tempat</th>
                <th class="p-3 font-semibold text-gray-700 text-sm border-r border-gray-200">Aspirasi</th>
                <th class="p-3 font-semibold text-gray-700 text-sm border-r border-gray-200">Tanggal</th>
                <th class="p-3 font-semibold text-gray-700 text-sm">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($pengaduans as $index => $item)
            <tr class="hover:bg-gray-50 transition">
                <td class="p-3 text-gray-600 border-r border-gray-200">{{ $index + 1 }}</td>
                <td class="p-3 text-gray-800 font-medium border-r border-gray-200">{{ $item->kategori }}</td>
                <td class="p-3 text-gray-600 text-sm border-r border-gray-200 text-left truncate max-w-xs">{{ $item->aspirasi }}</td>
                <td class="p-3 text-gray-600 border-r border-gray-200">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                <td class="p-3">
                    @if($item->status == 'aspirasi')
                        <span class="bg-gray-200 text-gray-700 py-1 px-3 rounded-full text-xs font-bold uppercase tracking-wide">Aspirasi</span>
                    @elseif($item->status == 'proses')
                        <span class="bg-yellow-100 text-yellow-700 py-1 px-3 rounded-full text-xs font-bold uppercase tracking-wide">Proses</span>
                    @else
                        <span class="bg-green-100 text-green-700 py-1 px-3 rounded-full text-xs font-bold uppercase tracking-wide">Selesai</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-8 text-center text-gray-500 text-sm">
                    Belum ada aktivitas pengaduan terbaru.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection