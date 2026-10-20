@extends('layouts.user')

@section('main-content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Detail Pengaduan</h2>
        <a href="{{ route('pengaduan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">&larr; Kembali</a>
    </div>

    <!-- Kartu Informasi Pengaduan -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-8 border border-gray-200">
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <p class="text-sm text-gray-500">Kategori/Tempat</p>
                <p class="font-bold text-lg">{{ $pengaduan->kategori }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Tanggal Laporan</p>
                <p class="font-bold text-lg">{{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d F Y') }}</p>
            </div>
        </div>
        <div class="mb-4">
            <p class="text-sm text-gray-500">Isi Aspirasi</p>
            <p class="text-gray-800 bg-gray-50 p-3 rounded">{{ $pengaduan->aspirasi }}</p>
        </div>
        @if($pengaduan->foto)
            <div>
                <p class="text-sm text-gray-500 mb-2">Foto Lampiran</p>
                <img src="{{ asset('images/pengaduan/'.$pengaduan->foto) }}" class="w-64 h-auto rounded shadow-sm border">
            </div>
        @endif
    </div>

    <!-- Timeline Progress -->
    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
        <h3 class="font-bold text-lg mb-6 text-gray-800">Status Penanganan</h3>
        
        <div class="relative flex justify-between items-center w-full max-w-2xl mx-auto">
            <!-- Garis Background -->
            <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-full h-1 bg-gray-200 -z-10"></div>
            
            <!-- Step 1: Dikirim -->
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold {{ in_array($pengaduan->status, ['aspirasi', 'proses', 'selesai']) ? 'bg-green-600' : 'bg-gray-300' }}">1</div>
                <p class="mt-2 text-sm font-semibold text-gray-700">Dikirim</p>
            </div>

            <!-- Step 2: Proses -->
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold {{ in_array($pengaduan->status, ['proses', 'selesai']) ? 'bg-green-600' : 'bg-gray-300' }}">2</div>
                <p class="mt-2 text-sm font-semibold text-gray-700">Diproses</p>
            </div>

            <!-- Step 3: Selesai -->
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold {{ $pengaduan->status == 'selesai' ? 'bg-green-600' : 'bg-gray-300' }}">3</div>
                <p class="mt-2 text-sm font-semibold text-gray-700">Selesai</p>
            </div>
        </div>

        <!-- Tanggapan Admin -->
        @if($pengaduan->tanggapan_admin)
            <div class="mt-8 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
                <p class="font-bold text-green-800 mb-1">Tanggapan Admin:</p>
                <p class="text-green-700 text-sm">{{ $pengaduan->tanggapan_admin }}</p>
            </div>
        @else
            <div class="mt-8 text-center text-gray-500 text-sm italic">
                Belum ada tanggapan dari admin.
            </div>
        @endif
    </div>
</div>
@endsection