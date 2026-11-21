@extends('layouts.admin')

@section('main-content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Daftar Semua Pengaduan</h2>
    <form action="{{ route('admin.pengaduan.index') }}" method="GET" class="flex flex-wrap items-center gap-3 bg-white p-4 rounded-xl shadow-sm border border-gray-200">
        <div class="relative w-full md:w-64">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </span>
            <input type="text" name="search" value="{{ request('search') }}" class="w-full border border-gray-300 rounded-lg py-2 pl-10 pr-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a6840]" placeholder="Cari kategori atau nama...">
        </div>
        <div class="w-full md:w-40">
            <select name="status" class="w-full border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a6840]">
                <option value="">Semua Status</option>
                <option value="aspirasi" {{ request('status') == 'aspirasi' ? 'selected' : '' }}>Aspirasi</option>
                <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <div class="w-full md:w-36">
            <input type="date" name="dari_tanggal" value="{{ request('dari_tanggal') }}" class="w-full border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a6840]">
        </div>
        <div class="w-full md:w-36">
            <input type="date" name="sampai_tanggal" value="{{ request('sampai_tanggal') }}" class="w-full border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a6840]">
        </div>
        <button type="submit" class="bg-[#1a6840] text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-green-800 transition">Cari</button>
        @if(request('search') || request('status') || request('dari_tanggal') || request('sampai_tanggal'))
            <a href="{{ route('admin.pengaduan.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg text-sm font-medium hover:bg-gray-300 transition">Reset</a>
        @endif
    </form>
</div>

<div class="w-full overflow-x-auto bg-white rounded-xl shadow-sm border border-gray-200">
    @if(session('success'))
        <div class="mx-4 mt-4 mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">{{ session('success') }}</div>
    @endif
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
                <td class="p-4 text-gray-600 text-sm border-r border-gray-200 text-left truncate max-w-xs" title="{{ $item->aspirasi }}">{{ Str::limit($item->aspirasi, 40) }}</td>
                <td class="p-4 border-r border-gray-200">
                    @if($item->status == 'aspirasi')
                        <span class="bg-gray-100 text-gray-700 border border-gray-300 py-1 px-3 rounded-full text-xs font-bold uppercase tracking-wide">Aspirasi</span>
                    @elseif($item->status == 'proses')
                        <span class="bg-yellow-50 text-yellow-700 border border-yellow-300 py-1 px-3 rounded-full text-xs font-bold uppercase tracking-wide">Proses</span>
                    @else
                        <span class="bg-green-50 text-green-700 border border-green-300 py-1 px-3 rounded-full text-xs font-bold uppercase tracking-wide">Selesai</span>
                    @endif
                </td>
                <td class="p-4">
                    <a href="{{ route('admin.pengaduan.show', $item->id) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition border border-blue-200" title="Detail">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
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