@extends('layouts.admin')

@section('main-content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title m-0 fw-bold">Detail Pengaduan</h2>
    <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-secondary">&larr; Kembali</a>
</div>

<div class="row">
    <!-- Kolom Kiri: Detail Pengaduan -->
    <div class="col-md-8">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="200">Nama Pelapor</th>
                        <td>: {{ $pengaduan->user->name }} ({{ $pengaduan->user->email }})</td>
                    </tr>
                    <tr>
                        <th>Tanggal Laporan</th>
                        <td>: {{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th>Kategori/Tempat</th>
                        <td>: <span class="fw-bold">{{ $pengaduan->kategori }}</span></td>
                    </tr>
                    <tr>
                        <th>Isi Aspirasi</th>
                        <td>: {{ $pengaduan->aspirasi }}</td>
                    </tr>
                    <tr>
                        <th>Status Saat Ini</th>
                        <td>: 
                            @if($pengaduan->status == 'aspirasi')
                                <span class="badge bg-secondary fs-6">Aspirasi</span>
                            @elseif($pengaduan->status == 'proses')
                                <span class="badge fs-6" style="background-color: #fcfca6; color: #333;">Proses</span>
                            @else
                                <span class="badge fs-6" style="background-color: #d4fcc7; color: #333;">Selesai</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Lampiran & Form Ubah Status -->
    <div class="col-md-4">
        <!-- Foto -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white fw-bold">Foto Lampiran</div>
            <div class="card-body text-center">
                @if($pengaduan->foto)
                    <img src="{{ asset('images/pengaduan/' . $pengaduan->foto) }}" alt="Foto Pengaduan" class="img-fluid rounded" style="max-height: 200px;">
                @else
                    <p class="text-muted">Tidak ada foto yang dilampirkan.</p>
                @endif
            </div>
        </div>

        <!-- Form Ubah Status -->
        <div class="card shadow-sm border-success">
            <div class="card-header bg-success text-white fw-bold">Ubah Status</div>
            <div class="card-body">
                <form action="{{ route('admin.pengaduan.update', $pengaduan->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Wajib untuk method update -->
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Pilih Status Baru:</label>
                        <select name="status" class="form-select">
                            <option value="aspirasi" {{ $pengaduan->status == 'aspirasi' ? 'selected' : '' }}>Aspirasi (Baru Masuk)</option>
                            <option value="proses" {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>Proses (Sedang Ditangani)</option>
                            <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success w-100 fw-bold">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection