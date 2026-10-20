@extends('layouts.app')

@section('content')
<!-- Header Hijau -->
<header class="flex flex-col gap-4 bg-[#1a6840] px-5 py-4 text-white shadow-md sm:flex-row sm:items-center sm:justify-between sm:px-8">
    <div class="flex items-center gap-4">
        <!-- Logo -->
        <div class="w-12 h-12 bg-yellow-400 rounded-full flex justify-center items-center font-bold text-[#1a6840] border-2 border-dashed border-[#1a6840]">
            SMS
        </div>
        <div>
            <h1 class="text-lg font-bold m-0 leading-tight">PENGADUAN SARANA SEKOLAH</h1>
            <p class="text-xs m-0 opacity-90">SMK MUHAMMADIYAH 1 BANTUL</p>
        </div>
    </div>
    
    <div class="text-right font-semibold">{{ Auth::user()->name }}</div>
</header>

<div class="flex min-h-screen flex-col md:flex-row">
    <!-- Sidebar Putih dengan Border Kanan -->
    @include('layouts.partials.user-sidebar')
    
    <!-- Main Content (Background Putih) -->
    <main class="w-full min-w-0 flex-1 bg-white p-5 sm:p-8">
        @yield('main-content')
    </main>
</div>
@endsection