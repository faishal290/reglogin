@extends('layouts.admin')

@section('main-content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Detail Pengaduan</h2>
    <a href="{{ route('admin.pengaduan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition shadow-sm">
        &larr; Kembali
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <!-- Kolom Kiri: Detail Pengaduan (Mengambil 2 porsi lebar) -->
    <div class="lg:col-span-2 space-y-6">
        
        <!-- Card Informasi -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="font-bold text-lg text-gray-800 mb-4 border-b pb-2">Informasi Laporan</h3>
            <div class="space-y-3 text-sm">
                <div class="grid grid-cols-3">
                    <span class="text-gray-500 font-medium">Nama Pelapor</span>
                    <span class="col-span-2 text-gray-800 font-bold">{{ $pengaduan->user->name }} ({{ $pengaduan->user->email }})</span>
                </div>
                <div class="grid grid-cols-3">
                    <span class="text-gray-500 font-medium">Tanggal Laporan</span>
                    <span class="col-span-2 text-gray-800">{{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d F Y') }}</span>
                </div>
                <div class="grid grid-cols-3">
                    <span class="text-gray-500 font-medium">Kategori/Tempat</span>
                    <span class="col-span-2 text-gray-800 font-bold">{{ $pengaduan->kategori }}</span>
                </div>
                <div class="grid grid-cols-3">
                    <span class="text-gray-500 font-medium">Isi Aspirasi</span>
                    <span class="col-span-2 text-gray-800 bg-gray-50 p-3 rounded border">{{ $pengaduan->aspirasi }}</span>
                </div>
                <div class="grid grid-cols-3 items-center">
                    <span class="text-gray-500 font-medium">Status Saat Ini</span>
                    <span class="col-span-2">
                        @if($pengaduan->status == 'aspirasi')
                            <span class="bg-gray-200 text-gray-700 py-1 px-3 rounded-full text-xs font-bold uppercase tracking-wide">Aspirasi</span>
                        @elseif($pengaduan->status == 'proses')
                            <span class="bg-yellow-100 text-yellow-700 py-1 px-3 rounded-full text-xs font-bold uppercase tracking-wide">Proses</span>
                        @else
                            <span class="bg-green-100 text-green-700 py-1 px-3 rounded-full text-xs font-bold uppercase tracking-wide">Selesai</span>
                        @endif
                    </span>
                </div>
            </div>
        </div>

        <!-- Card Tanggapan Sebelumnya (Jika Ada) -->
        @if($pengaduan->tanggapan_admin)
        <div class="bg-green-50 rounded-xl shadow-sm border border-green-200 p-6">
            <h3 class="font-bold text-green-800 mb-2 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                Tanggapan Admin
            </h3>
            <p class="text-green-700 text-sm whitespace-pre-line">{{ $pengaduan->tanggapan_admin }}</p>
        </div>
        @endif

    </div>

    <!-- Kolom Kanan: Lampiran & Form Aksi -->
    <div class="space-y-6">
        
        <!-- Card Foto -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="font-bold text-gray-800 mb-4 border-b pb-2">Foto Lampiran</h3>
            <div class="text-center">
                @if($pengaduan->foto)
                    <img src="{{ asset('images/pengaduan/' . $pengaduan->foto) }}" alt="Foto Pengaduan" class="w-full h-auto rounded-lg shadow-sm border">
                @else
                    <div class="bg-gray-100 rounded-lg p-6 text-gray-500 text-sm">
                        <svg class="w-10 h-10 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Tidak ada foto yang dilampirkan.
                    </div>
                @endif
            </div>
        </div>

        <!-- Form Ubah Status & Tanggapan -->
        <div class="bg-white rounded-xl shadow-sm border-t-4 border-[#1a6840] p-6">
            <h3 class="font-bold text-gray-800 mb-4 text-lg">Aksi Admin</h3>
            
            <form action="{{ route('admin.pengaduan.update', $pengaduan->id) }}" method="POST">
                @csrf
                @method('PUT') 
                
                <!-- Input Status -->
                <div class="mb-4">
                    <label class="block font-bold text-gray-700 mb-2 text-sm">Ubah Status Menjadi:</label>
                    <select name="status" class="w-full bg-gray-50 border border-gray-300 text-gray-700 py-2 px-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a6840]">
                        <option value="aspirasi" {{ $pengaduan->status == 'aspirasi' ? 'selected' : '' }}>Aspirasi (Baru Masuk)</option>
                        <option value="proses" {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>Proses (Sedang Ditangani)</option>
                        <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <!-- Input Tanggapan/Pesan -->
                <div class="mb-4">
                    <label class="block font-bold text-gray-700 mb-2 text-sm">Tanggapan / Pesan Admin:</label>
                    <textarea name="tanggapan_admin" rows="4" class="w-full bg-gray-50 border border-gray-300 text-gray-700 py-2 px-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a6840]" placeholder="Tulis instruksi atau keterangan untuk siswa di sini...">{{ old('tanggapan_admin', $pengaduan->tanggapan_admin) }}</textarea>
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="w-full bg-[#1a6840] text-white font-bold py-3 rounded-lg hover:bg-green-800 transition shadow-md flex justify-center items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection