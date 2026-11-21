@extends('layouts.user')

@section('main-content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-800 border-l-4 border-[#1a6840] pl-3">Tambah Pengaduan</h2>
    <p class="text-sm text-gray-500 mt-1">Sampaikan aspirasi Anda dengan mengisi formulir di bawah ini.</p>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded-lg mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-200 max-w-4xl">
    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700" role="alert">
                <p class="font-bold mb-1">Pengaduan belum dapat dikirim:</p>
                <ul class="list-inside list-disc">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Kolom Kiri -->
            <div class="space-y-5">
                <!-- Input Kategori -->
                <div>
                    <label class="block font-bold text-gray-800 mb-2">Kategori / Tempat</label>
                    <input type="text" name="kategori" value="{{ old('kategori') }}" class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a6840] focus:bg-white transition" placeholder="Contoh: Ruang Kelas X, Lab Komputer" required>
                </div>

                <!-- Input Tanggal -->
                <div>
                    <label class="block font-bold text-gray-800 mb-2">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" readonly class="w-full bg-gray-100 border border-gray-300 rounded-lg p-3 text-sm cursor-not-allowed text-gray-500" required>
                    <p class="text-xs text-gray-400 mt-1">Tanggal otomatis terisi sesuai hari ini.</p>
                </div>
            </div>

            <!-- Kolom Kanan (Aspirasi) -->
            <div>
                <label class="block font-bold text-gray-800 mb-2">Isi Aspirasi / Keluhan</label>
                <textarea name="aspirasi" rows="5" class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a6840] focus:bg-white transition" placeholder="Jelaskan secara detail kerusakan atau keluhan Anda..." required>{{ old('aspirasi') }}</textarea>
            </div>
        </div>

        <!-- Area Upload Foto -->
        <div class="mb-6">
            <label class="block font-bold text-gray-800 mb-2">Foto Bukti (Opsional)</label>
            <label for="file-upload" class="flex flex-col items-center justify-center w-full h-40 bg-gray-50 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:bg-gray-100 hover:border-[#1a6840] transition">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <p class="text-sm text-gray-500 font-semibold">Klik untuk mengunggah foto</p>
                    <p class="text-xs text-gray-400 mt-1">PNG, JPG (Maks. 2MB)</p>
                </div>
                <input id="file-upload" type="file" name="foto" accept=".jpg,.jpeg,.png,image/jpeg,image/png" class="sr-only">
            </label>
            <p id="selected-file-name" class="mt-2 text-sm font-semibold text-green-800 hidden"></p>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
            <a href="{{ route('pengaduan.index') }}" class="bg-gray-100 text-gray-700 font-bold py-2.5 px-6 rounded-lg hover:bg-gray-200 transition">
                Batal
            </a>
            <button type="submit" class="bg-[#1a6840] text-white font-bold py-2.5 px-8 rounded-lg hover:bg-green-800 transition shadow-md">
                Kirim Pengaduan
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('file-upload').addEventListener('change', function () {
        const fileName = document.getElementById('selected-file-name');
        if (this.files.length > 0) {
            fileName.textContent = `Foto dipilih: ${this.files[0].name}`;
            fileName.classList.remove('hidden');
        } else {
            fileName.textContent = '';
            fileName.classList.add('hidden');
        }
    });
</script>
@endsection