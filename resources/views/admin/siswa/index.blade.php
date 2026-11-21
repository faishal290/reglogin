@extends('layouts.admin')

@section('main-content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-800 border-l-4 border-[#1a6840] pl-3">Daftar Siswa Terdaftar</h2>
        <p class="text-sm text-gray-500 mt-1">Semua akun siswa yang terdaftar dalam sistem.</p>
    </div>
    <!-- Fitur Pencarian -->
    <div class="relative w-full md:w-64">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <input type="text" id="searchInput" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#1a6840] focus:border-[#1a6840] block w-full pl-10 p-2.5" placeholder="Cari nama atau email siswa...">
    </div>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded-lg mb-6">{{ session('success') }}</div>
@endif

<div class="w-full overflow-x-auto bg-white rounded-xl shadow-sm border border-gray-200">
    <table class="w-full text-center border-collapse" id="siswaTable">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-200 text-gray-500 text-xs uppercase tracking-wider">
                <th class="p-4 font-bold w-16">NO</th>
                <th class="p-4 font-bold">Nama Siswa</th>
                <th class="p-4 font-bold">Email</th>
                <th class="p-4 font-bold">Tanggal Bergabung</th>
                <th class="p-4 font-bold">Total Laporan</th>
                <th class="p-4 font-bold">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($siswas as $index => $siswa)
            <tr class="hover:bg-gray-50 transition">
                <td class="p-4 text-gray-500 font-medium">{{ $index + 1 }}</td>
                <td class="p-4 text-gray-800 font-bold text-left flex items-center gap-3">
                    <!-- Inisial Avatar -->
                    <div class="w-8 h-8 rounded-full bg-green-100 text-green-700 flex items-center justify-center font-bold text-xs">
                        {{ strtoupper(substr($siswa->name, 0, 1)) }}
                    </div>
                    {{ $siswa->name }}
                </td>
                <td class="p-4 text-gray-600">{{ $siswa->email }}</td>
                <td class="p-4 text-gray-600">{{ $siswa->created_at->format('d-m-Y') }}</td>
                <td class="p-4">
                    <span class="bg-blue-50 text-blue-700 border border-blue-200 py-1 px-3 rounded-full text-xs font-bold">{{ $siswa->pengaduans->count() }} Laporan</span>
                </td>
                <td class="p-4">
                    <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus akun siswa ini? Semua laporan miliknya juga akan terhapus permanen.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Hapus Siswa" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition border border-red-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="p-8 text-center text-gray-500">Belum ada siswa yang terdaftar.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#siswaTable tbody tr');
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection