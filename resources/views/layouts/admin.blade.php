@extends('layouts.app')

@section('content')
<header class="flex flex-col gap-4 bg-[#1a6840] px-5 py-4 text-white shadow-md sm:flex-row sm:items-center sm:justify-between sm:px-8">
    <div class="flex items-center gap-4">
        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full border-2 border-dashed border-white bg-yellow-400 font-bold text-[#1a6840]">
            SMS
        </div>
        <div>
            <h1 class="m-0 text-lg font-bold leading-tight">PENGADUAN SARANA SEKOLAH</h1>
            <p class="m-0 text-xs opacity-90">SMK MUHAMMADIYAH 1 BANTUL (ADMIN)</p>
        </div>
    </div>
    <div class="flex items-center justify-between gap-4 sm:justify-end">
        <div class="font-semibold">{{ Auth::user()->name }}</div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="rounded-md bg-white px-4 py-2 text-sm font-semibold text-[#1a6840] transition hover:bg-green-50">
                Logout
            </button>
        </form>
    </div>
</header>

<div class="flex min-h-[calc(100vh-80px)] flex-col md:flex-row">
    @include('layouts.partials.admin-sidebar')

    <main class="min-w-0 flex-1 bg-gray-50 p-5 sm:p-8">
        @yield('main-content')
    </main>
</div>
@endsection