@extends('layouts.admin')

@section('main-content')
<div class="mx-auto max-w-7xl">
    <div class="mb-8">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Dashboard Admin</h2>
        <p class="mt-1 text-sm text-gray-600">Ringkasan dan aktivitas terbaru pengaduan sarana sekolah.</p>
    </div>

    <section class="mb-10 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3" aria-label="Ringkasan pengaduan">
        <article class="rounded-xl border border-indigo-100 bg-white p-5 shadow-sm">
            <div class="flex items-center gap-3">
                <span class="flex h-11 w-11 items-center justify-center rounded-lg bg-indigo-50 text-indigo-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.5a8.4 8.4 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.4 8.4 0 0 1-3.8-.9L3 21l1.9-5.7a8.4 8.4 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.4 8.4 0 0 1 3.8-.9h.5a8.5 8.5 0 0 1 8 8z"></path>
                    </svg>
                </span>
                <div>
                    <p class="text-sm font-medium text-gray-600">Aspirasi Baru</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $total_aspirasi }}</p>
                </div>
            </div>
        </article>

        <article class="rounded-xl border border-amber-100 bg-white p-5 shadow-sm">
            <div class="flex items-center gap-3">
                <span class="flex h-11 w-11 items-center justify-center rounded-lg bg-amber-50 text-amber-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="12" cy="12" r="9"></circle>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 2"></path>
                    </svg>
                </span>
                <div>
                    <p class="text-sm font-medium text-gray-600">Sedang Diproses</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $total_proses }}</p>
                </div>
            </div>
        </article>

        <article class="rounded-xl border border-emerald-100 bg-white p-5 shadow-sm sm:col-span-2 xl:col-span-1">
            <div class="flex items-center gap-3">
                <span class="flex h-11 w-11 items-center justify-center rounded-lg bg-emerald-50 text-emerald-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"></path>
                    </svg>
                </span>
                <div>
                    <p class="text-sm font-medium text-gray-600">Selesai</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $total_selesai }}</p>
                </div>
            </div>
        </article>
    </section>

    <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        <div class="flex flex-col gap-3 border-b border-gray-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="font-semibold text-gray-900">Aktivitas Terbaru</h3>
                <p class="mt-1 text-sm text-gray-500">Lima pengaduan terakhir yang masuk.</p>
            </div>
            <a href="{{ route('admin.pengaduan.index') }}" class="inline-flex items-center gap-1 text-sm font-semibold text-[#1a6840] hover:text-green-800">
                Lihat semua
                <span aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[720px] divide-y divide-gray-200 text-left text-sm">
                <thead class="bg-gray-50 text-xs uppercase tracking-wide text-gray-600">
                    <tr>
                        <th scope="col" class="px-5 py-3 font-semibold">No.</th>
                        <th scope="col" class="px-5 py-3 font-semibold">Pelapor</th>
                        <th scope="col" class="px-5 py-3 font-semibold">Kategori</th>
                        <th scope="col" class="px-5 py-3 font-semibold">Aspirasi</th>
                        <th scope="col" class="px-5 py-3 font-semibold">Tanggal</th>
                        <th scope="col" class="px-5 py-3 font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse($pengaduans as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="whitespace-nowrap px-5 py-4">{{ $index + 1 }}</td>
                        <td class="whitespace-nowrap px-5 py-4 font-medium text-gray-900">{{ $item->user->name }}</td>
                        <td class="whitespace-nowrap px-5 py-4">{{ $item->kategori }}</td>
                        <td class="px-5 py-4">{{ Str::limit($item->aspirasi, 50) }}</td>
                        <td class="whitespace-nowrap px-5 py-4">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td class="whitespace-nowrap px-5 py-4">
                            @if($item->status === 'aspirasi')
                                <span class="inline-flex rounded-full bg-gray-100 px-2.5 py-1 text-xs font-semibold text-gray-700">Aspirasi</span>
                            @elseif($item->status === 'proses')
                                <span class="inline-flex rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-800">Proses</span>
                            @else
                                <span class="inline-flex rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-800">Selesai</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-5 py-12 text-center text-gray-500">Belum ada data pengaduan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection