@extends('layouts.admin')

@section('main-content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-2">
    <h2 class="text-2xl font-bold text-gray-800">Dashboard Admin</h2>
    <p class="text-sm text-gray-500 bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-200">Selamat datang, <span class="font-bold text-[#1a6840]">{{ Auth::user()->name }}</span></p>
</div>

<!-- 3 Card Statistik -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Card Aspirasi -->
    <div class="bg-[#dcdcf9] p-6 rounded-xl shadow-sm border border-indigo-100 relative overflow-hidden">
        <div class="flex items-center gap-3 mb-4 relative z-10">
            <div class="bg-indigo-200 p-2 rounded-lg text-indigo-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
            </div>
            <span class="font-bold text-gray-800">Aspirasi</span>
        </div>
        <div class="text-4xl font-extrabold text-gray-800 text-center relative z-10">{{ $total_aspirasi }}</div>
        <div class="absolute -right-4 -bottom-4 opacity-10">
            <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path></svg>
        </div>
    </div>
    
    <!-- Card Proses -->
    <div class="bg-[#fcfca6] p-6 rounded-xl shadow-sm border border-yellow-100 relative overflow-hidden">
        <div class="flex items-center gap-3 mb-4 relative z-10">
            <div class="bg-yellow-200 p-2 rounded-lg text-yellow-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <span class="font-bold text-gray-800">Proses</span>
        </div>
        <div class="text-4xl font-extrabold text-gray-800 text-center relative z-10">{{ $total_proses }}</div>
        <div class="absolute -right-4 -bottom-4 opacity-10">
            <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
        </div>
    </div>

    <!-- Card Selesai -->
    <div class="bg-[#d4fcc7] p-6 rounded-xl shadow-sm border border-green-100 relative overflow-hidden">
        <div class="flex items-center gap-3 mb-4 relative z-10">
            <div class="bg-green-200 p-2 rounded-lg text-green-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <span class="font-bold text-gray-800">Selesai</span>
        </div>
        <div class="text-4xl font-extrabold text-gray-800 text-center relative z-10">{{ $total_selesai }}</div>
        <div class="absolute -right-4 -bottom-4 opacity-10">
            <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- BAGIAN GRAFIK LINGKARAN & RINGKASAN        -->
<!-- ========================================== -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Grafik Doughnut -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <h3 class="font-bold text-lg text-gray-800 mb-4 border-b pb-2">Persentase Status Pengaduan</h3>
        <div class="relative h-64 w-full flex justify-center">
            <canvas id="statusChart"></canvas>
        </div>
    </div>

    <!-- Ringkasan Info Tambahan -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex flex-col justify-center">
        <h3 class="font-bold text-lg text-gray-800 mb-4 border-b pb-2">Ringkasan Sistem</h3>
        <div class="space-y-4">
            <div class="flex justify-between items-center bg-gray-50 p-4 rounded-lg border border-gray-100">
                <span class="text-gray-600 font-medium">Total Seluruh Pengaduan</span>
                <span class="text-2xl font-bold text-gray-800">{{ $total_aspirasi + $total_proses + $total_selesai }}</span>
            </div>
            <div class="flex justify-between items-center bg-gray-50 p-4 rounded-lg border border-gray-100">
                <span class="text-gray-600 font-medium">Total Siswa Terdaftar</span>
                <span class="text-2xl font-bold text-[#1a6840]">{{ $total_user }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Aktivitas Terbaru -->
<div class="flex justify-between items-end mb-4">
    <h3 class="text-lg font-bold text-gray-800">Aktivitas Terbaru</h3>
    <a href="{{ route('admin.pengaduan.index') }}" class="text-sm font-semibold text-[#e57373] hover:text-red-600 transition flex items-center gap-1">
        Lihat semua &rarr;
    </a>
</div>

<div class="w-full overflow-x-auto bg-white rounded-lg shadow-sm border border-gray-200">
    <table class="w-full text-center border-collapse">
        <thead>
            <tr class="bg-gray-100 border-b border-gray-300">
                <th class="p-3 font-semibold text-gray-700 text-sm w-16 border-r border-gray-200">NO</th>
                <th class="p-3 font-semibold text-gray-700 text-sm border-r border-gray-200">Tanggal</th>
                <th class="p-3 font-semibold text-gray-700 text-sm border-r border-gray-200">Pelapor</th>
                <th class="p-3 font-semibold text-gray-700 text-sm border-r border-gray-200">Kategori</th>
                <th class="p-3 font-semibold text-gray-700 text-sm border-r border-gray-200">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($pengaduans as $index => $item)
            <tr class="hover:bg-gray-50 transition">
                <td class="p-3 text-gray-600 border-r border-gray-200">{{ $index + 1 }}</td>
                <td class="p-3 text-gray-600 border-r border-gray-200">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                <td class="p-3 text-gray-800 font-medium border-r border-gray-200">{{ $item->user->name }}</td>
                <td class="p-3 text-gray-600 border-r border-gray-200">{{ $item->kategori }}</td>
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
                <td colspan="5" class="p-8 text-center text-gray-500 text-sm">Belum ada data pengaduan.</td>
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
                    backgroundColor: [
                        '#d1d5db', // Abu-abu
                        '#fef08a', // Kuning
                        '#bbf7d0'  // Hijau
                    ],
                    borderColor: [
                        '#9ca3af',
                        '#eab308',
                        '#22c55e'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: { family: 'sans-serif', size: 14 },
                            padding: 20
                        }
                    }
                }
            }
        });
    });
</script>
@endsection