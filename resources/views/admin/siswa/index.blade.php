@extends('layouts.admin')

@if(session('success'))
    <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded-lg mb-6 flex items-center shadow-sm">
        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        {{ session('success') }}
    </div>
@endif

@section('main-content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Daftar Siswa Terdaftar</h2>
        <p class="text-sm text-gray-500 mt-1">Semua akun siswa yang terdaftar dalam sistem.</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-300 transition">
        &larr; Kembali ke Dashboard
    </a>
</div>

<div class="w-full overflow-x-auto bg-white rounded-xl shadow-sm border border-gray-200">
    <table class="w-full text-center border-collapse">
        <thead>
            <tr class="bg-gray-100 border-b border-gray-300 text-gray-700 text-sm">
                <th class="p-4 font-semibold w-16 border-r border-gray-200">NO</th>
                <th class="p-4 font-semibold border-r border-gray-200">Nama Siswa</th>
                <th class="p-4 font-semibold border-r border-gray-200">Email</th>
                <th class="p-4 font-semibold border-r border-gray-200">Tanggal Bergabung</th>
                <th class="p-4 font-semibold">Total Laporan</th>
                <th class="p-4 font-semibold">Aksi</th> <!-- TAMBAHKAN INI -->
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($siswas as $index => $siswa)
            <tr class="hover:bg-gray-50 transition">
                <td class="p-4 text-gray-600 border-r border-gray-200">{{ $index + 1 }}</td>
                <td class="p-4 text-gray-800 font-bold border-r border-gray-200">{{ $siswa->name }}</td>
                <td class="p-4 text-gray-600 border-r border-gray-200">{{ $siswa->email }}</td>
                <td class="p-4 text-gray-600 border-r border-gray-200">{{ $siswa->created_at->format('d-m-Y') }}</td>
                <td class="p-4">
                    <span class="bg-blue-100 text-blue-700 py-1 px-3 rounded-full text-sm font-bold">
                        {{ $siswa->pengaduans->count() }} Laporan
                    </span>
                </td>
                <td class="p-4">
    <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus akun siswa ini? Semua laporan miliknya juga akan terhapus permanen.');">
        @csrf
        @method('DELETE')
        <!-- Perhatikan penggunaan inline style di sini -->
        <button type="submit" style="background-color: #ef4444; color: #ffffff;" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-md text-xs font-bold hover:opacity-80 transition shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            Hapus
        </button>
    </form>
</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-8 text-center text-gray-500">Belum ada siswa yang terdaftar.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection