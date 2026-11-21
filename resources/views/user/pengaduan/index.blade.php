@extends('layouts.user')

@section('main-content')
<div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-800 border-l-4 border-[#1a6840] pl-3">Aktivitas Pengaduan Saya</h2>
        <p class="mt-1 text-sm text-gray-500">Total pengaduan: <span class="font-semibold text-gray-700">{{ $pengaduans->count() }}</span></p>
    </div>
    
    <!-- Fitur Pencarian Sederhana -->
    <div class="relative w-full md:w-64">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <input type="text" id="searchInput" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#1a6840] focus:border-[#1a6840] block w-full pl-10 p-2.5" placeholder="Cari kategori atau aspirasi...">
    </div>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded-lg mb-6 flex items-center shadow-sm">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        {{ session('success') }}
    </div>
@endif

<div class="w-full overflow-x-auto bg-white rounded-2xl shadow-sm border border-gray-200">
    <table class="w-full min-w-[760px] text-left border-collapse" id="pengaduanTable">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-200 text-gray-500 text-xs uppercase tracking-wider">
                <th class="w-16 p-4 text-center font-bold">NO</th>
                <th class="w-32 p-4 font-bold">Tanggal</th>
                <th class="w-48 p-4 font-bold">Kategori/Tempat</th>
                <th class="p-4 font-bold">Aspirasi</th>
                <th class="w-36 p-4 text-center font-bold">Status</th>
                <th class="w-48 p-4 text-center font-bold">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($pengaduans as $index => $item)
            <tr class="hover:bg-gray-50 transition duration-150">
                <td class="p-4 text-center text-gray-500 font-medium">{{ $index + 1 }}</td>
                <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                <td class="p-4 text-sm font-bold text-gray-800">{{ $item->kategori }}</td>
                <td class="p-4 text-sm text-gray-600 break-words">{{ $item->aspirasi }}</td>
                <td class="p-4 text-center">
                    @if($item->status == 'aspirasi')
                        <span class="inline-flex whitespace-nowrap rounded-full bg-gray-100 border border-gray-300 px-3 py-1 text-xs font-bold uppercase tracking-wide text-gray-700">Aspirasi</span>
                    @elseif($item->status == 'proses')
                        <span class="inline-flex whitespace-nowrap rounded-full bg-yellow-50 border border-yellow-300 px-3 py-1 text-xs font-bold uppercase tracking-wide text-yellow-700">Proses</span>
                    @else
                        <span class="inline-flex whitespace-nowrap rounded-full bg-green-50 border border-green-300 px-3 py-1 text-xs font-bold uppercase tracking-wide text-green-700">Selesai</span>
                    @endif
                </td>
                <td class="p-4 text-center">
                    <div class="flex justify-center gap-3">
                        <!-- Tombol Detail (Ikon Saja) -->
                        <a href="{{ route('pengaduan.show', $item->id) }}" title="Lihat Detail" class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition border border-blue-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </a>
                        
                        <!-- Tombol Hapus (Hanya Muncul Jika Status Aspirasi) -->
                        @if($item->status == 'aspirasi')
                        <form action="{{ route('pengaduan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Hapus Pengaduan" class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition border border-red-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="p-12 text-center text-gray-400">
                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <p class="text-sm font-medium">Anda belum pernah membuat pengaduan.</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Script Filter Pencarian Sederhana (Client-Side) -->
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#pengaduanTable tbody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection