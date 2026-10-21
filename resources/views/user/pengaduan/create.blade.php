@extends('layouts.user')

@section('main-content')
<h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Pengaduan</h2>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<!-- Container Form Abu-abu -->
<div class="bg-gray-100 p-8 rounded-lg shadow-sm max-w-3xl">
    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if($errors->any())
            <div class="mb-5 rounded-md border border-red-200 bg-red-50 p-4 text-sm text-red-700" role="alert">
                <p class="font-semibold">Pengaduan belum dapat dikirim:</p>
                <ul class="mt-1 list-inside list-disc">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!-- Input Kategori -->
        <div class="mb-5">
            <label class="block font-bold text-gray-800 mb-2">kategori/tempat</label>
            <input type="text" name="kategori" value="{{ old('kategori') }}" class="w-full bg-white border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-green-600 transition" placeholder="masukan tempat/Kategori" required>
        </div>

        <!-- Input Aspirasi -->
        <div class="mb-5">
            <label class="block font-bold text-gray-800 mb-2">Aspirasi</label>
            <input type="text" name="aspirasi" value="{{ old('aspirasi') }}" class="w-full bg-white border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-green-600 transition" placeholder="masukan aspirasi" required>
        </div>

        <!-- Input Tanggal -->
        <div class="mb-5">
            <label class="block font-bold text-gray-800 mb-2">Tanggal</label>
           <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" readonly class="w-full bg-gray-100 border border-gray-300 rounded-md p-3 focus:outline-none cursor-not-allowed text-gray-500" required>
        </div>

        <!-- Area Upload Foto -->
        <div class="mb-6">
            <label class="block font-bold text-gray-800 mb-2">Foto</label>
            <label for="file-upload" class="flex flex-col items-center justify-center w-full bg-gray-200 border-2 border-dashed border-gray-400 rounded-lg p-8 cursor-pointer hover:bg-gray-300 transition">
                <!-- Ikon SVG -->
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="1.5" class="mb-2">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                    <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
                <p class="text-gray-500 text-sm">Klik untuk Tempat/Unggah foto</p>
                <p id="selected-file-name" class="mt-2 hidden text-sm font-semibold text-green-800" aria-live="polite"></p>
                <input id="file-upload" type="file" name="foto" accept=".jpg,.jpeg,.png,image/jpeg,image/png" aria-describedby="foto-help foto-error" class="sr-only">
            </label>
            <p id="foto-help" class="mt-2 text-sm text-gray-500">Format JPG atau PNG, ukuran maksimal 2 MB. Foto bersifat opsional.</p>
            @error('foto')
                <p id="foto-error" class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Kirim -->
        <div class="flex justify-end w-full">
            <button type="submit" class="bg-[#1a6840] text-white font-bold py-2 px-8 rounded-full hover:bg-green-800 transition">
                Kirim
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