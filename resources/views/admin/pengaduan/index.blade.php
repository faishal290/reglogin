@extends('layouts.admin')

@section('main-content')
<h2 class="page-title mb-4 fw-bold">Daftar Semua Pengaduan</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="table-responsive">
    <table class="table text-center align-middle" style="border: 1px solid #000;">
        <thead style="background-color: #eaeaea; border: 1px solid #000;">
            <tr>
                <th width="50" class="border border-dark">NO</th>
                <th class="border border-dark">Tanggal</th>
                <th class="border border-dark">Pelapor</th>
                <th class="border border-dark">Kategori</th>
                <th class="border border-dark">Aspirasi</th>
                <th class="border border-dark">Status</th>
                <th class="border border-dark">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengaduans as $index => $item)
            <tr>
                <td class="border border-dark">{{ $index + 1 }}</td>
                <td class="border border-dark">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                <td class="border border-dark">{{ $item->user->name }}</td>
                <td class="border border-dark">{{ $item->kategori }}</td>
                <td class="border border-dark">{{ Str::limit($item->aspirasi, 40) }}</td>
                <td class="border border-dark">
                    @if($item->status == 'aspirasi')
                        <span class="badge bg-secondary">Aspirasi</span>
                    @elseif($item->status == 'proses')
                        <span class="badge" style="background-color: #fcfca6; color: #333;">Proses</span>
                    @else
                        <span class="badge" style="background-color: #d4fcc7; color: #333;">Selesai</span>
                    @endif
                </td>
                <td class="border border-dark">
                    <a href="{{ route('admin.pengaduan.show', $item->id) }}" class="btn btn-sm btn-primary">Detail & Ubah Status</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="border border-dark text-muted">Belum ada data pengaduan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection