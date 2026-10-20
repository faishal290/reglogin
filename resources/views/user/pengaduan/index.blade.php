@extends('layouts.user')

@section('main-content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Aktivitas Pengaduan Saya</h2>
    <p class="mt-1 text-sm text-gray-500">
        Total pengaduan: <span class="font-semibold text-gray-700">{{ $pengaduans->count() }}</span>
    </p>
</div>

<!-- Notifikasi Sukses (Jika ada) -->
@if(session('success'))
    <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded-lg mb-6 flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        {{ session('success') }}
    </div>
@endif

<!-- Container Tabel Responsif -->
<div class="w-full min-w-0 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
    <div class="overflow-x-auto">
    <table class="w-full min-w-[760px] table-fixed border-collapse text-left">
        <thead>
            <tr class="bg-gray-100 border-b border-gray-300">
                <th class="w-16 p-4 text-center text-sm font-semibold text-gray-700">NO</th>
                <th class="w-32 p-4 text-sm font-semibold text-gray-700">Tanggal</th>
                <th class="w-48 p-4 text-sm font-semibold text-gray-700">Kategori/Tempat</th>
                <th class="p-4 text-sm font-semibold text-gray-700">Aspirasi</th>
                <th class="w-36 p-4 text-center text-sm font-semibold text-gray-700">Status</th>
                <th class="w-32 p-4 text-center text-sm font-semibold text-gray-700">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($pengaduans as $index => $item)
            <tr class="hover:bg-gray-50 transition">
                <td class="p-4 text-center text-gray-600">{{ $index + 1 }}</td>
                <td class="whitespace-nowrap p-4 text-sm text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                <td class="break-words p-4 text-sm font-medium text-gray-800">{{ $item->kategori }}</td>
                
                <!-- Teks Aspirasi dibuat rata kiri dan dipotong jika terlalu panjang -->
                <td class="break-words p-4 text-left text-sm text-gray-600">
                    {{ $item->aspirasi }}
                </td>
                
                <!-- Badge Status dengan Tailwind -->
                <td class="p-4 text-center">
                    @if($item->status == 'aspirasi')
                        <span class="inline-flex whitespace-nowrap rounded-full bg-gray-200 px-3 py-1 text-xs font-bold uppercase tracking-wide text-gray-700">Aspirasi</span>
                    @elseif($item->status == 'proses')
                        <span class="inline-flex whitespace-nowrap rounded-full bg-yellow-100 px-3 py-1 text-xs font-bold uppercase tracking-wide text-yellow-700">Proses</span>
                    @else
                        <span class="inline-flex whitespace-nowrap rounded-full bg-green-100 px-3 py-1 text-xs font-bold uppercase tracking-wide text-green-700">Selesai</span>
                    @endif
                </td>

                <!-- Tombol Aksi -->
                <td class="p-4 text-center">
                    <div class="flex justify-center">
                        <a href="{{ route('pengaduan.show', $item->id) }}" class="inline-flex items-center justify-center gap-1 whitespace-nowrap rounded-md bg-blue-600 px-3 py-2 text-xs font-medium text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            Detail
                        </a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="p-8 text-center text-gray-500">
                    <div class="flex flex-col items-center justify-center">
                        <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <p>Anda belum pernah membuat pengaduan.</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection