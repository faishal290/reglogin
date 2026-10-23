@extends('layouts.admin')

@section('main-content')
<!-- Header Halaman -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-2 border-b border-gray-200 pb-4">
    <h2 class="text-3xl font-extrabold text-gray-800 border-l-4 border-[#1a6840] pl-3">Dashboard Admin</h2>
    <div class="text-sm text-gray-500 bg-white px-4 py-2 rounded-full shadow-sm border border-gray-200 flex items-center gap-2">
        <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
        Selamat datang, <span class="font-bold text-[#1a6840]">{{ Auth::user()->name }}</span>
    </div>
</div>

<!-- 3 Card Statistik (Gradasi + Ikon Transparan) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    
    <!-- Card Aspirasi -->
    <div class="bg-gradient-to-br from-indigo-100 to-indigo-200 p-6 rounded-2xl shadow-sm border border-indigo-200 relative overflow-hidden group hover:shadow-lg transition duration-300">
        <div class="flex items-center gap-3 mb-2 relative z-10">
            <div class="bg-white/50 backdrop-blur-sm p-2.5 rounded-xl text-indigo-700 group-hover:scale-110 transition duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
            </div>
            <span class="font-bold text-indigo-900">Aspirasi Baru</span>
        </div>
        <div class="text-5xl font-black text-indigo-900 relative z-10">{{ $total_aspirasi }}</div>
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
            <span class="font-bold text-yellow-900">Sedang Proses</span>
        </div>
        <div class="text-5xl font-black text-yellow-900 relative z-10">{{ $total_proses }}</div>
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
        <div class="text-5xl font-black text-green-900 relative z-10">{{ $total_selesai }}</div>
        <div class="absolute -right-4 -bottom-4 opacity-10 group-hover:opacity-20 transition duration-300">
            <svg class="w-28 h-28" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        </div>
    </div>
</div>

<!-- BAGIAN GRAFIK & RINGKASAN -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    
    <!-- Kotak Kiri: Grafik -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 relative">
        <h3 class="font-bold text-lg text-gray-800 mb-6 flex items-center gap-2">
            <span class="w-1.5 h-5 bg-[#1a6840] rounded-full"></span> Persentase Status
        </h3>
        <div class="relative h-64 w-full flex justify-center">
            <canvas id="statusChart"></canvas>
        </div>
    </div>

    <!-- Kotak Kanan: Ringkasan Sistem -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 relative">
        <h3 class="font-bold text-lg text-gray-800 mb-6 flex items-center gap-2">
            <span class="w-1.5 h-5 bg-[#1a6840] rounded-full"></span> Ringkasan Sistem
        </h3>
        
        <div class="space-y-3">
            <!-- Total Pengaduan -->
            <div class="flex justify-between items-center bg-blue-50/50 p-4 rounded-xl border border-blue-100 hover:bg-blue-50 transition">
                <div class="flex items-center gap-3">
                    <div class="bg-blue-100 p-2 rounded-lg text-blue-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg></div>
                    <span class="text-gray-700 font-medium text-sm">Total Pengaduan</span>
                </div>
                <span class="text-2xl font-bold text-gray-800">{{ $total_aspirasi + $total_proses + $total_selesai }}</span>
            </div>
            
            <!-- Total Siswa -->
            <div class="flex justify-between items-center bg-green-50/50 p-4 rounded-xl border border-green-100 hover:bg-green-50 transition">
                <div class="flex items-center gap-3">
                    <div class="bg-green-100 p-2 rounded-lg text-green-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg></div>
                    <span class="text-gray-700 font-medium text-sm">Total Siswa</span>
                </div>
                <span class="text-2xl font-bold text-[#1a6840]">{{ $total_user }}</span>
            </div>
            
            <!-- Total Admin -->
            <div class="flex justify-between items-center bg-purple-50/50 p-4 rounded-xl border border-purple-100 hover:bg-purple-50 transition">
                <div class="flex items-center gap-3">
                    <div class="bg-purple-100 p-2 rounded-lg text-purple-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg></div>
                    <span class="text-gray-700 font-medium text-sm">Total Admin</span>
                </div>
                <span class="text-2xl font-bold text-purple-600">1</span>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Aktivitas Terbaru -->
<div class="flex justify-between items-end mb-4 mt-10">
    <h3 class="text-xl font-bold text-gray-800">Aktivitas Terbaru</h3>
    <a href="{{ route('admin.pengaduan.index') }}" class="bg-[#1a6840] text-white px-5 py-2 rounded-lg text-sm font-bold hover:bg-green-800 transition shadow-md flex items-center gap-2">
        Lihat semua 
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
    </a>
</div>

<div class="w-full overflow-x-auto bg-white rounded-2xl shadow-sm border border-gray-200 mb-8">
    <table class="w-full text-center border-collapse">
        <thead>
            <tr class="bg-gray-50/80 border-b border-gray-200 text-gray-500 text-xs uppercase tracking-wider">
                <th class="py-4 px-3 font-bold w-16">No</th>
                <th class="py-4 px-3 font-bold">Tanggal</th>
                <th class="py-4 px-3 font-bold">Pelapor</th>
                <th class="py-4 px-3 font-bold">Kategori</th>
                <th class="py-4 px-3 font-bold">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($pengaduans as $index => $item)
            <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                <td class="py-4 px-3 text-gray-500 font-medium">{{ $index + 1 }}</td>
                <td class="py-4 px-3 text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                <td class="py-4 px-3 text-gray-800 font-bold">{{ $item->user->name }}</td>
                <td class="py-4 px-3 text-gray-600">{{ $item->kategori }}</td>
                <td class="py-4 px-3">
                    @if($item->status == 'aspirasi')
                        <span class="bg-gray-100 text-gray-700 border border-gray-300 py-1.5 px-3 rounded-full text-xs font-bold uppercase tracking-wide">Aspirasi</span>
                    @elseif($item->status == 'proses')
                        <span class="bg-yellow-50 text-yellow-700 border border-yellow-300 py-1.5 px-3 rounded-full text-xs font-bold uppercase tracking-wide">Proses</span>
                    @else
                        <span class="bg-green-50 text-green-700 border border-green-300 py-1.5 px-3 rounded-full text-xs font-bold uppercase tracking-wide">Selesai</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="py-8 text-center text-gray-500 text-sm">Belum ada data pengaduan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- SCRIPT CHART.JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('statusChart').getContext('2d');
        
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Aspirasi', 'Proses', 'Selesai'],
                datasets: [{
                    data: [{{ $total_aspirasi }}, {{ $total_proses }}, {{ $total_selesai }}],
                    backgroundColor: ['#d1d5db', '#fef08a', '#bbf7d0'],
                    borderColor: ['#9ca3af', '#eab308', '#22c55e'],
                    borderWidth: 1,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { font: { family: 'sans-serif', size: 14 }, padding: 20 }
                    }
                }
            }
        });
    });
</script>
@endsection