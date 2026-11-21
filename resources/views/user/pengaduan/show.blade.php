@extends('layouts.user')

@section('main-content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800 border-l-4 border-[#1a6840] pl-3">Detail Pengaduan</h2>
        <a href="{{ route('pengaduan.index') }}" class="bg-white text-gray-600 border border-gray-300 px-4 py-2 rounded-lg hover:bg-gray-50 transition shadow-sm flex items-center gap-2 text-sm font-semibold">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>

    <!-- Kartu Informasi Pengaduan -->
    <div class="bg-white shadow-sm rounded-2xl p-6 md:p-8 mb-8 border border-gray-200">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 pb-6 border-b border-gray-100">
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Kategori/Tempat</p>
                <p class="font-bold text-lg text-gray-800">{{ $pengaduan->kategori }}</p>
            </div>
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Tanggal Laporan</p>
                <p class="font-bold text-lg text-gray-800">{{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d F Y') }}</p>
            </div>
        </div>
        <div class="mb-6">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Isi Aspirasi</p>
            <p class="text-gray-700 bg-gray-50 p-4 rounded-xl border border-gray-100 leading-relaxed">{{ $pengaduan->aspirasi }}</p>
        </div>
        @if($pengaduan->foto)
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Foto Lampiran</p>
                <img src="{{ asset('images/pengaduan/'.$pengaduan->foto) }}" class="w-full max-w-md h-auto max-h-96 object-cover rounded-xl shadow-md border border-gray-200">
            </div>
        @endif
    </div>

    <!-- Timeline Progress & Tanggapan -->
    <div class="bg-white shadow-sm rounded-2xl p-6 md:p-8 border border-gray-200">
        <h3 class="font-bold text-lg mb-8 text-gray-800">Status Penanganan</h3>
        
        <!-- Timeline Modern -->
        <div class="relative flex justify-between items-center w-full max-w-2xl mx-auto mb-10">
            <!-- Garis Background -->
            <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-full h-1 bg-gray-200 -z-10 rounded-full"></div>
            
            <!-- Garis Progress (Hijau) -->
            <div class="absolute left-0 top-1/2 transform -translate-y-1/2 h-1 bg-[#1a6840] -z-10 rounded-full transition-all duration-500" 
                 style="width: {{ $pengaduan->status == 'aspirasi' ? '0%' : ($pengaduan->status == 'proses' ? '50%' : '100%') }}"></div>

            <!-- Step 1: Dikirim -->
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold bg-[#1a6840] shadow-md ring-4 ring-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <p class="mt-3 text-sm font-bold text-[#1a6840]">Dikirim</p>
            </div>

            <!-- Step 2: Proses -->
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold shadow-md ring-4 ring-white {{ in_array($pengaduan->status, ['proses', 'selesai']) ? 'bg-[#1a6840]' : 'bg-gray-300' }}">
                    @if(in_array($pengaduan->status, ['proses', 'selesai']))
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    @else
                        2
                    @endif
                </div>
                <p class="mt-3 text-sm font-bold {{ in_array($pengaduan->status, ['proses', 'selesai']) ? 'text-[#1a6840]' : 'text-gray-400' }}">Diproses</p>
            </div>

            <!-- Step 3: Selesai -->
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold shadow-md ring-4 ring-white {{ $pengaduan->status == 'selesai' ? 'bg-[#1a6840]' : 'bg-gray-300' }}">
                    @if($pengaduan->status == 'selesai')
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    @else
                        3
                    @endif
                </div>
                <p class="mt-3 text-sm font-bold {{ $pengaduan->status == 'selesai' ? 'text-[#1a6840]' : 'text-gray-400' }}">Selesai</p>
            </div>
        </div>

        <!-- Tanggapan Admin -->
        <div class="mt-8">
            <h4 class="text-sm font-bold text-gray-800 mb-3 flex items-center gap-2">
                <svg class="w-5 h-5 text-[#1a6840]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                Tanggapan Admin
            </h4>
            @if($pengaduan->tanggapan_admin)
                <div class="bg-green-50 border border-green-200 p-5 rounded-xl">
                    <p class="text-green-800 text-sm leading-relaxed">{{ $pengaduan->tanggapan_admin }}</p>
                </div>
            @else
                <div class="bg-gray-50 border border-gray-200 p-5 rounded-xl text-center">
                    <p class="text-gray-500 text-sm italic">Belum ada tanggapan dari admin. Laporan Anda sedang dalam antrean.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection