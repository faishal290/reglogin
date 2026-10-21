@extends('layouts.admin')

@section('main-content')

<!-- Header & Form Pencarian -->
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Daftar Semua Pengaduan</h2>
    
    <!-- Form Container -->
    <form action="{{ route('admin.pengaduan.index') }}" method="GET" class="flex flex-wrap items-center gap-3 bg-white p-4 rounded-xl shadow-sm border border-gray-200">
        
        <!-- INPUT SEARCH (Lebar pasti) -->
        <div class="relative w-full md:w-80">
            <!-- Ikon Kaca Pembesar (Absolute di kiri) -->
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </span>
            <!-- Input Text (Padding Kiri Besar pl-12) -->
            <input type="text" name="search" value="{{ request('search') }}" 
                   class="w-full border border-gray-300 rounded-lg py-2 pl-12 pr-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a6840]" 
                   placeholder="Cari kategori atau nama...">
        </div>

        <!-- DROPDOWN STATUS (Lebar pasti) -->
        <div class="w-full md:w-48">
            <select name="status" class="w-full border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a6840]">
                <option value="">Semua Status</option>
                <option value="aspirasi" {{ request('status') == 'aspirasi' ? 'selected' : '' }}>Aspirasi</option>
                <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <!-- TOMBOL CARI -->
        <button type="submit" class="bg-[#1a6840] text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-green-800 transition w-full md:w-auto">
            Cari
        </button>
        
        <!-- TOMBOL RESET (Jika ada filter) -->
        @if(request('search') || request('status'))
            <a href="{{ route('admin.pengaduan.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg text-sm font-medium hover:bg-gray-300 transition text-center w-full md:w-auto">
                Reset
            </a>
        @endif
    </form>
</div>

<!-- Notifikasi Sukses -->
@if(session('success'))
    <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded-lg mb-6 flex items-center shadow-sm">
        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        {{ session('success') }}
    </div>
@endif

<!-- Container Tabel -->
<div class="w-full overflow-x-auto bg-white rounded-xl shadow-sm border border-gray-200">
    <table class="w-full text-center border-collapse">
        <thead>
            <tr class="bg-gray-100 border-b border-gray-300 text-gray-700 text-sm">
                <th class="p-4 font-semibold w-16 border-r border-gray-200">NO</th>
                <th class="p-4 font-semibold border-r border-gray-200">Tanggal</th>
                <th class="p-4 font-semibold border-r border-gray-200">Pelapor</th>
                <th class="p-4 font-semibold border-r border-gray-200">Kategori</th>
                <th class="p-4 font-semibold border-r border-gray-200 text-left">Aspirasi</th>
                <th class="p-4 font-semibold border-r border-gray-200">Status</th>
                <th class="p-4 font-semibold">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($pengaduans as $index => $item)
            <tr class="hover:bg-gray-50 transition">
                <td class="p-4 text-gray-600 border-r border-gray-200">{{ $index + 1 }}</td>
                <td class="p-4 text-gray-600 border-r border-gray-200">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                <td class="p-4 text-gray-800 font-medium border-r border-gray-200">{{ $item->user->name }}</td>
                <td class="p-4 text-gray-600 border-r border-gray-200">{{ $item->kategori }}</td>
                <td class="p-4 text-gray-600 text-sm border-r border-gray-200 text-left truncate max-w-xs" title="{{ $item->aspirasi }}">
                    {{ Str::limit($item->aspirasi, 40) }}
                </td>
                <td class="p-4 border-r border-gray-200">
                    @if($item->status == 'aspirasi')
                        <span class="bg-gray-200 text-gray-700 py-1 px-3 rounded-full text-xs font-bold uppercase tracking-wide">Aspirasi</span>
                    @elseif($item->status == 'proses')
                        <span class="bg-yellow-100 text-yellow-700 py-1 px-3 rounded-full text-xs font-bold uppercase tracking-wide">Proses</span>
                    @else
                        <span class="bg-green-100 text-green-700 py-1 px-3 rounded-full text-xs font-bold uppercase tracking-wide">Selesai</span>
                    @endif
                </td>
                <td class="p-4">
                    <a href="{{ route('admin.pengaduan.show', $item->id) }}" class="inline-flex items-center gap-1 bg-blue-500 text-white px-3 py-1.5 rounded-md text-xs font-medium hover:bg-blue-600 transition shadow-sm">
                        Detail
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="p-8 text-center text-gray-500">Data tidak ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection